<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderRecipe;
use App\Models\OrderRecipeHistory;
use App\Models\Status;
use App\Models\UserAddress;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class OrderMenuController extends Controller
{
    public function index(): View
    {
        return view('admin.order_menus.index');
    }

    public function gridDataAdminOrderMenus(Request $request): JsonResponse
    {
        $iTotalRecords = Order::all()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));

        $dataFilterEloquent = Order::query([
            'orders.*',
        ])->with([
            'recipes',
            'status',
            'client' => function ($q) {
                $q->withTrashed();
            },
        ]);

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->where('orders.client.name', 'LIKE', '%' . $searchValue . '%');
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
                renderRecipes('admin.order-menus.renderRecipes', $row->id),
                parseEditRoute('orders', $row->id, $row->id),
                $row->client->name . ' ' . $row->client->last_name,
                !empty($row->postcodeRelation) ? optional($row->postcodeRelation->area)->name : '',
                !empty($row->postcodeRelation) ? optional($row->postcodeRelation->subArea)->name : '',
                !empty($row->postcodeRelation) ? optional($row->postcodeRelation->area->objects->first())->name : '',
                '<span class="' . badgeColor($row->status->name) . '">' . $row->status->name . '</span>',
                $row->paymentStatus->name ?? '',
                parseDate($row->created_at),
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
    public function renderRecipes(Request $request, $id): JsonResponse
    {
        $dataFilterEloquent = OrderRecipe::query([
            '*',
        ])->with(['pet', 'recipe', 'status', 'timeslot'])->where('order_id', $id);

        $order = Order::query()->with(['postcodeRelation', 'postcodeRelation.area', 'recipes'])->firstWhere('id', $id);
        $recipes = $dataFilterEloquent->get();
        $statusCanceledId = Status::query()->where('type', 'order_recipe')->where('name', "Cancelled")->first()->id;
        $dates = $dataFilterEloquent->pluck('date')->toArray();
        $deliveryPrice = $order->postcodeRelation->area->delivery_price;
        if (count($recipes->where('status_id', 10)) > 1) {
            $deliveryPrice = $order->postcodeRelation->area->delivery_price * count(array_unique($dates));
        }

        if (!empty($dates[0]) && !empty($dates[1])) {
            if ($dates[0] == $dates[1]) {
                $deliveryPrice = round($order->delivery_price - $order->postcodeRelation->area->delivery_price, 2);

            }
        }

        return response()->json([
            'success' => true,
            'view' => view('admin.order_menus.render_recipes')->with(['recipes' => $recipes,
                'order' => $order,
                'statusCanceledId' => $statusCanceledId,
                'deliveryPrice' => $deliveryPrice,
            ])->render(),
        ]);
    }

    public function markRecipeAsReturned(Request $request, $orderId)
    {
        $statusPaymentReturnedId = Status::query()
            ->where('type', 'order_payment')
            ->where('name', "Amount returned")
            ->first()->id;
        $statusCompletedId = Status::query()
            ->where('type', 'order')
            ->where('name', "Delivered")
            ->first()->id;
        $order = Order::query()->firstWhere('id', $orderId);

        if ($order->recipes->whereIn('status_id', [5, 6, 7])->count() > 0) {
            return redirect()->back()->withErrors(__('Cannot complete order while menus are not completed.'));
        }

        $order->update(['status_id' => $statusCompletedId, 'payment_status_id' => $statusPaymentReturnedId]);

        foreach ($order->recipes()->whereIn('id', $request->get('order_recipe_id'))->get() as $recipe) {
            $recipe->update([
                'payment_status_id' => $statusPaymentReturnedId,
                'canceled_menu_returned' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

            OrderRecipeHistory::create([
                'order_recipe_id' => $recipe->id,
                'type' => 'payment',
                'status_id' => $statusPaymentReturnedId,
            ]);
        }

        return redirect()->back();
    }
}
