<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Category;
use App\Models\City;
use App\Models\ObjectModel;
use App\Models\Product;
use App\Models\ProductData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ObjectController extends Controller
{
    public function objectsView()
    {
        $cities = City::all();
        return view('admin.objects.objects', compact('cities'));
    }

    public function objectsEditView($id)
    {
        $object = ObjectModel::where('id', $id)->with(['areas'])->first();

        $cities = City::all();

        return view('admin.objects.object-add', compact('object', 'cities'));
    }

    public function objectsAddView()
    {
        $cities = City::all();

        return view('admin.objects.object-add', compact('cities'));
    }

    public function objectsAdd(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'menu_limit' => 'required',
            'prefix' => 'required',
            'city_id' => 'required',
        ]);


        $object = ObjectModel::updateOrCreate(
            [
                'id' => $request->object_id
            ],
            [
                'name' => $request->name,
                'menu_limit' => $request->menu_limit,
                'prefix' => $request->prefix,
                'city_id' => $request->city_id,
                'description' => $request->description,
            ]);

        if (isset($request->object_id)) {
            $object->areas()->detach();
        }

        if (isset($request->area_ids)) {
            foreach (array_unique($request->area_ids) as $areaId) {
                $object->areas()->attach($areaId);
            }
        }


        return redirect()->route('admin.objects');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function gridDataObjects(Request $request): \Illuminate\Http\JsonResponse
    {
        $iTotalRecords = ObjectModel::all()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));
        $ids = 0;
        if (!empty($request->cityId)) {
            $ids = City::with(['areas'])->firstWhere('id', $request->cityId)->areas->pluck('id')->toArray();
        }

        $dataFilterEloquent = ObjectModel::query([
            'objects.id',
            'objects.name',
            'objects.menu_limit',
            'objects.prefix',
            'objects.city_id',
            'objects.description',
            'objects.created_by',
        ])->with(['areas'])
            ->when(!empty($request->areaId), function ($query) use ($request) {
                $query->whereHas('areas', function ($area) use ($request) {
                    $area->where('area_id', $request->areaId);
                });
            })
            ->when(empty($request->areaId), function ($query) use ($request, $ids) {
                $query->when(!empty($request->cityId), function ($query) use ($request, $ids) {
                    $query->whereHas('areas', function ($area) use ($request, $ids) {
                        $area->whereIn('area_id', $ids);
                    });
                });
            });

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->where('objects.name', 'LIKE', '%' . $searchValue . '%');
                $query->orWhereHas('areas', function ($a) use ($searchValue) {
                    $a->where('name', 'LIKE', '%' . $searchValue . '%');
                    $a->orWhereHas('subAreas', function ($b) use ($searchValue) {
                        $b->where('name', 'LIKE', '%' . $searchValue . '%');
                    });
                });
            });
        }

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
                case 1:
                    $dataFilterEloquent->orderBy('objects.name', $orderDirection);
                    break;
                case 2:
                    $dataFilterEloquent->orderBy('objects.menu_limit', $orderDirection);
                    break;
                case 3:
                    $dataFilterEloquent->whereHas('city')->orderBy('name', $orderDirection);
                    break;
                case 4:
                    $dataFilterEloquent->whereHas('areas')->orderBy('name', $orderDirection);
                    break;
                case 5:
                    //this returns them sorted properly
                    //                    $dataFilterEloquent = DB::table('object_areas')
                    //                                            ->join('areas', 'object_areas.area_id', '=', 'areas.id')
                    //                                            ->join('objects', 'object_areas.object_id', '=', 'objects.id')
                    //                                            ->join('sub_areas', 'object_areas.area_id', '=', 'sub_areas.area_id')
                    //                                            ->select('object_areas.*')
                    //                                            ->orderBy('sub_areas.name', $orderDirection);
                    $dataFilterEloquent->whereHas('areas')->orderBy('name', $orderDirection);
                    break;
                case 6:
                    $dataFilterEloquent->orderBy('objects.created_by', $orderDirection);
                    break;
                default:
                    $dataFilterEloquent->orderBy('id', $orderDirection);
                    break;
            }
        }

        $iFilteredRecords = $dataFilterEloquent->count();
        $data = $dataFilterEloquent->skip($iDisplayStart)->limit($iDisplayLength)->get();

        $records = [
            'data' => [],
        ];

        foreach ($data as $row) {
            $areasInitial = $row->areas->where('status', 1);
            $areas = $areasInitial->pluck('name')->toArray();
            $subAreas = !empty($areasInitial->pluck('subAreas')->toArray()) ?
                collect($areasInitial->pluck('subAreas')->toArray()[0])->pluck('name')->toArray() : [];

            $records["data"][] = [
                $row->id,
                parseEditRoute('objects', $row->id, $row->name, null, 'Objects'),
                $row->menu_limit,
                $row->city->name,
                implode(',', $areas),
                implode(',', $subAreas),
                $row->created_by,
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);
    }

    public function productsList()
    {
        $objects = ObjectModel::all();
        $categories = Category::all();

        return view('admin.objects.products-list', compact('objects', 'categories'));
    }

    public function productsListGrid(Request $request)
    {
        $object = ObjectModel::where('id', $request->objectId ?? ObjectModel::first()->id)->with('products')->first();
        $ids = $object->products->pluck('id');
        $iTotalRecords = $ids->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));

        $dataFilterEloquent = Product::query([
            'objects.id',
            'objects.name',
            'objects.menu_limit',
            'objects.prefix',
            'objects.city_id',
            'objects.description',
            'objects.created_by',
        ])->whereIn('id', $ids)
            ->when(!empty($request->categoryId), function ($query) use ($request) {
                $query->where('category_id', $request->categoryId);
            })->with(['category']);
        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->where('name', 'LIKE', '%' . $searchValue . '%');
            });
        }

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
                case 1:
                    $dataFilterEloquent->orderBy('name', $orderDirection);
                    break;
                case 2:
                    $dataFilterEloquent->orderBy('kcal', $orderDirection);
                    break;
                default:
                    $dataFilterEloquent->orderBy('id', $orderDirection);
                    break;
            }
        }

        $iFilteredRecords = $dataFilterEloquent->count();
        $data = $dataFilterEloquent->skip($iDisplayStart)->limit($iDisplayLength)->get();

        $records = [
            'data' => [],
        ];

        $accessDelete = checkAccess('Products on objects', 'delete');
        $accessCE = checkAccess('Products on objects', 'create_edit');
        $accessView = checkAccess('Products on objects', 'view');

        foreach ($data as $row) {
            $category = optional($row->category);
            $records["data"][] = [
                ($accessCE ? '<a href="' . route('admin.objects.product.edit.view', ['objectId' => $object->id, 'id' => $row->id]) . '" style="color: black">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                     </a>' : '') . ' ' .
                ($accessDelete ? '<a href="' . route('admin.objects.product.delete', ['objectId' => $object->id, 'id' => $row->id]) . '" style="color: black" class="pl-3"
                        onclick="return confirm(' . __('Are you sure?') . ')">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                          <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                     </svg>
                     </a>' : ''),
                $object->prefix . parseId($object->id) . '-' . $row->prefix,
                ($accessView ? '<a href="' . route('admin.objects.product.edit.view', ['objectId' => $object->id, 'id' => $row->id]) . '">' . $row->name . '</a>' : $row->name),
                $row->kcal,
                $category->name,
                parseNumber(ProductData::where('object_id', $object->id)->where('product_id', $row->id)->sum('left_amount')) . ' ' . ($row->unit_of_measure == 'u' ? 'ct.' : $row->unit_of_measure),
                $object->name,
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);
    }

    public function objectProduct($objectId, $id)
    {
        $product = Product::with(['category'])->firstWhere('id', $id);

        $switch = '';
        switch ($product->unit_of_measure) {
            case "g":
                $switch = 'grams';
                break;
            case "ct":
                $switch = 'count';
                break;
            case "ml":
                $switch = 'ml';
                break;
        }
        $product->unit_of_measure = $switch;

        $object = ObjectModel::with(['products'])->firstWhere('id', $objectId);
        $objectProduct = $object->products->firstWhere('id', $product->id);

        return view('admin.objects.product', compact('product', 'object', 'objectProduct'));
    }

    public function objectProductEdit($objectId, $id, Request $request)
    {
        $object = ObjectModel::firstWhere('id', $objectId);
        $object->products()->detach($id);
        $object->products()->attach($id, [
            'sell_price' => $request->sell_price,
            'buy_price' => $request->buy_price,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.objects.product.edit.view', ['objectId' => $objectId, 'id' => $id]);
    }

    public function getObject(Request $request)
    {
        $object = ObjectModel::with(['areas', 'areas.subAreas', 'areas.timeslots'])->firstWhere('id', $request->objectId);

        return response()->json(['success' => true, 'object' => $object]);
    }

    public function objectProductDelete($objectId, $productId)
    {
        ObjectModel::find($objectId)->products()->detach($productId);

        return $this->productsList();
    }
}
