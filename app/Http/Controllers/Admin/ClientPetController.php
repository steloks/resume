<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Breed;
use App\Models\FavouriteRecipe;
use App\Models\Pet;
use App\Models\Recipe;
use App\Models\User;
use App\Models\UserPetHistory;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class ClientPetController extends Controller
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

    public function index()
    {
        $breeds = Breed::query()->select(['id', 'name'])->get();

        return view('admin.client_pets.index')->with(['breeds' => $breeds]);
    }

    public function clientPetEditView($id)
    {
        $pet = Pet::withTrashed()->firstWhere('id', $id);
        $petHistories = UserPetHistory::query()->where('user_pet_id', $pet->id)->orderBy('id', 'ASC')->get();
        $petHistoriesWeightLvl = UserPetHistory::query()
            ->where('user_pet_id', $pet->id)
            ->get()
            ->where('key', 'weight_lvl')
            ->pluck('value')
            ->toArray();

        $parsedDates = $this->repo->getParsedDates($petHistories->where('key', 'weight')->pluck('created_at'));

        return view('admin.client_pets.edit')->with([
            'pet' => $pet,
            'petHistories' => $petHistories,
            'parsedDates' => $parsedDates,
            'petHistoriesWeightLvl' => parseWeightLvl($pet, $petHistoriesWeightLvl),
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function gridDataClientPets(Request $request): \Illuminate\Http\JsonResponse
    {
        $iTotalRecords = Pet::withTrashed()->get()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));
        $breedId = (int)$request->get('breed_id');
        $status = $request->get('status') != null ? (int)$request->get('status') : null;

        $dataFilterEloquent = Pet::withTrashed()->newQuery([
            'user_pets.id',
            'user_pets.name',
            'user_pets.age',
            'user_pets.gender',
            'user_pets.deleted_at',
            'user_pets.breed_id',
            'user_pets.user_id',
        ])->with([
            'owner' => function ($q) {
                $q->withTrashed();
            },
            'breed',
        ]);

        if (!empty($breedId)) {
            $dataFilterEloquent->whereHas('breed', function ($q) use ($breedId) {
                $q->where('id', $breedId);
            });
        }

        if ($status === 0) {
            $dataFilterEloquent->whereNull('deleted_at');
        }
        if ($status === 1) {
            $dataFilterEloquent->whereNotNull('deleted_at');
        }

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->where('user_pets.name', 'LIKE', '%' . $searchValue . '%')
                    ->orWhereHas('owner', function ($o) use ($searchValue) {
                        $o->where('name', 'LIKE', '%' . $searchValue . '%');
                    });
            });
        }

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
                case 1:
                    $dataFilterEloquent->orderBy('user_pets.name', $orderDirection);
                    break;
                case 2:
                    $dataFilterEloquent->whereHas('breed')->orderBy('name', $orderDirection);
                    break;
                case 3:
                    $dataFilterEloquent->orderBy('user_pets.age', $orderDirection);
                    break;
                case 4:
                    $dataFilterEloquent->orderBy('user_pets.gender', $orderDirection);
                    break;
                case 5:
                    $dataFilterEloquent->whereHas('owner')->orderBy('name', $orderDirection);
                    break;
                case 6:
                    $dataFilterEloquent->orderBy('user_pets.deleted_at', $orderDirection);
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

            $status = '<span class="' . (empty($row->deleted_at) ? 'bg-rgba-success' : 'bg-rgba-danger') . '">' .
                (!empty($row->deleted_at) ? 'Inactive' : 'Active') . '</span>';

            $records["data"][] = [
                $row->id,
                parseEditRoute('clients-pets', $row->id, $row->name),
                $row->breed->name,
                dateToYearsAndMonths($row->date_of_birth),
                $row->gender,
                parseEditRoute('clients', $row->owner->id, $row->owner->name . ' ' . $row->owner->last_name),
                $status,
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);

    }

    public function favouriteMenus()
    {
        $clientsFromFavRecipes = FavouriteRecipe::with(['client' => function ($q) {
            $q->withTrashed();
        }])->pluck('user_id')->toArray();
        $petsFromFavRecipes = FavouriteRecipe::with(['pet' => function ($q) {
            $q->withTrashed();
        }])->pluck('pet_id')->toArray();
        $menusFromFavRecipes = FavouriteRecipe::with(['recipe' => function ($q) {
            $q->withTrashed();
        }])->pluck('recipe_id')->toArray();
        $clients = User::withTrashed()->select(['id', 'name'])->whereIn('id', $clientsFromFavRecipes)->get();
        $pets = Pet::withTrashed()->select(['id', 'name'])->whereIn('id', $petsFromFavRecipes)->get();
        $menus = Recipe::query()->select(['id', 'name'])->whereIn('id', $menusFromFavRecipes)->get();

        return view('admin.favourite_menus.index')->with(['clients' => $clients, 'pets' => $pets, 'menus' => $menus]);
    }

    public function gridDataFavouriteMenus(Request $request): \Illuminate\Http\JsonResponse
    {
        $iTotalRecords = FavouriteRecipe::all()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));
        $menuId = $request->get('menu_id');
        $clientId = $request->get('client_id');
        $petId = $request->get('pet_id');

        $dataFilterEloquent = FavouriteRecipe::query([
            '*',
        ])->with([
            'recipe',
            'pet',
            'client' => function ($q) {
                $q->withTrashed();
            },
            'recipe.products',
        ]);

        if (!empty($menuId)) {
            $dataFilterEloquent->whereHas('recipe', function ($q) use ($menuId) {
                $q->where('id', $menuId);
            });
        }

        if (!empty($clientId)) {
            $dataFilterEloquent->whereHas('client', function ($q) use ($clientId) {
                $q->where('id', $clientId);
            });
        }

        if (!empty($petId)) {
            $dataFilterEloquent->whereHas('pet', function ($q) use ($petId) {
                $q->where('id', $petId);
            });
        }


        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->where('id', 'LIKE', '%' . $searchValue . '%');
            });
        }

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
                case 1:
                    $dataFilterEloquent->orderBy('created_at', $orderDirection);
                    break;
                case 2:
                    $dataFilterEloquent->join('recipes', 'favourite_recipe.recipe_id', '=', 'recipes.id')->orderBy('name', $orderDirection);
                    break;
                case 3:
                    $dataFilterEloquent->join('recipes', 'favourite_recipe.recipe_id', '=', 'recipes.id')->orderBy('recipes.name', $orderDirection);
                    break;
                case 4:
                    $dataFilterEloquent->join('users', 'favourite_recipe.user_id', '=', 'users.id')->orderBy('name', $orderDirection);
                    break;
                case 5:
                    $dataFilterEloquent->join('user_pets', 'favourite_recipe.pet_id', '=', 'user_pets.id')->orderBy('name', $orderDirection);
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
            $records["data"][] = [
                $row->id,
                parseDate($row->created_at),
                $row->recipe->name,
                $row->recipe->products->implode('name', ', '),
                parseEditRoute('clients', $row->client->id, $row->client->name . $row->client->last_name),
                parseEditRoute('clients-pets', $row->pet->id, $row->pet->name),
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);
    }
}
