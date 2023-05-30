<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Order;
use App\Models\OrderRecipe;
use App\Models\OrderRecipeHistory;
use App\Models\Product;
use App\Models\Recipe;
use App\Models\Status;
use App\Models\User;
use App\PrintNode\PrintJobSender;
use App\Traits\RecipeCalculator;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class KitchenController extends Controller
{
    use RecipeCalculator;

    public function objectByRegion(Request $request)
    {
        $request->validate([
            'areaId' => 'required',
            'courierId' => 'required',
        ]);

        return redirect()->route('admin.kitchen.region.menus', ['regionId' => $request->areaId, 'courierId' => $request->courierId]);
    }

    public function indexKitchen()
    {
        //TODO If the address is not active it should not show up;
        $areas = Area::all();

        return view('admin.kitchen.region-select', compact('areas'));
    }

    public function menusByRegion($regionId, $courierId)
    {
        $dataFilterEloquent = Order::whereHas('recipes', function ($orderRecipe) use ($courierId) {
            $orderRecipe->where('date', getMenusDate());
            $orderRecipe->where('courier_id', $courierId);
            $orderRecipe->whereNull('canceled_menu');
        })->whereHas('postcodeRelation', function ($postcode) use ($regionId) {
            $postcode->whereHas('area', function ($area) use ($regionId) {
                $area->where('id', $regionId);
            });
        })->with(['recipes' => function ($orderRecipe) use ($courierId) {
            $orderRecipe->where('date', getMenusDate());
            $orderRecipe->whereNull('canceled_menu');
            $orderRecipe->where('courier_id', $courierId);
            $orderRecipe->with('timeslot')->with('courier');
        }, 'postcodeRelation.area.objects'])->get();

        $count = 0;
        foreach ($dataFilterEloquent as $d) {
            $count += $d->recipes->count();
        }

        return view('admin.kitchen.region-menus', compact('regionId', 'courierId', 'count'));
    }

    public function menusByRegionGrid($regionId, $courierId, Request $request)
    {
        $iTotalRecords = Order::all()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));

        $dataFilterEloquent = Order::whereHas('recipes', function ($orderRecipe) use ($courierId) {
            $orderRecipe->where('date', getMenusDate());
            $orderRecipe->where('courier_id', $courierId);
            $orderRecipe->whereNull('canceled_menu');
        })->whereHas('postcodeRelation', function ($postcode) use ($regionId) {
            $postcode->whereHas('area', function ($area) use ($regionId) {
                $area->where('id', $regionId);
            });
        })->with(['recipes' => function ($orderRecipe) use ($courierId) {
            $orderRecipe->where('date', getMenusDate());
            $orderRecipe->where('courier_id', $courierId);
            $orderRecipe->whereNull('canceled_menu');
            $orderRecipe->with('timeslot')->with(['courier', 'preparedBy']);
        }, 'postcodeRelation.area.objects']);

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
            $area = $row->postcodeRelation->area;
            $preparedBy = $row->recipes->first()->preparedBy;
            $timeslot = '';
            $name = '';

            foreach ($row->recipes as $key => $recipe) {
                $name .= ($key == 0 ? '' : ', ') . 'Menu №' . $recipe->id . ' - ' . optional($recipe->recipe)->name;
                if ($row->recipes->count() == 1) {
                    $timeslot .= Carbon::create($recipe->timeslot->start_at)->format('H:s') . ':' . Carbon::create($recipe->timeslot->end_at)->format('H:i');
                } else {
                    $timeslot .= Carbon::create($recipe->timeslot->start_at)->format('H:i') . ' : ' . Carbon::create($recipe->timeslot->end_at)->format('H:i') . ',';
                }
            }

            $records["data"][] = [
                $row->id,
                $name,
                (optional($preparedBy)->name ?? Auth::guard('admin')->user()->name) . ' ' . (optional($preparedBy)->last_name ?? Auth::guard('admin')->user()->name),
                $area->objects->first()->name,
                optional($area->city)->name . ',' . $area->name . ',' . optional($row->postcodeRelation->subArea)->name,
                $timeslot,
                $row->recipes->first()->status->name,
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);
    }

    public function cooking($regionId, $courierId)
    {
        $order = Order::whereHas('recipes', function ($orderRecipe) use ($courierId) {
            $orderRecipe->whereNull('canceled_menu');
            $orderRecipe->where('date', getMenusDate());
            $orderRecipe->where('courier_id', $courierId);
            $orderRecipe->where(function ($q) {
                $q->where('status_id', 5);
                $q->OrWhere('status_id', 6);
            });
        })->whereHas('postcodeRelation', function ($postcode) use ($regionId) {
            $postcode->whereHas('area', function ($area) use ($regionId) {
                $area->where('id', $regionId);
            });
        })->with(['recipes' => function ($orderRecipe) use ($courierId) {
            $orderRecipe->whereNull('canceled_menu');
            $orderRecipe->where('date', getMenusDate());
            $orderRecipe->where('courier_id', $courierId);
            $orderRecipe->where(function ($q) {
                $q->where('status_id', 5);
                $q->OrWhere('status_id', 6);
            });
            $orderRecipe->with(['timeslot', 'recipe', 'courier']);
        }, 'postcodeRelation.area.objects'])->first();

        if (!$order) {
            return redirect()->route('admin.kitchen.index');
        }

        foreach ($order->recipes as $recipe) {
            $status = Status::where('type', 'order_recipe')->where('name', 'like', '%Preparing%')->first()->id;

            $recipe->update([
                'status_id' => $status
            ]);

            OrderRecipeHistory::create([
                'order_recipe_id' => $recipe->id,
                'status_id' => $status,
            ]);
        }

        return view('admin.kitchen.cooking', compact('order', 'regionId', 'courierId'));
    }

    public function petRecipeProducts($recipeId, $petId, Request $request)
    {
        $data = $this->recipeCalc($recipeId, $petId);

        $records = [
            'data' => [],
        ];
        $total = 0;

        foreach ($data['products'] as $productId => $row) {
            $total += $row['weight'] * 1000;
            $product = Product::firstWhere('id', $productId);
            $records["data"][] = [
                $product->name,
                number_format((float)($row['weight'] * 1000), 2, '.', '') . ' ' . $product->unit_of_measure . '.',
            ];
        }

        $records["draw"] = (int)($request->get('draw'));
        $records["recordsTotal"] = count($data['products']);
        $records["recordsFiltered"] = count($data['products']);
        $records["totalAmount"] = parseNumber($total) . __('g');

        return response()->json($records);
    }

    public function menuReady(Request $request)
    {
        $request->validate([
            'orderRecipeIds' => 'required'
        ]);

        $menuCompletedStatusId = Status::query()->where('name', 'like', "%Completed%")->where('type', 'order_recipe')->first()->id;

        OrderRecipe::whereIn('id', $request->orderRecipeIds)->update([
            'status_id' => $menuCompletedStatusId,
            'prepared_by' => Auth::guard('admin')->user()->id,
        ]);

        foreach ($request->orderRecipeIds as $recipeId) {
            OrderRecipeHistory::create([
                'order_recipe_id' => $recipeId,
                'status_id' => $menuCompletedStatusId,
            ]);
        }
        return redirect()->route('admin.kitchen.cooking', ['regionId' => $request->regionId, 'courierId' => $request->courierId]);
    }

    public function printOrder(Request $request)
    {
        $recipes = OrderRecipe::whereIn('id', explode(',', $request->orderRecipeIds))->with(['timeslot', 'recipe', 'courier', 'pet', 'order'])->get();

        $jobOrderNames = "";
        $zplList = [];
        foreach ($recipes as $recipe) {
            //$zpl = "^XA ^CI28 ^FX label 2 80x100 ^FX box ^FO50,50^GB550,700,3^FS ^FX headings ^CF0,25 ^FO100,110 ^FB250,2, 5 ^FDORDER NUMBER^FS ^FO100,190 ^FB250,2, 5 ^FDNAME PET^FS ^FO100,270 ^FB250,2, 5 ^FDADDRESS^FS ^FO100,420 ^FB250,2, 5 ^FDCONTENTS MENU^FS ^CFN,20 ^FO350,115 ^FB300,2, 5 ^FDORDER_NUMBER^FS ^FO350,195 ^FB300,2, 5 ^FDPET_NAME^FS ^FO100,320 ^FB450,4, 5, J ^FDADDRESS_LINE^FS ^CF0,20 ^FO100,470 ^FB450,12, 5 ^FDMENU_NAME^FS ^FO100,495 ^FB450,12, 5 ^FDRECIPE_NAME^FS ^CFN,20 ^FO100,520 ^FB450,12, 5 ^FDRECIPE_DESCRIPTION^FS ^XZ";

//            $zpl = "^XA ^CI28 ^FX label 2 80mmx100mm ^CF0,25 ^FO70,70 ^FB250,2, 5 ^FDORDER NUMBER^FS ^FO70,120 ^FB250,2, 5 ^FDNAME PET^FS ^FO70,170 ^FB250,2, 5 ^FDADDRESS^FS ^FO70,300 ^FB250,2, 5 ^FDCONTENTS MENU^FS ^FO70,630 ^FB250,2, 5 ^FDDELIVERED BY^FS ^CFN,20 ^FO350,73 ^FB300,1, 5 ^FD{{ORDER_NUMBER}}^FS ^FO350,122 ^FB300,1, 5 ^FD{{PET_NAME}}^FS ^FO70,210 ^FB450,3, 1, J ^FD{{ADDRESS_LINE}}^FS ^CF0,20 ^FO70,345 ^FB500,1, 5 ^FD{{MENU_NAME}}^FS ^FO70,375 ^FB500,1, 5 ^FD{{RECIPE_NAME}}^FS ^FO70,580 ^FB90,1, 5 ^FDTotal kcal:^FS ^FO390,580 ^FB70,1, 5 ^FDWeight:^FS ^CFN,20 ^FO160,580 ^FB200,1, 5 ^FD{{TOTAL_KCAL}}^FS ^FO460,580 ^FB120,1, 5 ^FD{{WEIGHT}}^FS ^FO70,400 ^FB500,8, 1, J ^FD{{RECIPE_DESCRIPTION}}^FS ^FO70,670 ^FB500,3, 1, J ^FD{{DELIVERED_BY}}^FS ^XZ";
            $zpl = "^XA ^CI28 ^CWT,E:ARI000.TTF ^FO15,20^GB610,760,3^FS ^FX label 2 80mmx100mm ^CF0,25 ^FO70,70 ^FB250,2, 5 ^FDORDER NUMBER^FS ^FO70,120 ^FB250,2, 5 ^FDNAME PET^FS ^FO70,170 ^FB250,2, 5 ^FDADDRESS^FS ^FO70,300 ^FB250,2, 5 ^FDCONTENTS MENU^FS ^FO70,630 ^FB250,2, 5 ^FDDELIVERED BY^FS^FO70, 735^FDDELIVERY DATE^FS ^CFT,20 ^FO350,73 ^FB300,1, 5 ^FD{{ORDER_NUMBER}}^FS ^FO350,122 ^FB300,1, 5 ^FD{{PET_NAME}}^FS ^FO70,210 ^FB450,3, 1, J ^FD{{ADDRESS_LINE}}^FS ^CF0,20 ^FO70,345 ^FB500,1, 5 ^FD{{MENU_NAME}}^FS ^FO70,375 ^FB500,1, 5 ^FD{{RECIPE_NAME}}^FS ^FO70,580 ^FB90,1, 5 ^FDTotal kcal:^FS ^FO390,580 ^FB70,1, 5 ^FDWeight:^FS ^CFT,20 ^FO160,580 ^FB200,1, 5 ^FD{{TOTAL_KCAL}}^FS ^FO460,580 ^FB120,1, 5 ^FD{{WEIGHT}}^FS ^CFT,20 ^FO70,400 ^FB500,8, 1, J ^FD{{RECIPE_DESCRIPTION}}^FS ^CFT,20 ^FO50,670 ^FB530,3, 1, J ^FD{{DELIVERED_BY}}^FS ^FO350, 735^FD{{DELIVERY_DATE}}^FS ^XZ";
            $productData = $this->recipeCalc($recipe->recipe_id, $recipe->pet_id);
            $productsString = "";

            foreach ($productData['products'] as $product) {
                $weight = $product['weight'] < 0.01 ? "<0.01" : number_format($product['weight'], 2);
                $kcal = $product['kcalByWeight'] < 0.01 ? "<0.01" : number_format($product['kcalByWeight'], 2);

                $productsString .= ", " . $product['name'] . " (" . $weight . "g, " . $kcal . "kcal)";
            }
            $productsString = substr($productsString, 2);

            $zpl = str_replace([
                '{{ORDER_NUMBER}}',
                '{{PET_NAME}}',
                '{{ADDRESS_LINE}}',
                '{{MENU_NAME}}',
                '{{RECIPE_NAME}}',
                '{{RECIPE_DESCRIPTION}}',
                '{{TOTAL_KCAL}}',
                '{{WEIGHT}}',
                '{{DELIVERED_BY}}',
                '{{DELIVERY_DATE}}'
            ],
                [
                    $recipe->order_id,
                    $recipe->pet->name,
                    $recipe->order->user_address,
                    'MENU №' . $recipe->order_id . '-' . $recipe->id,
                    $recipe->recipe_name,
                    trim($productsString),
                    number_format($productData['kcal'], 2),
                    number_format($productData['weight'], 2) > 0.01 ? number_format($productData['weight'], 2) : "<0.01" . " g",
                    trim(getMenusDate()->format('Y-m-d'))
                ], $zpl);

            $jobOrderNames .= $recipe->order_id . '-' . $recipe->id . " ";
            $zplList[] = $zpl;
        }

        $jobName = Carbon::now()->format('Ymd_His') . '-' . substr($jobOrderNames, 0, -1) . '-kitchen-labels.zpl';
        $printSender = new PrintJobSender();
        $printStatus = $printSender->addPrintJob($zplList, $jobName);

        return response()->json([
            'success' => $printStatus
        ]);
    }
}
