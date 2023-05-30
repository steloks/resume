<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\PetFirstStepRequest;
use App\Http\Requests\PetSecondStepRequest;
use App\Http\Requests\PetThirdStepRequest;
use App\Http\Requests\ProfileDetailsRequest;
use App\Models\Allergen;
use App\Models\Breed;
use App\Models\CompanyInfo;
use App\Models\FavouriteRecipe;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrderRecipeHistory;
use App\Models\Pet;
use App\Models\ProductAllergen;
use App\Models\Recipe;
use App\Models\Status;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserPetHistory;
use App\Repositories\UserRepository;
use App\Traits\RecipeCalculator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade as PDF;

class  UserController extends Controller
{
    /**
     * @var \App\Repositories\UserRepository
     */
    private $repo;

    /**
     * @param \App\Repositories\UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->repo = $userRepository;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('front.user-profile-details');
    }

    /**
     * @param \App\Http\Requests\ProfileDetailsRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(ProfileDetailsRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->repo->updateProfile($request);

        return redirect()->route('profile.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function pets()
    {
        $pets = Pet::where('user_id', auth()->user()->id)->get();
        Session::forget(['createStep', 'updateStep']);
        diaryNotification($pets);

        return view('front.user-pet-profiles-listing')->with(['pets' => $pets]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addresses()
    {
        $user = User::firstWhere('id', auth()->user()->id);
        $addresses = $user->addresses()->get();

        return view('front.user-profile-addresses')->with(['user' => $user, 'addresses' => $addresses]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function orders()
    {
        return view('front.user-profile-my-orders-history');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function createPet()
    {
        $weightLvl = Pet::$weightLvl;
        $activityLvl = Pet::$activityLvl;
        $allergens = ProductAllergen::all();

        if (!empty(Session::get('createStep')[0])) {
            $step = !empty(Session::get('createStep')[0]) ? Session::get('createStep')[0] : 1;
            $data = [
                'weightLvls' => $weightLvl,
                'activityLvls' => $activityLvl,
                'allergens' => $allergens,
            ];

            return $this->loadStep($step, $data, 'create');

        } else {
            return view('front.user-pet-profile-create-1')->with([
                'weightLvls' => $weightLvl,
                'activityLvls' => $activityLvl,
            ]);
        }
    }

    /**
     * @param \App\Http\Requests\PetFirstStepRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function storePetFirstStep(PetFirstStepRequest $request): \Illuminate\Http\JsonResponse
    {
        $weightLvl = Pet::$weightLvl;
        $activityLvl = Pet::$activityLvl;
        $this->repo->storePetFirstStep($request);

        return response()->json([
            'success' => true,
            'view' => view('panels.front-user.pet-profile-create-2')->with([
                'weightLvls' => $weightLvl,
                'activityLvls' => $activityLvl,
            ])->render(),
        ]);
    }

    /**
     * @param \App\Http\Requests\PetSecondStepRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function storePetSecondStep(PetSecondStepRequest $request): \Illuminate\Http\JsonResponse
    {
        $this->repo->storePetSecondStep($request);

        return response()->json([
            'success' => true,
            'view' => view('panels.front-user.pet-profile-create-3')->with([
                'allergens' => ProductAllergen::all(),
            ])->render(),
        ]);
    }

    public function storePetThirdStep(PetThirdStepRequest $request): \Illuminate\Http\JsonResponse
    {
        $this->repo->storePetThirdStep($request);

        return response()->json(['success' => true, 'route' => route('profile.pets')]);
    }

    /**
     * @param \App\Http\Requests\PetFirstStepRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function updatePetFirstStep(PetFirstStepRequest $request): \Illuminate\Http\JsonResponse
    {
        $weightLvl = Pet::$weightLvl;
        $activityLvl = Pet::$activityLvl;
        $pet = Pet::firstWhere('id', $request->get('id'));
        $this->repo->updatePetFirstStep($request);

        return response()->json([
            'success' => true,
            'view' => view('panels.front-user.pet-profile-edit-2')->with([
                'weightLvls' => $weightLvl,
                'activityLvls' => $activityLvl,
                'pet' => $pet,
            ])->render(),
        ]);
    }

    /**
     * @param \App\Http\Requests\PetSecondStepRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePetSecondStep(PetSecondStepRequest $request): \Illuminate\Http\JsonResponse
    {
        $pet = Pet::firstWhere('id', $request->get('id'));
        $this->repo->updatePetSecondStep($request);

        return response()->json([
            'success' => true,
            'view' => view('panels.front-user.pet-profile-edit-3')->with([
                'allergens' => ProductAllergen::all(),
                'pet' => $pet,
            ])->render(),
        ]);
    }

    public function updatePetThirdStep(PetThirdStepRequest $request): \Illuminate\Http\JsonResponse
    {
        $this->repo->updatePetThirdStep($request);

        return response()->json(['success' => true, 'route' => route('profile.pets')]);
    }

    /**
     * @param $step
     * @param $data
     * @param $method
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    private function loadStep($step, $data, $method)
    {
        return view('front.user-pet-profile-' . $method . '-' . $step)->with($data);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editPet($id)
    {
        $pet = Pet::firstWhere('id', $id);
        $weightLvl = Pet::$weightLvl;
        $activityLvl = Pet::$activityLvl;
        $allergens = ProductAllergen::all();
        $breeds = Breed::all();

        if (!empty(Session::get('updateStep')[0])) {
            $step = !empty(Session::get('updateStep')[0]) ? Session::get('updateStep')[0] : 1;
            $data = [
                'weightLvls' => $weightLvl,
                'activityLvls' => $activityLvl,
                'allergens' => $allergens,
                'pet' => $pet,
            ];

            return $this->loadStep($step, $data, 'edit');

        } else {
            return view('front.user-pet-profile-edit-1')->with([
                'weightLvls' => $weightLvl,
                'activityLvls' => $activityLvl,
                'pet' => $pet,
                'breeds' => $breeds
            ]);
        }
    }

    public function gridOrderData(Request $request): \Illuminate\Http\JsonResponse
    {
        $iTotalRecords = Order::where('user_id', auth()->user()->id)->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));


        $dataFilterEloquent = Order::query([
            'orders.id',
            'orders.created_at',
            'orders.total_amount',
            'orders.user_address',
            'orders.status_id',
            'orders.name',
            'orders.last_name',
        ])->where('user_id', auth()->user()->id)->with(['status']);

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->where('orders.total_amount', $searchValue)
                    ->orWhere('orders.user_address', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('orders.id', $searchValue);
            });
        }

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
                case 1:
                    $dataFilterEloquent->orderBy('orders.created_at', $orderDirection);
                    break;
                case 2:
                    $dataFilterEloquent->orderBy('orders.total_amount', $orderDirection);
                    break;
                case 3:
                    $dataFilterEloquent->orderBy('orders.user_address', $orderDirection);
                    break;
                case 4:
                    $dataFilterEloquent->orderBy('orders.status_id', $orderDirection);
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
            $statusName = $row->status->where('id', $row->status_id)->where('type', 'order')->first()->name;

            $records["data"][] = [
                $row->id,
                parseDate($row->created_at),
                parsePrice($row->total_amount),
                $row->user_address,
                '<span class="tbl-order-lbl-' . Str::kebab(lcfirst($statusName)) . '">' . $statusName . '</span>',
                $row->invoice ?
                    '<form method="POST" action="' . route('profile.invoice', ['invoiceId' => $row->invoice->id]) . '">
' . csrf_field() . '
                   <button type="submit" style="border: 0;border-radius: 1rem"><svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21.875 18.8438V15.7188C21.875 15.5115 21.7927 15.3128 21.6462 15.1663C21.4997 15.0198 21.301 14.9375 21.0938 14.9375C20.8865 14.9375 20.6878 15.0198 20.5413 15.1663C20.3948 15.3128 20.3125 15.5115 20.3125 15.7188V18.8438C20.3125 19.051 20.2302 19.2497 20.0837 19.3962C19.9372 19.5427 19.7385 19.625 19.5312 19.625H5.46875C5.26155 19.625 5.06284 19.5427 4.91632 19.3962C4.76981 19.2497 4.6875 19.051 4.6875 18.8438V15.7188C4.6875 15.5115 4.60519 15.3128 4.45868 15.1663C4.31216 15.0198 4.11345 14.9375 3.90625 14.9375C3.69905 14.9375 3.50034 15.0198 3.35382 15.1663C3.20731 15.3128 3.125 15.5115 3.125 15.7188V18.8438C3.125 19.4654 3.37193 20.0615 3.81147 20.501C4.25101 20.9406 4.84715 21.1875 5.46875 21.1875H19.5312C20.1529 21.1875 20.749 20.9406 21.1885 20.501C21.6281 20.0615 21.875 19.4654 21.875 18.8438ZM16.8906 14.7656L12.9844 17.8906C12.8464 17.9996 12.6758 18.0589 12.5 18.0589C12.3242 18.0589 12.1536 17.9996 12.0156 17.8906L8.10938 14.7656C7.96704 14.6313 7.88033 14.4484 7.86638 14.2532C7.85243 14.0579 7.91228 13.8646 8.03406 13.7114C8.15585 13.5582 8.33072 13.4562 8.52406 13.4258C8.71739 13.3953 8.91513 13.4385 9.07812 13.5469L11.7188 15.6562V4.78125C11.7188 4.57405 11.8011 4.37534 11.9476 4.22882C12.0941 4.08231 12.2928 4 12.5 4C12.7072 4 12.9059 4.08231 13.0524 4.22882C13.1989 4.37534 13.2812 4.57405 13.2812 4.78125V15.6562L15.9219 13.5469C16.0005 13.4726 16.0938 13.4155 16.1957 13.3792C16.2976 13.3428 16.4059 13.328 16.5138 13.3357C16.6217 13.3434 16.7268 13.3735 16.8225 13.4239C16.9182 13.4744 17.0024 13.5442 17.0697 13.6289C17.137 13.7136 17.186 13.8113 17.2136 13.9159C17.2412 14.0205 17.2467 14.1297 17.2299 14.2366C17.213 14.3435 17.1742 14.4457 17.1158 14.5367C17.0574 14.6278 16.9807 14.7057 16.8906 14.7656Z" fill="#333333"></path>
                    </svg><span class="va-center text-capitalize">' . '&nbsp;' . __('Invoice') . '</span>
               </button>
                   </form>' : '',
                parseFrontViewRoute('profile.viewOrder', $row->id, 'View More'),
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);
    }

    public function viewOrder($id)
    {
        $order = Order::query()->where('id', $id)->with(['recipes' => function ($query) {
            $query->with(['pet']);
        }])->first();
        $orderRecipeIds = $order->recipes->modelKeys();
        $orderRecipesHistory = OrderRecipeHistory::query()->whereIn('order_recipe_id', $orderRecipeIds)->with(['status'])->get();
        $statuses = Status::query()->where('type', 'order_recipe')->get();
        $orderRecipesStillOn = [];
        foreach ($order->recipes as $recipe) {
            if (getMenusDate() < $recipe->date) {
                $orderRecipesStillOn[] = $recipe->id;
            }
        }

        return view('front.user-profile-my-order-history')
            ->with(['order' => $order, 'orderRecipesHistory' => $orderRecipesHistory, 'statuses' => $statuses, 'orderRecipesStillOn' => $orderRecipesStillOn]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function addNewAddress(Request $request)
    {
        $output = $this->repo->addNewAddress($request);

        if ($request->has('profile-edit')) {
            return redirect()->back();
        }

        return response()->json(['success' => (!Str::contains($request->get('address'), 'Please') == true) ? $output : false, 'redirectUrl' => route('order.index')]);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function diary($id): View
    {
        $pet = Pet::query()->firstWhere('id', $id);
        $petHistories = UserPetHistory::query()->where('user_pet_id', $pet->id)->orderBy('id', 'desc')->get();
        $petHistoriesWeightLvl = UserPetHistory::query()->where('user_pet_id', $pet->id)->get()->where('key', 'weight_lvl')->pluck('value')->toArray();

        $parsedDates = $this->repo->getParsedDates($petHistories->where('key', 'weight')->pluck('created_at'));
        return view('front.user-pet-profile-diary')
            ->with([
                'pet' => $pet,
                'petHistories' => $petHistories,
                'parsedDates' => $parsedDates,
                'petHistoriesWeightLvl' => parseWeightLvl($pet, $petHistoriesWeightLvl)
            ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param                          $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateAddress(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $address = UserAddress::query()->firstWhere('id', $id);

        $address->update([
            'postcode' => $request->get('postcode'),
            'address' => $request->get('address'),
        ]);

        return redirect()->back();
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function deleteAddress($id): \Illuminate\Http\RedirectResponse
    {
        $address = UserAddress::query()->findOrFail($id, 'id');
        $address->deleteOrFail();

        return redirect()->back();
    }

    public function favourites(): View
    {
        $pets = Pet::query()->where('user_id', auth()->id())->with('favourites')->get();

        return view('front.user-favourites')
            ->with([
                'pets' => $pets,
            ]);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function archivePet($id): \Illuminate\Http\RedirectResponse
    {
        Pet::query()->firstWhere('id', $id)->delete();

        return redirect()->back();
    }

    public function contactForm(Request $request)
    {

    }

    /**
     * @param $invoiceId
     *
     * @return \Illuminate\Http\Response
     */
    public function invoiceStore($invoiceId)
    {
        $invoice = Invoice::with(['order' => function ($order) {
            $order->with(['recipes' => function ($recipe) {
                $recipe->whereNull('canceled_menu');
                $recipe->with(['pet', 'recipe']);
            }, 'client', 'status']);

        }])->firstWhere('id', $invoiceId);

        $cInfo = CompanyInfo::first();

        $pdf = PDF::loadHTML(view('admin.invoice.dashboard-invoice-1-html', compact('invoice', 'cInfo'))->render());

        return $pdf->download('invoice-' . now()->format('Y-m-d') . '-' . $invoice->order->id . '.pdf');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param                          $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function diaryCheckNotification(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        Pet::query()->where('weight_notification', '!=', 'checked')->where('id', $id)->first()->update(['weight_notification' => 'checked']);

        return redirect()->back();
    }
}
