<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\City;
use App\Models\ObjectModel;
use App\Models\Postcode;
use App\Models\SubArea;
use App\Models\TimeSlot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Time;

class ZoningController extends Controller
{
    public function citiesView()
    {
        return view('admin.zoning.cities');
    }

    public function cityAddView()
    {
        return view('admin.zoning.city-add');
    }

    public function regionsView()
    {
        return view('admin.zoning.regions');
    }

    public function regionsDeliveryPriceView()
    {
        return view('admin.zoning.regions-price-delivery-list');
    }

    public function regionsDeliveryPriceEditView($id)
    {
        $area = Area::with('city')->where('id', $id)->first();

        return view('admin.zoning.regions-price-delivery-edit', compact('area'));
    }

    public function regionsDeliveryPriceEdit(Request $request)
    {
        Area::firstWhere('id', $request->area_id)->update([
            'delivery_price' => $request->delivery_price
        ]);

        return redirect()->route('admin.zoning.regions.delivery.price.view');
    }

    public function regionAddView()
    {
        $cities = City::all();

        $objects = ObjectModel::all();

        return view('admin.zoning.region-add', compact('cities', 'objects'));
    }

    public function postcodesView()
    {
        $areas = Area::all();

        return view('admin.zoning.postcodes', compact('areas'));
    }

    public function postcodesAddView($id = null)
    {
        $areas = Area::all();
        if (isset($id)) {
            $postcode = Postcode::where('id', $id)->first();
            $subAreas = SubArea::where('area_id', $postcode->area_id)->get();

            return view('admin.zoning.postcode-add', compact(['areas', 'postcode', 'subAreas']));
        }

        return view('admin.zoning.postcode-add', compact('areas'));
    }

    public function postcodeDelete($id)
    {
        Postcode::firstWhere('id', $id)->delete();

        return $this->postcodesView();
    }

    public function cityAdd(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cities',
        ]);

        $user = Auth::guard('admin')->user();

        $city = City::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => $user->name . ' ' . $user->last_name,
        ]);

        return redirect()->route('admin.zoning.city.edit.view', ['id' => $city->id]);
    }

    public function cityEditView($id)
    {
        $city = City::with('areas')->where('id', $id)->first();

        return view('admin.zoning.city-edit', compact('city'));
    }

    public function cityEdit(Request $request)
    {
        $city = City::where('id', $request->city_id)->first();
        $city->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        foreach ($request->sub_area_name as $key => $value) {
            $area = Area::where('id', $key)->first();
            $area->update([
                'name' => $value,
                'status' => $request->sub_area_status[$key],
            ]);
        }

        return redirect()->route('admin.zoning.city.edit.view', ['id' => $city->id]);
    }

    public function cityRegions(Request $request)
    {
        return response()->json(['success' => true, 'areas' => Area::where('city_id', $request->cityId)->get()]);
    }

    public function regionAdd(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'city_id' => 'required',
        ]);

        $area = Area::create([
            'name' => $request->name,
            'city_id' => $request->city_id,
            'description' => $request->description,
            'status' => $request->status,
            'delivery_price' => $request->delivery_price,
        ]);

        if (isset($request->kitchen_id)) {
            $area->objects()->detach();
            $area->objects()->attach($request->kitchen_id);
        }

        if (isset($request->sub_area_name)) {
            foreach ($request->sub_area_name as $key => $subArea) {
                if (!isset($subarea)) {
                    continue;
                }
                SubArea::create([
                    'area_id' => $area->id,
                    'name' => $subArea,
                    'status' => $request->sub_area_status[$key],
                ]);
            }
        }

        return redirect()->route('admin.zoning.regions');
    }

    public function regionEditView($id)
    {
        $cities = City::all();

        $area = Area::with(['subAreas', 'objects'])->where('id', $id)->first();

        $objects = ObjectModel::all();

        return view('admin.zoning.region-edit', compact('area', 'cities', 'objects'));
    }

    public function regionEdit(Request $request)
    {
        $area = Area::where('id', $request->area_id)->first();

        $area->update([
            'city_id' => $request->city_id,
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'delivery_price' => $request->delivery_price,
        ]);

        $area->subAreas()->delete();

        if (isset($request->kitchen_id)) {
            $area->objects()->detach();
            $area->objects()->attach($request->kitchen_id);
        }

        if (isset($request->sub_area_name)) {
            foreach ($request->sub_area_name as $key => $subarea) {
                if (!isset($subarea)) {
                    continue;
                }
                SubArea::create([
                    'area_id' => $area->id,
                    'name' => $subarea,
                    'status' => $request->sub_area_status[$key],
                ]);
            }
        }

        return redirect()->route('admin.zoning.regions.edit.view', ['id' => $area->id]);
    }

    public function subAreaDelete(Request $request)
    {
        $subArea = SubArea::where('id', $request->id)->first();

        $subArea->delete();

        return response()->json(['success' => true]);
    }

    public function subAreaByArea(Request $request)
    {
        $subAreas = SubArea::where('area_id', $request->id)->get();

        return response()->json(['success' => true, 'subAreas' => $subAreas]);
    }

    public function postcodesAdd(Request $request)
    {
        $postcode = Postcode::updateOrCreate([
            'id' => $request->postcode_id,
        ], [
                "postcode" => strtoupper(str_replace(' ', '', $request->postcode)),
                "area_id" => $request->area_id,
                "sub_area_id" => $request->sub_area_id,
                "status" => $request->status,
            ]
        );

        return redirect()->route('admin.zoning.postcodes');
    }

    public function timeslotsView()
    {
        $cities = City::all();
        return view('admin.zoning.timeslots', compact('cities'));
    }

    public function timeslotsAddView()
    {
        $cities = City::all();

        return view('admin.zoning.timeslots-add', compact('cities'));
    }

    public function timeslotsAdd(Request $request)
    {
        $request->validate([
            'start_at' => 'required',
            'end_at' => 'required',
            'area_id' => 'required',
        ]);

        TimeSlot::updateOrCreate([
            'id' => $request->timeslotId
        ], $request->all());

        return redirect()->route('admin.zoning.timeslots');
    }

    public function timeslotsEdit($id)
    {
        $timeslot = TimeSlot::with(['area', 'area.city', 'area.city.areas'])->find($id);
        $cities = City::all();

        return view('admin.zoning.timeslots-add', compact('cities', 'timeslot'));
    }


    public function regionByCity(Request $request)
    {
        $areas = Area::where('city_id', $request->id)->get();

        return response()->json(['success' => true, 'areas' => $areas]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function gridDataCities(Request $request): \Illuminate\Http\JsonResponse
    {
        $iTotalRecords = City::all()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));

        $dataFilterEloquent = City::query([
            'cities.id',
            'cities.name',
            'cities.description',
            'cities.created_by',
            'cities.created_at',
        ])->with(['areas']);

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->where('cities.name', 'LIKE', '%' . $searchValue . '%');
                $query->oRWhereHas('areas', function ($area) use ($searchValue) {
                    $area->where('name', 'LIKE', '%' . $searchValue . '%');
                });
            });
        }

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
                case 1:
                    $dataFilterEloquent->orderBy('cities.name', $orderDirection);
                    break;
                case 2:
                    $dataFilterEloquent->whereHas('areas', function ($q) use ($orderDirection) {
                        $q->orderBy('name', $orderDirection);
                    });
                    break;
                case 3:
                    $dataFilterEloquent->orderBy('cities.created_at', $orderDirection);
                    break;
                case 4:
                    $dataFilterEloquent->orderBy('cities.created_by', $orderDirection);
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
            $areas = $row->areas->where('status', 1)->pluck('name')->toArray();

            $records["data"][] = [
                $row->id,
                parseEditRoute('zoning.city', $row->id, $row->name, null, 'Cities'),
                implode(',', $areas),
                parseDate($row->created_at),
                $row->created_by,
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function gridDataPostcodes(Request $request): \Illuminate\Http\JsonResponse
    {
        $iTotalRecords = Postcode::all()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));

        $dataFilterEloquent = Postcode::query([
            'postcodes.id',
            'postcodes.postcode',
            'postcodes.status',
            'postcodes.created_by',
            'postcodes.created_at',
            'postcodes.area_id',
            'postcodes.sub_area_id',
        ])->with(['area', 'subArea'])
            ->when(!empty($request->areaId), function ($query) use ($request) {
                $query->where('area_id', $request->areaId);
            })
            ->when(!empty($request->subAreaId), function ($query) use ($request) {
                $query->where('sub_area_id', $request->subAreaId);
            });

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->where('postcodes.postcode', 'LIKE', '%' . $searchValue . '%');
            });
        }

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
                case 1:
                    $dataFilterEloquent->orderBy('postcodes.postcode', $orderDirection);
                    break;
                case 2:
                    $dataFilterEloquent->whereHas('area', function ($q) use ($orderDirection) {
                        $q->orderBy('name', $orderDirection);
                    });
                    break;
                case 3:
                    $dataFilterEloquent->whereHas('subArea', function ($q) use ($orderDirection) {
                        $q->orderBy('name', $orderDirection);
                    });
                    break;
                case 4:
                    $dataFilterEloquent->orderBy('postcodes.created_at', $orderDirection);
                    break;
                case 5:
                    $dataFilterEloquent->orderBy('postcodes.created_by', $orderDirection);
                    break;
                case 6:
                    $dataFilterEloquent->orderBy('postcodes.status', $orderDirection);
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
            $status = '<span class="' . (!empty($row->status) ? 'bg-rgba-success' : 'bg-rgba-danger') . '">' .
                (!empty($row->status) ? 'Active' : 'Inactive') . '</span>';

            $records["data"][] = [
                parseEditRoute('zoning.postcode', $row->id, $row->postcode, 'asIcon', 'PC Addresses') . parseDeleteRoute('zoning.postcode', $row->id, $row->id, 'asIcon', 'PC Addresses'),
                $row->id,
                parseEditRoute('zoning.postcode', $row->id, $row->postcode, null, 'PC Addresses'),
                optional($row->area)->name,
                optional($row->subArea)->name,
                parseDate($row->created_at),
                $row->created_by,
                $status,
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function gridDataRegions(Request $request): \Illuminate\Http\JsonResponse
    {
        $iTotalRecords = Area::all()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));

        $dataFilterEloquent = Area::query([
            'areas.id',
            'areas.name',
            'areas.description',
            'areas.created_by',
            'areas.created_at',
            'areas.status',
        ])->with(['city', 'objects']);

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->where('areas.name', 'LIKE', '%' . $searchValue . '%');
            });
        }

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
                case 1:
                    $dataFilterEloquent->orderBy('areas.name', $orderDirection);
                    break;
                case 2:
                    $dataFilterEloquent->whereHas('city')->orderBy('name', $orderDirection);
                    break;
                case 3:
                    $dataFilterEloquent->whereHas('objects')->orderBy('name', $orderDirection);
                    break;
                case 4:
                    $dataFilterEloquent->orderBy('areas.created_at', $orderDirection);
                    break;
                case 5:
                    $dataFilterEloquent->orderBy('areas.created_by', $orderDirection);
                    break;
                case 6:
                    $dataFilterEloquent->orderBy('areas.status', $orderDirection);
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

            $status = '<span class="' . (!empty($row->status) ? 'bg-rgba-success' : 'bg-rgba-danger') . '">' .
                (!empty($row->status) ? 'Active' : 'Inactive') . '</span>';

            $records["data"][] = [
                parseEditRoute('zoning.regions', $row->id, $row->name, 'asIcon', 'Areas') . ' ' . parseDeleteRoute('zoning.regions', $row->id, $row->name, 'asIcon', 'Areas'),
                $row->id,
                parseEditRoute('zoning.regions', $row->id, $row->name, null, 'Areas'),
                $row->city->name,
                $row->objects->pluck('name')->implode(', '),
                $row->delivery_price,
                parseDate($row->created_at),
                $row->created_by,
                $status,
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);

    }

    public function gridDataTimeslots(Request $request)
    {
        $iTotalRecords = TimeSlot::all()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));

        $dataFilterEloquent = TimeSlot::query([
            'areas.id',
            'areas.name',
            'areas.description',
            'areas.created_by',
            'areas.created_at',
            'areas.status',
        ])->with(['area', 'area.city'])
            ->when(!empty($request->areaId), function ($query) use ($request) {
                $query->where('area_id', $request->areaId);
            })
            ->when(empty($request->areaId), function ($query) use ($request) {
                $query->when(!empty($request->cityId), function ($query) use ($request) {
                    $query->whereIn('area_id', Area::where('city_id', $request->cityId)->pluck('id')->toArray());
                });
            });

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
//            $dataFilterEloquent->where(function ($query) use ($searchValue) {
//                $query->where('areas.name', 'LIKE', '%' . $searchValue . '%');
//            });
        }

        // Sorting
        $order = $request->get('order');
//        if (isset($order[0]['column'])) {
//            $orderDirection = mb_strtoupper($order[0]['dir']);
//            switch ($order[0]['column']) {
//                case 1:
//                    $dataFilterEloquent->orderBy('areas.name', $orderDirection);
//                    break;
//                case 2:
//                    $dataFilterEloquent->whereHas('city')->orderBy('name', $orderDirection);
//                    break;
//                case 3:
//                    $dataFilterEloquent->whereHas('objects')->orderBy('name', $orderDirection);
//                    break;
//                case 4:
//                    $dataFilterEloquent->orderBy('areas.created_at', $orderDirection);
//                    break;
//                case 5:
//                    $dataFilterEloquent->orderBy('areas.created_by', $orderDirection);
//                    break;
//                case 6:
//                    $dataFilterEloquent->orderBy('areas.status', $orderDirection);
//                    break;
//                default:
//                    $dataFilterEloquent->orderBy('id', $orderDirection);
//                    break;
//            }
//        }

        $iFilteredRecords = $dataFilterEloquent->count();
        $data = $dataFilterEloquent->skip($iDisplayStart)->limit($iDisplayLength)->get();

        $records = [
            'data' => [],
        ];

        foreach ($data as $row) {
            $records["data"][] = [
                parseEditRoute('zoning.timeslots', $row->id, $row->id, 'isIcon', 'Time slot'),
                parseDeleteRoute('zoning.timeslots', $row->id, $row->id, 'isIcon', 'Time slot'),
                parseEditRoute('zoning.timeslots', $row->id, parseTimeslot($row->start_at) . '-' . parseTimeslot($row->end_at), null, 'Time slot'),
                $row->area->city->name,
                $row->area->name,
                parseDate($row->created_at),
                $row->created_by,
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);
    }

    public function timeslotsDelete($id)
    {
        TimeSlot::firstWhere('id', $id)->delete();

        return $this->timeslotsView();
    }

    public function validPostcode(Request $request)
    {
        $postcode = Postcode::where('postcode', 'like', '%' . $request->postcode . '%')->get();
        $response = false;
        if (!$postcode->isEmpty()) {
            $response = true;
        }

        return response()->json(['success' => $response]);
    }

    public function regionSubAreas(Request $request)
    {
        return response()->json(['success' => true, 'subAreas' => SubArea::where('area_id', $request->areaId)->get()]);
    }

    public function regionDelete($id)
    {
        Area::firstWhere('id', $id)->delete();

        return $this->regionsView();
    }

    public function importCSV(Request $request)
    {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        $spreadsheet = $reader->load($request->csv->getPathName());
        $postcodes = $spreadsheet->getActiveSheet()->toArray();
        unset($postcodes[0]);
        $sortedByArea = [];
        $cityName = explode(' ', $postcodes[1][15])[0];
        $city = City::updateOrCreate(['name' => $cityName], ['name' => $cityName]);

        foreach ($postcodes as $postcode) {
            $sortedByArea[explode(' ', $postcode[0])[0]][] = $postcode[0];
        }

        $importPostcodes = [];
        foreach ($sortedByArea as $area => $postcodes) {
            $area = Area::updateOrCreate(
                [
                    'name' => $area,
                ],
                [
                    'name' => $area,
                    'city_id' => $city->id,
                    'status' => 1,
                ]);

            foreach ($postcodes as $postcode) {
                $importPostcodes[] = [
                    'postcode' => strtoupper(str_replace(' ', '', $postcode)),
                    'area_id' => $area->id,
                    'sub_area_id' => 0,
                    'status' => 1,
                ];
            }
        }

        Postcode::insert($importPostcodes);

        return redirect()->back();
    }
}
