<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderRecipe;
use App\Models\OrderRecipeHistory;
use App\Models\Status;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $orderStatuses = Status::query()->where('type', 'order')->get();
        $areas = Order::query()
            ->select(['areas.id', 'areas.name'])
            ->join('postcodes', 'orders.user_postcode', '=', 'postcodes.postcode')
            ->join('areas', 'postcodes.area_id', '=', 'areas.id')
            ->pluck('areas.name', 'areas.id')
            ->toArray();
        $subAreas = Order::query()
            ->select(['sub_areas.id', 'sub_areas.name'])
            ->join('postcodes', 'orders.user_postcode', '=', 'postcodes.postcode')
            ->join('sub_areas', 'postcodes.sub_area_id', '=', 'sub_areas.id')
            ->pluck('sub_areas.name', 'sub_areas.id')
            ->toArray();
        $objects = Order::query()
            ->select(['objects.id', 'objects.name'])
            ->join('postcodes', 'orders.user_postcode', '=', 'postcodes.postcode')
            ->join('areas', 'postcodes.area_id', '=', 'areas.id')
            ->join('object_areas', 'areas.id', '=', 'object_areas.area_id')
            ->join('objects', 'object_areas.object_id', '=', 'objects.id')
            ->pluck('objects.name', 'objects.id')
            ->toArray();

        return view('admin.orders.index')->with([
            'orderStatuses' => $orderStatuses,
            'areas' => $areas,
            'subAreas' => $subAreas,
            'objects' => $objects,
        ]);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id): View
    {
        $order = Order::with([
            'client' => function ($q) {
                $q->withTrashed();
            },
            'recipes'
        ])->firstWhere('id', $id);
        $orderRecipeIds = $order->recipes->modelKeys();

        $statuses = Status::where('type', 'order_recipe')->get();
        $orderRecipesHistory = OrderRecipeHistory::query()->whereIn('order_recipe_id', $orderRecipeIds)->with(['status'])->get();


        return view('admin.orders.edit')->with(['order' => $order, 'statuses' => $statuses, 'orderRecipesHistory' => $orderRecipesHistory]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except(['_token', 'order_products_length']);
        $order = Order::firstWhere('id', $id);

        if (count($data['date'])) {
            foreach ($data['date'] as $orderRecipeId => $date) {
                $order->recipes()->where('id', $orderRecipeId)->first()->update([
                    'date' => Carbon::parse($date)->format('Y-m-d H:i:s'),
                ]);
            }
        }

        if (count($data['timeslot_id'])) {
            foreach ($data['timeslot_id'] as $orderRecipeId => $timeslotId) {
                $order->recipes()->where('id', $orderRecipeId)->first()->update(['timeslot_id' => $timeslotId]);
            }
        }

        unset($data['date']);
        unset($data['timeslot_id']);
        $order->update($data);

        return redirect()->back();
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function gridDataAdminOrders(Request $request): JsonResponse
    {
        $iTotalRecords = Order::all()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));
        $orderStatusId = $request->get('order_status_id');
        $areaId = $request->get('area_id');
        $subAreaId = $request->get('sub_area_id');
        $objectId = $request->get('object_id');
        $startDate = $request->get('order_start_date');
        $endDate = $request->get('order_end_date');

        $dataFilterEloquent = Order::query([
            'orders.*',
        ])->with([
            'recipes',
            'status',
            'postcodeRelation',
            'postcodeRelation.area',
            'postcodeRelation.area.objects',
            'postcodeRelation.subarea',
            'client' => function ($q) {
                $q->withTrashed();
            },
        ]);

        if (!empty($orderStatusId)) {
            $dataFilterEloquent->whereHas('status', function ($q) use ($orderStatusId) {
                $q->where('id', $orderStatusId);
            });
        }

        if (!empty($areaId)) {
            $dataFilterEloquent->whereHas('postcodeRelation.area', function ($q) use ($areaId) {
                $q->where('id', $areaId);
            });
        }

        if (!empty($subAreaId)) {
            $dataFilterEloquent->whereHas('postcodeRelation.subarea', function ($q) use ($subAreaId) {
                $q->where('id', $subAreaId);
            });
        }

        if (!empty($objectId)) {
            $dataFilterEloquent->whereHas('postcodeRelation.area.objects', function ($q) use ($objectId) {
                $q->where('objects.id', $objectId);
            });
        }

        if (!empty($startDate) && !empty($endDate)) {
            $dataFilterEloquent->whereBetween('created_at', [Carbon::parse($startDate)->format('Y-m-d H:i:s'), Carbon::parse($endDate)->format('Y-m-d H:i:s')]);
        }

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->where('orders.id', $searchValue)->orWhereHas('client', function ($q) use ($searchValue) {
                    $q->where('name', 'LIKE', '%' . $searchValue . '%');
                });
            });
        }

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
                case 1:
                    $dataFilterEloquent->orderBy('order.created_at', $orderDirection);
                    break;
                case 2:
                    $dataFilterEloquent->whereHas('areas', function ($q) use ($orderDirection) {
                        $q->orderBy('name', $orderDirection);
                    });
                    break;
                case 3:
                    $dataFilterEloquent->orderBy('orders.created_at', $orderDirection);
                    break;
                case 4:
                    $dataFilterEloquent->orderBy('orders.status', $orderDirection);
                    break;
                default:
                    $dataFilterEloquent->orderBy('id', ($orderDirection == 'ASC' ? 'DESC' : 'ASC'));
                    break;
            }
        }


        $iFilteredRecords = $dataFilterEloquent->count();
        $data = $dataFilterEloquent->skip($iDisplayStart)->limit($iDisplayLength)->get();

        $records = [
            'data' => [],
        ];

        foreach ($data as $row) {

            $records["data"][] = [
                parseEditRoute('orders', $row->id, $row->id, 'asIcon'),
                parseEditRoute('orders', $row->id, $row->id),
                parseDate($row->created_at),
                parsePrice($row->total_amount),
                parseEditRoute('clients', $row->client->id, $row->client->name . ' ' . $row->client->last_name),
                !empty($row->postcodeRelation) ? optional($row->postcodeRelation->area)->name : '',
                !empty($row->postcodeRelation) ? optional($row->postcodeRelation->subArea)->name : '',
                !empty($row->postcodeRelation) ? optional($row->postcodeRelation->area->objects->first())->name : '',
                $row->status->name,
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param                          $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function gridDataAdminOrderProducts(Request $request, $id): JsonResponse
    {
        $iTotalRecords = OrderRecipe::where('order_id', $id)->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));

        $dataFilterEloquent = OrderRecipe::query([
            'order_recipes.*',
        ])->where('order_id', $id)->with(['recipe', 'order', 'timeslot', 'status']);

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
                case 1:
                    $dataFilterEloquent->orderBy('order.created_at', $orderDirection);
                    break;
                case 2:
                    $dataFilterEloquent->whereHas('areas', function ($q) use ($orderDirection) {
                        $q->orderBy('name', $orderDirection);
                    });
                    break;
                case 3:
                    $dataFilterEloquent->orderBy('orders.created_at', $orderDirection);
                    break;
                case 4:
                    $dataFilterEloquent->orderBy('orders.status', $orderDirection);
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
            $courierName = !empty($row->courier) ? $row->courier->name . ' ' . $row->courier->last_name : '';
            $kitchenStaff = !empty($row->preparedBy) ? $row->preparedBy->name . ' ' . $row->preparedBy->last_name : '';

            $records["data"][] = [
                $row->order_id . '-0' . $row->id,
                $row->recipe->name,
                $row->grams,
                $row->pet->name,
                renderInput('text', 'form-control js-order-product-delivery-date', 'delivery_date_product' . $row->id,
                    'date[' . $row->id . ']', '', parseDate($row->date)),
                renderTimeslotSelect('form-control', 'select', 'timeslot_id[' . $row->id . ']', '', $row->timeslot_id,
                    $row, 'timeslot', $row->order->postcodeRelation->area->id),
                $row->status->name,
                $kitchenStaff,
                $courierName,
                parsePrice($row->price),
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);
    }
}
