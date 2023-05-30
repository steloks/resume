<?php

namespace App\Http\Controllers\Admin;

use App\Models\FavouriteRecipe;
use App\Models\ObjectModel;
use App\Models\Order;
use App\Models\Pet;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $objects = ObjectModel::all();

        return view('admin.clients.index')->with(['objects' => $objects]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function gridDataClients(Request $request): \Illuminate\Http\JsonResponse
    {
        $iTotalRecords = User::withTrashed()->whereHas('roles', function ($q) {
            $q->where('name', 'Client');
        })->get()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));


        $dataFilterEloquent = User::query([
            'users.id',
            'users.name',
            'users.last_name',
            'users.email',
            'users.phone',
        ])->whereHas('roles', function ($q) {
            $q->where('name', 'Client');
        })->with(['addresses'])->withTrashed();

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->where('users.name', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('users.last_name', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('users.email', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('users.phone', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('users.last_name', 'LIKE', '%' . $searchValue . '%');
            });
        }

        $object = ObjectModel::firstWhere('id', $request->objectId);

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
                case 1:
                    $dataFilterEloquent->orderBy('users.name', $orderDirection);
                    break;
                case 2:
                    $dataFilterEloquent->orderBy('users.email', $orderDirection);
                    break;
                case 3:
                    $dataFilterEloquent->orderBy('users.phone', $orderDirection);
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

        $objects = ObjectModel::all();
        foreach ($data as $row) {
            $rowObjectId = !empty($row->addresses->first()->postcodeRelation) ?
                $row->addresses->first()->postcodeRelation->area->first()->objects->first()->pivot->object_id : '';
            $requestObjectId = $request->get('objectId');


            if (!empty($requestObjectId)) {
                if (!empty($row->addresses->first()->postcodeRelation) &&
                    $row->addresses->first()->postcodeRelation->area->objects->first()->pivot->object_id ==
                    $requestObjectId) {
                    $records["data"][] = [
                        parseEditRoute('clients', $row->id, $row->id, 'asIcon'),
                        $row->id,
                        parseEditRoute('clients', $row->id, $row->name . ' ' . $row->last_name),
                        $row->email,
                        $row->phone,
                        $objects->firstWhere('id', $request->get('objectId'))->name ?? '',
                    ];
                }
            } else {
                $records["data"][] = [
                    parseEditRoute('clients', $row->id, $row->id, 'asIcon'),
                    $row->id,
                    parseEditRoute('clients', $row->id, $row->name . ' ' . $row->last_name),
                    $row->email,
                    $row->phone,
                    !empty($rowObjectId) ? $objects->firstWhere('id', $rowObjectId)->name : __('No object'),
                ];
            }


        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);

    }

    public function clientEditView($id): View
    {
        $client = User::withTrashed()->with(['pets'])->firstWhere('id', $id);

        return view('admin.clients.edit')->with(['client' => $client]);
    }

    public function personalData(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $client = User::firstWhere('id', $id)->update($request->except(['_token']));

        return redirect()->route('admin.clients.edit.view', ['id' => $id])->with(['client' => $client]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param                          $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function gridDataClientsAddresses(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $iTotalRecords = UserAddress::where('user_id', $id)->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));


        $dataFilterEloquent = UserAddress::query([
            'user_addresses.id',
            'user_addresses.postcode',
            'user_addresses.address',
            'user_addresses.deleted_at',
        ])->where('user_id', $id)->with(['postcodeRelation']);

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->where('user_addresses.postcode', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('user_addresses.address', 'LIKE', '%' . $searchValue . '%');
            });
        }

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
                case 1:
                    $dataFilterEloquent->orderBy('user_addresses.postcode', $orderDirection);
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
            $addressData = explode(', ', trim($row->address));
            $postcodeData = explode(' ', trim($row->postcode));
            $records["data"][] = [
                $row->id,
                parseDate($row->created_at),
                $row->postcode,
                !empty($row->postcodeRelation()->first()) ?
                    optional(optional($row->postcodeRelation()->first())->area()->first())->name ??
                    substr($postcodeData[0], 0, 4) : '',
                $addressData[5] ?? '',
                !empty($row->postcodeRelation()->first()) ?
                    optional($row->postcodeRelation()->first()->subArea()->first())->name ?? ($addressData[6] ?? '') :
                    '',
                trim($row->address),
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);

    }

    public function gridDataClientsPets(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $iTotalRecords = Pet::withTrashed()->where('user_id', $id)->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));


        $dataFilterEloquent = Pet::query([
            'user_pets.id',
            'user_pets.name',
            'user_pets.age',
            'user_pets.gender',
            'user_pets.phone',
            'user_pets.name',
        ])->where('user_id', $id)->with([
            'owner' => function ($q) {
                $q->withTrashed();
            },
            'breed',
        ]);


        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';

        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->where('user_pets.name', 'LIKE', '%' . $searchValue . '%');
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
                $row->owner->name . $row->owner->last_name,
                parseDate($row->created_at),
                $status,
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);

    }

    public function gridDataClientsOrders(Request $request, $id): JsonResponse
    {
        $iTotalRecords = Order::where('user_id', $id)->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));

        $dataFilterEloquent = Order::query([
            'orders.*',
        ])->where('user_id', $id)->with(['status']);

        // Search
        //        $search      = $request->get('search');
        //        $searchValue = $search['value'] ?? '';
        //        if (!empty($searchValue)) {
        //            $dataFilterEloquent->where(function ($query) use ($searchValue) {
        //                $query->where('orders.client.name', 'LIKE', '%' . $searchValue . '%');
        //            });
        //        }

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
                    $dataFilterEloquent->whereHas('status')->orderBy('name', $orderDirection);
                    break;
                default:
                    $dataFilterEloquent->orderBy('orders.id', ($orderDirection == 'ASC' ? 'DESC' : 'ASC'));
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
                parseEditRoute('orders', $row->id, $row->id),
                parseDate($row->created_at),
                parsePrice($row->total_amount),
                $row->user_address,
                $row->status->name,
                'invoice',
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
    public function gridDataClientsOrderComments(Request $request, $id): JsonResponse
    {
        $iTotalRecords = Order::where('user_id', $id)->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));

        $dataFilterEloquent = Order::query([
            'orders.*',
        ])->where('user_id', $id);

        //         Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->where('orders.comment', 'LIKE', '%' . $searchValue . '%');
            });
        }

        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
                case 1:
                    $dataFilterEloquent->orderBy('orders.created_at', $orderDirection);
                    break;
                case 2:
                    $dataFilterEloquent->orderBy('orders.comment', $orderDirection);
                    break;
                default:
                    $dataFilterEloquent->orderBy('orders.id', ($orderDirection == 'ASC' ? 'DESC' : 'ASC'));
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
                parseEditRoute('orders', $row->id, $row->id),
                parseDate($row->created_at),
                $row->comment,
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
    public function gridDataFavouriteMenus(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $iTotalRecords = FavouriteRecipe::query()->where('user_id', $id)->get()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));

        $dataFilterEloquent = FavouriteRecipe::query([
            'favourite_recipe.*',
        ])->with([
            'recipe',
            'pet',
            'client' => function ($q) {
                $q->withTrashed();
            },
            'recipe.products',
        ])->where('favourite_recipe.user_id', $id);

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
                    $dataFilterEloquent->join('recipes', 'favourite_recipe.recipe_id', '=', 'recipes.id')
                        ->orderBy('name', $orderDirection);
                    break;
                case 3:
                    $dataFilterEloquent->join('recipes', 'favourite_recipe.recipe_id', '=', 'recipes.id')
                        ->orderBy('recipes.name', $orderDirection);
                    break;
                case 4:
                    $dataFilterEloquent->join('users', 'favourite_recipe.user_id', '=', 'users.id')
                        ->orderBy('name', $orderDirection);
                    break;
                case 5:
                    $dataFilterEloquent->join('user_pets', 'favourite_recipe.pet_id', '=', 'user_pets.id')
                        ->orderBy('name', $orderDirection);
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
