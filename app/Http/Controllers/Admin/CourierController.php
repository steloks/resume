<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\ObjectModel;
use App\Models\Order;
use App\Models\OrderRecipe;
use App\Models\OrderRecipeHistory;
use App\Models\Status;
use App\Models\SubArea;
use App\Models\TimeSlot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\String\u;

class CourierController extends Controller
{
    protected $invoiceController;

    public function __construct(InvoiceController $invoiceController)
    {
        $this->invoiceController = $invoiceController;
    }

    public function index()
    {
        $object = ObjectModel::with(['areas', 'areas.subAreas', 'areas.timeslots'])->first();
        $objects = ObjectModel::all();
        $couriers = User::whereHas('roles', function ($role) {
            $role->where('name', 'courier');
        })->get();

        $orederRecipes = OrderRecipe::where('status_id', 5)->where('date', getMenusDate())->count();

        return view('admin.couriers.list', compact('object', 'objects', 'couriers', 'orederRecipes'));
    }

    public function filterObjects(Request $request)
    {
        $object = ObjectModel::with(['areas', 'areas.subAreas', 'areas.timeslots'])->firstWhere('id', $request->objectId);

        $areas = '<option value="0">Select Area</option>';
        $subAreas = '<option value="0">Select SubArea</option>';
        $timeSlots = '<option value="0">Select Timeslot</option>';
        $couriers = '<option value="0">Select Courier</option>';

        foreach ($object->areas as $area) {
            $areas .= '<option value="' . $area->id . '">' . $area->name . '</option>';
        }

        foreach ($object->areas->first()->subAreas as $subArea) {
            $subAreas .= '<option value="' . $subArea->id . '">' . $subArea->name . '</option>';
        }

        foreach ($object->areas->first()->timeSlots as $timeSlot) {
            $timeSlots .= '<option value="' . $timeSlot->id . '">' . $timeSlot->start_at . '-' . $timeSlot->end_at . '</option>';
        }

        $couriersQ = User::whereHas('objects', function ($object) use ($request) {
            $object->where('object_id', $request->objectId);
        })->whereHas('roles', function ($role) {
            $role->where('name', 'Courier');
        })->get();

        foreach ($couriersQ as $courier) {
            $couriers .= '<option value="' . $courier->id . '">' . ($courier->name . ' ' . $courier->last_name) . '</option>';
        }

        return response()->json(['success' => true, 'areas' => $areas, 'subAreas' => $subAreas, 'timeSlots' => $timeSlots, 'couriers' => $couriers]);
    }

    public function filterAreas(Request $request)
    {
        $area = Area::with(['subAreas', 'timeSlots'])->where('id', $request->areaId)->first();

        $subAreas = '<option value="0">Select SubArea</option>';
        $timeSlots = '<option value="0">Select Timeslot</option>';
        $br = true;
        foreach ($area->subAreas as $subArea) {
            if ($br) {
                $subAreas .= '<option value="' . $subArea->id . '">' . $subArea->name . '</option>';
            } else {
                $subAreas .= '<option  value="' . $subArea->id . '">' . $subArea->name . '</option>';
            }
            $br = false;
        }

        foreach ($area->timeSlots as $timeSlot) {
            $timeSlots .= '<option value="' . $timeSlot->id . '">' . $timeSlot->start_at . '-' . $timeSlot->end_at . '</option>';
        }

        return response()->json(['success' => true, 'subAreas' => $subAreas, 'timeSlots' => $timeSlots]);
    }

    public function grid(Request $request)
    {
        $iTotalRecords = Order::all()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));


        $dataFilterEloquent = Order::query()->with(['recipes' => function ($recipes) use ($request) {
            $recipes->when(!empty($request->timeSlotId), function ($recipe) use ($request) {
                $recipe->whereHas('timeslot', function ($timeslot) use ($request) {
                    $timeslot->where('id', $request->timeSlotId);
                });
            });
            $recipes->where('date', getMenusDate());
            $recipes->whereNull('canceled_menu');
            $recipes->with('recipe');
        }, 'postcodeRelation.area.objects', 'postcodeRelation.subArea', 'recipes.timeslot', 'recipes.status'])
            ->when(!empty($request->areaId), function ($query) use ($request) {
                $query->whereHas('postcodeRelation', function ($postcode) use ($request) {
                    $postcode->whereHas('area', function ($area) use ($request) {
                        $area->where('id', $request->areaId);
                    });
                });
            })
            ->when(!empty($request->objectId), function ($query) use ($request) {
                $query->whereHas('postcodeRelation', function ($postcode) use ($request) {
                    $postcode->whereHas('area', function ($area) use ($request) {
                        $area->whereHas('objects', function ($object) use ($request) {
                            $object->where('objects.id', $request->objectId);
                        });
                    });
                });
            })
            ->when(!empty($request->subAreaId), function ($query) use ($request) {
                $query->whereHas('postcodeRelation', function ($postcode) use ($request) {
                    $postcode->whereHas('subArea', function ($area) use ($request) {
                        $area->where('id', $request->subAreaId);
                    });
                });
            })
            ->whereHas('recipes', function ($q) use ($request) {
                $q->where('date', getMenusDate());
                $q->whereNull('canceled_menu');
                $q->when(!empty($request->timeSlotId), function ($qr) use ($request) {
                    $qr->where('timeslot_id', $request->timeSlotId);
                });
            });

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->where('id', 'LIKE', '%' . $searchValue . '%');
            });
        }

        $iFilteredRecords = $dataFilterEloquent->count();

        $data = $dataFilterEloquent->skip($iDisplayStart)->limit($iDisplayLength)->get();

        $records = [
            'data' => [],
        ];

        foreach ($data as $row) {
            $timeSlot = '';
            $name = '';
            foreach ($row->recipes as $key => $recipe) {
                $timeSlot .= ($key == 0 ? '' : ', ') . (parseTimeslot($recipe->timeslot->start_at) ?? '') . '-' . (parseTimeslot($recipe->timeslot->end_at) ?? '');
                $name .= ($key == 0 ? '' : ', ') . 'Menu №' . $recipe->id . ' - ' . optional($recipe->recipe)->name;
            }
            $courier = optional(optional($row->recipes->first())->courier);
            $records["data"][] = [
                '<input class="menu-courier-assign" data-ids="' . $row->recipes->implode('id', ',') . '" type="checkbox">',
                parseEditRoute('orders', $row->id, $row->id, null, 'Orders'),
                $name,
                $row->postcodeRelation->area->objects->first()->name ?? '',
                $row->postcodeRelation->area->name ?? '',
                $row->postcodeRelation->subArea->name ?? '',
                $row->user_address ?? '',
                $timeSlot,
                $row->recipes->first()->status->name,
                ($courier->name ?? '') . ' ' . ($courier->last_name ?? ''),
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);
    }

    public function assign(Request $request)
    {
//        $menuCourierTakenStatusId = Status::query()->where('name', 'like', "%Courier taken%")->where('type', 'order_recipe')->first()->id;

        OrderRecipe::whereIn('id', explode(',', $request->ids))->update([
            'courier_id' => $request->courierId,
//            'status_id' => $menuCourierTakenStatusId,
        ]);

        foreach (explode(',', $request->ids) as $recipeId) {
            if (!empty($recipeId)) {
                OrderRecipeHistory::create([
                    'order_recipe_id' => $recipeId,
                    'status_id' => 5,
                ]);
            }
        }

        return response()->json(['success' => true]);
    }

    public function courierByArea(Request $request)
    {
        $area = Area::with(['objects.users' => function ($user) {
            $user->whereHas('roles', function ($role) {
                $role->where('name', 'courier');
            });
        }])->where('id', (int)$request->areaId)->first();
        $couriers = [];

        foreach ($area->objects as $object) {
            foreach ($object->users as $user)
                $couriers[$user->id] = $user;
        }

        return response()->json(['success' => true, 'view' => view('admin.kitchen.courier-select', compact('couriers'))->render()]);
    }

    public function deliveries()
    {
        $couriers = User::whereHas('roles', function ($role) {
            $role->where('name', 'courier');
        })->get();

        return view('admin.delivery.list', compact('couriers'));
    }

    public function gridDelivery(Request $request)
    {
        $iTotalRecords = Order::all()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));

        $dataFilterEloquent = Order::query()->with(['recipes' => function ($recipes) use ($request) {
            $recipes->where('date', getMenusDate());
            $recipes->whereIn('status_id', [7, 8, 9]);
            $recipes->with('recipe');
            $recipes->when(Auth::guard('admin')->user()->hasRole('Admin'), function ($query) use ($request) {
                $query->when(!empty($request->courierId), function ($query) use ($request) {
                    $query->where('courier_id', $request->courierId);
                });
            });
            $recipes->when(!Auth::guard('admin')->user()->hasRole('Admin'), function ($query) use ($request) {
                $query->where('courier_id', Auth::guard('admin')->user()->id);
            });
        }, 'postcodeRelation.area.objects', 'postcodeRelation.subArea', 'recipes.timeslot', 'recipes.status', 'client'])
            ->whereHas('recipes', function ($q) use ($request) {
                $q->where('date', getMenusDate());
                $q->whereIn('status_id', [7, 8, 9]);
                $q->when(Auth::guard('admin')->user()->hasRole('Admin'), function ($query) use ($request) {
                    $query->when(!empty($request->courierId), function ($query) use ($request) {
                        $query->where('courier_id', $request->courierId);
                    });
                });
                $q->when(!Auth::guard('admin')->user()->hasRole('Admin'), function ($query) use ($request) {
                    $query->where('courier_id', Auth::guard('admin')->user()->id);
                });
            });

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->where('id', 'LIKE', '%' . $searchValue . '%');
            });
        }

        $iFilteredRecords = $dataFilterEloquent->count();

        $data = $dataFilterEloquent->skip($iDisplayStart)->limit($iDisplayLength)->orderBy('id')->get();

        $records = [
            'data' => [],
        ];

        foreach ($data as $row) {
            $timeSlot = '';
            $name = '';
            foreach ($row->recipes as $key => $recipe) {
                $timeSlot .= ($key == 0 ? '' : ', ') . (parseTimeslot($recipe->timeslot->start_at) ?? '') . '-' . (parseTimeslot($recipe->timeslot->end_at) ?? '');
                $name .= ($key == 0 ? '' : ', ') . '1 x ' . $recipe->recipe->name;
            }

            $options = '';
            foreach (Status::whereIn('id', [7, 8, 9])->get() as $option) {
                if ($row->recipes->first()->status_id > $option->id) {
                    continue;
                }
                $options .= '<option ' . ($option->id == $row->recipes->first()->status_id ? 'selected' : '') . ' value="' . $option->id . '">' . $option->name . '</option>';
            }

            $courier = optional(optional($row->recipes->first())->courier);
            $records["data"][] = [
                '<input class="menu-courier-status-change" data-ids="' . $row->recipes->implode('id', ',') . '" type="checkbox">',
                parseEditRoute('orders', $row->id, $row->id),
                $name,
                $row->postcodeRelation->area->objects->first()->name ?? '',
                ($row->client->name ?? ' ') . ', ' . ($row->client->phone ?? ''),
                $row->postcodeRelation->area->name ?? '',
                $row->postcodeRelation->subArea->name ?? '',
                $row->user_address ?? '',
                $timeSlot,
                '<select class="form-control menu-status-change" data-route="' . route('admin.couriers.deliveries.status.change') . '">' . $options . '</select>',
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);
    }

    public function deliveryStatusChange(Request $request)
    {
        $ids = explode(',', $request->ids);
        OrderRecipe::whereIn('id', $ids)->update([
            'status_id' => $request->statusId
        ]);

        foreach ($ids as $id) {
            OrderRecipeHistory::create([
                'order_recipe_id' => (int)$id,
                'status_id' => $request->statusId,
            ]);
        }

        if ($request->statusId == 9) {
            foreach ($ids as $id) {
                $orderRecipe = OrderRecipe::with('order.recipes')->firstWhere('id', $id);
                if (!$orderRecipe->order->recipes->whereNull('canceled_menu')->where('status_id', '!=', 9)->count()) {
                    $this->invoiceController->createInvoice($orderRecipe->order->id);
                    Order::firstWhere('id', $orderRecipe->order->id)->update([
                        'status_id' => 4,
                    ]);
                }
            }
        }

        return response()->json(['success' => true]);
    }
}
