<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\OrderAdminMail;
use App\Mail\OrderCancelledAdminMail;
use App\Mail\OrderClientMail;
use App\Models\DogActivityPercentage;
use App\Models\FavouriteRecipe;
use App\Models\FoodPrepare;
use App\Models\Order;
use App\Models\OrderRecipe;
use App\Models\OrderRecipeHistory;
use App\Models\Pet;
use App\Models\Recipe;
use App\Models\RecipeType;
use App\Models\ShoppingList;
use App\Models\Status;
use App\Models\TimeSlot;
use App\Models\User;
use App\Models\UserAddress;
use App\Traits\RecipeCalculator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Srmklive\PayPal\Facades\PayPal;


class OrderController extends Controller
{
    use RecipeCalculator;

    private $provider;

    public function __construct()
    {
        $this->provider = PayPal::setProvider();

    }

    public function index()
    {
        $pets = Pet::with('breed')->where('user_id', Auth::id())->get();
        //TODO If the address is not active it should not show up;
        $addresses = UserAddress::query()
            ->where('user_id', Auth::id())
            ->has('postcodeRelation')
            ->with(['postcodeRelation'])
            ->get()
            ->sortByDesc('id')
            ->whereNotNull('postcodeRelation');

        $petSelectedFromTabs = $pets->where('id', \request()->get('petId') ?? session('orderStepDogId'))->first();
        $selectedAddressId = session('orderStepAddressId');

        return view('front.user-order.steps', compact('pets', 'addresses', 'petSelectedFromTabs', 'selectedAddressId'));
    }

    public function orderRecipes($id, Request $request)
    {
        $pet = Pet::query()->with(['product_allergens', 'product_allergens.product'])->firstWhere('id', $id);

        $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Carbon::now());
        $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', Carbon::createFromDate($pet->date_of_birth));

        $monthDiff = $to->diffInMonths($from) != 0 ? $to->diffInMonths($from) : 1;

        $recipeType = RecipeType::where('min_age', '<=', $monthDiff)
            ->where('max_age', '>', $monthDiff)
            ->with(['recipes', 'recipes.products'])
            ->first();

        if (!isset($recipeType)) {
            $recipeType = RecipeType::whereNull('max_age')->first();
            if ($monthDiff < $recipeType->min_age) {
                $recipeType = RecipeType::orderBy('min_age')->first();
            }
        }

        $petAllergens = $pet->product_allergens->pluck('product_id')->toArray();

        $recipes = $recipeType->recipes->map(function ($r) use ($pet, $petAllergens) {
            if (!in_array($r->products->pluck('id')->toArray(), $petAllergens)) {
                $calc = $this->recipeCalc($r->id, $pet->id);
                $r->price = $calc['price'];
                $r->weight = $calc['weight'];
                $r->kcal = $calc['kcal'];
                $r->products = $r->products->pluck('name')->implode(', ');

                return $r;
            }
        });

        $favouriteRecipes = FavouriteRecipe::query()->where('pet_id', $id)->get();

        session()->put('orderStepDogId', $id);

        return response()->json([
            'success' => true,
            'view' => view('front.user-order.order-step-2-menu')->with([
                'recipes' => $recipes,
                'pet' => $pet,
                'favouriteRecipes' => $favouriteRecipes,
            ])->render(),
        ]);
    }

    public function timeslotsByArea($id)
    {
        $timeslots = TimeSlot::where('area_id', $id)->get();

        session()->put('orderStep', 2);
        session()->put('orderStepAddressId', \request()->get('address_id'));
        session()->save();
//        dd($id, session()->all());
        return response()->json([
            'success' => true,
            'view' => view('front.user-order.modal-timeslots')->with(['timeslots' => $timeslots])->render(),
        ]);
    }

    public function addToCart(Request $request)
    {
        $cart = $request->session()->get('orders');
        $cart[] = $request->all();
        if ($recipeId = $request->get('recipe_id')) {
            $recipeName = optional(Recipe::query()->find($recipeId))->name;
        }
        $request->session()->put('orders', $cart);
        $request->session()->save();

        return response()->json([
            'success' => true,
            'message' => !empty($recipeName) ?
                ucfirst($recipeName) . ' ' . __('was successfully added to your cart!') :
                __('Successfully added item to cart!'),
            'itemsInCart' => count(session('orders')),
        ]);
    }

    public function cart(Request $request)
    {
        $orders = $request->session()->get('orders');

        if (!isset($orders)) {
            return response()->json(['success' => false]);
        }

        $ordersArray = [];
        $datesArray = [];
        $cost = 0;
        $deliveryPrice = null;

        foreach ($orders as $order) {
            if (!isset($deliveryPrice)) {
                $userAddress = UserAddress::with(['postcodeRelation', 'postcodeRelation.area'])
                    ->where('id', $order['address_id'])
                    ->first();
                $deliveryPrice = $userAddress->postcodeRelation->area->delivery_price;
            }

            $timeSlot = TimeSlot::firstWhere('id', $order['timeslot_id']);
            $calc = $this->recipeCalc($order['recipe_id'], $order['pet_id']);
            $cost += $calc['price'];
            $datesArray[] = $order['date'];

            $ordersArray[] = [
                'recipeName' => Recipe::firstWhere('id', $order['recipe_id'])->name,
                'timeSlot' => Carbon::createFromTimeString($timeSlot->start_at)->format('H:i') . ' - ' .
                    Carbon::createFromTimeString($timeSlot->end_at)->format('H:i'),
                'petName' => Pet::firstWhere('id', $order['pet_id'])->name,
                'date' => $order['date'],
                'price' => number_format($calc['price'], 2, '.', ' '),
                'recipeId' => $order['recipe_id'],
                'grams' => $this->recipeCalc($order['recipe_id'], $order['pet_id'])['weight'] ?? '',
            ];
        }

        $deliveryPrice = $deliveryPrice * count(array_unique($datesArray));

        $vat = ($cost + $deliveryPrice) * 20 / 100;

        $totalCost = $cost + $deliveryPrice + $vat;

        if (!empty($orders)) {
            session()->put('orderStep', 3);
        }

        if (!$request->ajax()) {
            return \view('front.user-order.order-step-2-cart')->with([
                'orders' => $ordersArray,
                'cost' => number_format($cost, 2, '.', ' '),
                'deliveryPrice' => number_format($deliveryPrice, 2, '.', ' '),
                'vat' => number_format($vat, 2, '.', ' '),
                'totalCost' => number_format($totalCost, 2, '.', ' '),
            ]);
        }

        return response()->json([
            'success' => true,
            'view' => view('front.user-order.order-step-2-cart')->with([
                'orders' => $ordersArray,
                'cost' => number_format($cost, 2, '.', ' '),
                'deliveryPrice' => number_format($deliveryPrice, 2, '.', ' '),
                'vat' => number_format($vat, 2, '.', ' '),
                'totalCost' => number_format($totalCost, 2, '.', ' '),
            ])->render(),
        ]);
    }

    public function orderDogs($id)
    {
        $pets = Pet::with('breed')->where('id', '!=', $id)->where('user_id', Auth::user()->id)->get();

        return response()->json([
            'success' => true,
            'view' => view('front.user-order.modal-dogs')->with(['pets' => $pets])->render(),
        ]);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCartItem($id): JsonResponse
    {
        $cart = collect(session('orders'));
        $recipeToRemove = $cart->firstWhere('recipe_id', $id)['recipe_id'];
        $cart->filter(function ($order, $key) use ($recipeToRemove) {
            if ($order['recipe_id'] == $recipeToRemove) {
                session()->remove('orders.' . $key);
            }
        });

        return response()->json([
            'success' => true,
            'message' => __('Successfully removed item from cart'),
            'itemsInCart' => count(session('orders')),
        ]);
    }

    public function store(Request $request)
    {
        $orderProducts = session('orders') ?? [];
        $user = \auth()->user();

        $jSessionToken = Http::asForm()->post('https://test.ipg-online.com/connect/gateway/processing', $this->setBankData($request->get('total_amount')))->body();
        if (count($orderProducts) > 0) {
            $addressId = $request->get('address') ?? session('orderStepAddressId');

            $order = Order::create([
                'user_id' => $user->id,
                'status_id' => Order::getDefaultStatus(),
                'payment_status_id' => Order::getDefaultPaymentStatus(),
                'name' => $user->name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'phone' => $user->phone,
                'user_postcode' => $user->addresses->firstWhere('id', $addressId)->postcode,
                'user_address' => $user->addresses->firstWhere('id', $addressId)->address,
                'delivery_price' => $request->get('delivery_price'),
                'vat' => $request->get('vat'),
                'total_amount' => $request->get('total_amount'),
                'comment' => $request->get('comment'),
                'agreed_terms' => !empty($request->get('agreed_terms')) ? 1 : 0,
                'agreed_privacy' => !empty($request->get('agreed_privacy')) ? 1 : 0,
                'payment_type' => 'card',
            ]);

            foreach ($orderProducts as $orderProduct) {
                $shopList = ShoppingList::where('date', Carbon::create($orderProduct['date']));
                if ($shopList->get()) {
                    $shopList->delete();
                }
                $foodPrepare = FoodPrepare::where('date', Carbon::create($orderProduct['date']));
                if ($foodPrepare->get()) {
                    $foodPrepare->delete();
                }
                $recipeDetails = $this->recipeCalc($orderProduct['recipe_id'], $orderProduct['pet_id']);
                $order->recipes()->create([
                    'order_id' => $order->id,
                    'recipe_id' => $orderProduct['recipe_id'],
                    'pet_id' => $orderProduct['pet_id'],
                    'status_id' => OrderRecipe::getDefaultStatus(),
                    'payment_status_id' => OrderRecipe::getDefaultPaymentStatus(),
                    'address_id' => $orderProduct['address_id'],
                    'timeslot_id' => $orderProduct['timeslot_id'],
                    'date' => Carbon::parse($orderProduct['date'])->format('Y-m-d H:i:s'),
                    'recipe_name' => Recipe::firstWhere('id', $orderProduct['recipe_id'])->name,
                    'grams' => $recipeDetails['weight'],
                    'kcal' => $recipeDetails['kcal'],
                    'price' => $this->recipeCalc($orderProduct['recipe_id'],
                        $orderProduct['pet_id'])['price'],
                ]);
            }
        }

        return \view('front.user-order.authenticate_bank')->with(
            [
                'requestData' => $request,
                'jsession' => Str::of($jSessionToken)->after('/connect/gateway/processing')->before('"><span')
            ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function favouriteRecipe(Request $request): JsonResponse
    {
        $data = $request->except(['_token']);

        if ($favouriteRecipe = FavouriteRecipe::query()
            ->where('pet_id', $data['pet_id'])
            ->where('user_id', $data['user_id'])
            ->where('recipe_id', $data['recipe_id'])
            ->first()) {
            $favouriteRecipe->delete();

            return response()->json(['success' => true, 'removeRecipe' => true]);
        }

        FavouriteRecipe::query()->updateOrCreate($data);

        return response()->json(['success' => true]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function confirmCancelMenu(Request $request): JsonResponse
    {
        $data = $request->except(['_token']);
        $statusOrderedId = Status::query()
            ->where('type', 'order_recipe')
            ->where('name', "Ordered")
            ->first()->id;
        $statusCanceledId = Status::query()
            ->where('type', 'order_recipe')
            ->where('name', "Cancelled")
            ->first()->id;
        $statusPaymentToReturnId = Status::query()
            ->where('type', 'order_payment')
            ->where('name', "Amount to return")
            ->first()->id;
        $statusOrderPartiallyCancelled = Status::query()
            ->where('type', 'order')
            ->where('name', "Partially cancelled")
            ->first()->id;
        $statusOrderCancelledId = Status::query()
            ->where('type', 'order')
            ->where('name', "Cancelled")
            ->first()->id;

        if (!empty($data['canceled_menus'])) {
            foreach ($data['canceled_menus'] as $orderId => $recipesToCancel) {
                $order = Order::query()->with(['recipes', 'postcodeRelation.area'])->firstWhere('id', $orderId);
                foreach ($recipesToCancel as $recipeId => $recipeCancel) {
                    array_map(function ($m) use (
                        $recipeId,
                        $statusCanceledId,
                        $statusOrderedId,
                        $statusPaymentToReturnId,
                        $orderId,
                        $statusOrderPartiallyCancelled,
                        $recipesToCancel,
                        $statusOrderCancelledId,
                        $order
                    ) {
                        if (!empty($m)) {
                            $order->update([
                                'payment_status_id' => $statusPaymentToReturnId,
                                'status_id' => (count($recipesToCancel) > 1) ? $statusOrderPartiallyCancelled : $statusOrderCancelledId,
                            ]);

                            $orderRecipe = OrderRecipe::query()->where('order_id', $orderId)->where('id', $recipeId)->first();
                            $orderRecipe->update([
                                'status_id' => $statusCanceledId,
                                'payment_status_id' => $statusPaymentToReturnId,
                                'canceled_menu' => Carbon::now()->format('Y-m-d H:i:s'),
                            ]);

                            if ($order->recipes->where('status_id', '<>', 10)->count() == 1) {
                                $order->update([
                                    'status_id' => $statusOrderCancelledId
                                ]);

                                $admins = User::query()->whereHas('roles', function ($q) {
                                    $q->where('name', 'Admin');
                                })->get();

                                foreach ($admins as $admin) {
                                    Mail::to($admin->email)->send(new OrderCancelledAdminMail($order));
                                }
                            }

                            if (OrderRecipe::query()->where('order_id', $orderId)->whereDate('date', $orderRecipe->date)->where('status_id', '<>', 10)->count() == 0) {
                                $order->update([
                                    'vat' => ($order->vat - (($order->postcodeRelation->area->delivery_price) * 20 / 100)),
                                    'delivery_price' => $order->delivery_price - $order->postcodeRelation->area->delivery_price,
                                    'total_amount' => $order->total_amount - ($order->postcodeRelation->area->delivery_price + (($order->postcodeRelation->area->delivery_price) * 20 / 100))
                                ]);
                            }

                            $order->update([
                                'vat' => ($order->vat - (($orderRecipe->price) * 20 / 100)),
                                'total_amount' => ($order->total_amount - ($orderRecipe->price + (($orderRecipe->price) * 20 / 100))),
                            ]);

                            OrderRecipeHistory::create([
                                'order_recipe_id' => $recipeId,
                                'status_id' => $statusPaymentToReturnId,
                            ]);

                            OrderRecipeHistory::create([
                                'order_recipe_id' => $recipeId,
                                'type' => 'payment',
                                'status_id' => $statusPaymentToReturnId,
                            ]);

                            notifications('order_menu', $recipeId);

                        }
                    }, $recipeCancel);
                }
            }
        }

        return response()->json(['success' => true]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkoutOrderStep(Request $request): JsonResponse
    {
        session()->put('orderStep', 4);

        return response()->json(['success' => true]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function confirmCancelOrder(Request $request): JsonResponse
    {
        $statusOrderCancelledId = Status::query()
            ->where('type', 'order')
            ->where('name', "Cancelled")
            ->first()->id;

        $statusMenuCanceledId = Status::query()
            ->where('type', 'order_recipe')
            ->where('name', "Cancelled")
            ->first()->id;
        $order = Order::query()->with(['status'])->firstWhere('id', $request->get('order_id'));

        $order->update(['status_id' => $statusOrderCancelledId]);

        $menuIsLess = [];
        foreach ($order->recipes as $orderRecipe) {
            if (getMenusDate() < $orderRecipe->date) {
                $menuIsLess[] = $orderRecipe->id;
            }
        }

        if (count($menuIsLess) == 0) {
            return response()->json([
                'success' => false,
                'message' => __('Cannot cancel order.'),
            ]);
        }

        foreach ($order->recipes as $orderRecipe) {
            $orderRecipe->update(['status_id' => $statusMenuCanceledId]);
        }

        notifications('order', $order->id);

        $admins = User::query()->whereHas('roles', function ($q) {
            $q->where('name', 'Admin');
        })->get();

        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new OrderCancelledAdminMail($order));
        }

        return response()->json(['success' => true]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function paypalCreate(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $totalAmount = collect($data['data'])->firstWhere('name', 'total_amount')['value'];
        $this->provider->setApiCredentials(config('paypal'));
        $token = $this->provider->getAccessToken();
        $this->provider->setAccessToken($token);
        $order = $this->provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => $data['currency_code'],
                        "value" => $totalAmount,
                    ],
                    'description' => 'order',
                ],
            ],
        ]);

        return response()->json($order);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function paypalCapture(Request $request)
    {

        $data = json_decode($request->getContent(), true);
        $orderId = $data['orderId'];
        $this->provider->setApiCredentials(config('paypal'));
        $token = $this->provider->getAccessToken();
        $this->provider->setAccessToken($token);
        $result = $this->provider->capturePaymentOrder($orderId);
        $inputData = collect($data['inputs']);

        if ($result['status'] === "COMPLETED") {
            $orderProducts = session('orders') ?? [];
            $user = \auth()->user();

            if (count($orderProducts) > 0) {
                $addressId = $request->get('address') ?? session('orderStepAddressId');
                $order = Order::create([
                    'user_id' => $user->id,
                    'status_id' => Order::getDefaultStatus(),
                    'payment_status_id' => Order::getDefaultPaymentStatus(),
                    'name' => $user->name,
                    'last_name' => $user->last_name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'user_postcode' => $user->addresses->firstWhere('id', $addressId)->postcode,
                    'user_address' => $user->addresses->firstWhere('id', $addressId)->address,
                    'delivery_price' => $inputData->firstWhere('name', 'delivery_price')['value'],
                    'vat' => $inputData->firstWhere('name', 'vat')['value'],
                    'total_amount' => $inputData->firstWhere('name', 'total_amount')['value'],
                    'comment' => $inputData->firstWhere('name', 'comment')['value'],
                    'agreed_terms' => !empty($request->get('agreed_terms')) ? 1 : 0,
                    'agreed_privacy' => !empty($request->get('agreed_privacy')) ? 1 : 0,
                    'paypal_order_id' => $data['orderId'],
                    'paypal_payer_id' => $data['payerId'],
                    'payment_type' => 'paypal',
                ]);

                foreach ($orderProducts as $orderProduct) {
                    $shopList = ShoppingList::where('date', Carbon::create($orderProduct['date']));
                    if ($shopList->get()) {
                        $shopList->delete();
                    }
                    $foodPrepare = FoodPrepare::where('date', Carbon::create($orderProduct['date']));
                    if ($foodPrepare->get()) {
                        $foodPrepare->delete();
                    }
                    $recipeDetails = $this->recipeCalc($orderProduct['recipe_id'], $orderProduct['pet_id']);
                    $orderRecipe = $order->recipes()->create([
                        'order_id' => $order->id,
                        'recipe_id' => $orderProduct['recipe_id'],
                        'pet_id' => $orderProduct['pet_id'],
                        'status_id' => OrderRecipe::getDefaultStatus(),
                        'payment_status_id' => OrderRecipe::getDefaultPaymentStatus(),
                        'address_id' => $orderProduct['address_id'],
                        'timeslot_id' => $orderProduct['timeslot_id'],
                        'date' => Carbon::parse($orderProduct['date'])->format('Y-m-d H:i:s'),
                        'recipe_name' => Recipe::firstWhere('id', $orderProduct['recipe_id'])->name,
                        'grams' => $recipeDetails['weight'],
                        'kcal' => $recipeDetails['kcal'],
                        'price' => $this->recipeCalc($orderProduct['recipe_id'],
                            $orderProduct['pet_id'])['price'],
                    ]);

                    OrderRecipeHistory::create([
                        'order_recipe_id' => $orderRecipe->id,
                        'status_id' => OrderRecipe::getDefaultStatus(),
                    ]);

                    OrderRecipeHistory::create([
                        'order_recipe_id' => $orderRecipe->id,
                        'type' => 'payment',
                        'status_id' => OrderRecipe::getDefaultPaymentStatus(),
                    ]);
                }

                notifications('order', $order->id);
            }

            Mail::to($order->email)->send(new OrderClientMail($order));
            $admins = User::query()->whereHas('roles', function ($q) {
                $q->where('name', 'Admin');
            })->get();
            foreach ($admins as $admin) {
                Mail::to($admin->email)->send(new OrderAdminMail($order));
            }

            session()->forget(['orders', 'orderStep', 'orderStepDogId', 'orderStepAddressId']);
        }

        return response()->json(['success' => true, 'redirectUrl' => route('order.successPage', ['id' => $order->id])]);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function successPage($id): View
    {
        $order = Order::query()->firstWhere('id', $id);

        return view('front.user-order.user-order-success')->with(['order' => $order]);
    }

    /**
     * @param $total
     *
     * @return array
     */
    public function setBankData($total): array
    {
        return [
            //confidetional data
        ];
    }

    /**
     * @param $chargetotal
     * @param $currency
     *
     * @return string
     */
    private function createHash($chargetotal, $currency): string
    {
        $storeId = "2220540850";
        $sharedSecret = "e6%*RH2gzi";
        $stringToHash = $storeId . date("Y:m:d-H:i:s") . $chargetotal . $currency . $sharedSecret;
        $ascii = bin2hex($stringToHash);
        return hash("sha256", $ascii);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function bankSuccess(Request $request): View
    {
        $order = Order::query()->with(['recipes'])->where('total_amount', $request->get('chargetotal'))->latest()->first();
        if (!$request->get('status') == 'APPROVED') {
            $order->delete();
            $order->recipes->delete();
        }

        foreach ($order->recipes as $orderRecipe) {
            OrderRecipeHistory::create([
                'order_recipe_id' => $orderRecipe->id,
                'status_id' => OrderRecipe::getDefaultStatus(),
            ]);

            OrderRecipeHistory::create([
                'order_recipe_id' => $orderRecipe->id,
                'type' => 'payment',
                'status_id' => OrderRecipe::getDefaultPaymentStatus(),
            ]);
        }
        notifications('order', $order->id);

        Mail::to($order->email)->send(new OrderClientMail($order));
        $admins = User::query()->whereHas('roles', function ($q) {
            $q->where('name', 'Admin');
        })->get();
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new OrderAdminMail($order));
        }

        session()->forget(['orders', 'orderStep', 'orderStepDogId', 'orderStepAddressId']);

        Auth::loginUsingId($order->user_id);
        return view('front.user-order.user-order-success')->with(['order' => $order]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function bankUnSuccessful(Request $request): View
    {
        $order = Order::query()->where('total_amount', $request->get('chargetotal'))->with(['recipes'])->latest()->first();
        if (!empty($order)) {
            $order->recipes->delete();
            $order->delete();
        } else {
            $order = Order::query()->orderBy('id', 'DESC')->with(['recipes'])->first();
            $order->recipes->delete();
            $order->delete();
        }

        Auth::loginUsingId($order->user_id);
        return view('front.user-order.user-order-fail');
    }
}
