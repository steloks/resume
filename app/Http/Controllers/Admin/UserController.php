<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\ObjectModel;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $roles = Role::query()->select(['id', 'name'])->withTrashed()->get();
        $objects = ObjectModel::query()->select(['id', 'name'])->get();

        return view('admin.users.index')->with(['roles' => $roles, 'objects' => $objects]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function gridDataAdminUsers(Request $request): \Illuminate\Http\JsonResponse
    {

        $iTotalRecords = User::withTrashed()->get()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));
        $roleId = $request->get('role_id');
        $objectId = $request->get('object_id');
        $status = (int)$request->get('status');


        $dataFilterEloquent = User::query([
            'users.*',
        ])->withTrashed()->with(['roles', 'objects'])
            ->whereHas('roles', function ($q) {
                $q->where('name', '<>', 'Client');
            });


        if (!empty($roleId)) {
            $dataFilterEloquent->whereHas('roles', function ($q) use ($roleId) {
                $q->where('roles.id', $roleId);
            });
        }

        if (!empty($objectId)) {
            $dataFilterEloquent->whereHas('objects', function ($q) use ($objectId) {
                $q->where('objects.id', $objectId);
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
                $query->where('users.name', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('users.last_name', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('users.email', 'LIKE', '%' . $searchValue . '%');
            });
        }

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

        foreach ($data as $row) {

            $status = '<span class="' . (empty($row->deleted_at) ? 'bg-rgba-success' : 'bg-rgba-danger') . '">' .
                (!empty($row->deleted_at) ? 'Inactive' : 'Active') . '</span>';

            $records["data"][] = [
                parseEditRoute('users', $row->id, $row->id, 'asIcon', 'Users') .
                parseDeleteRoute('users', $row->id, $row->id, 'asIcon', 'Users'),
                $row->id,
                parseDetailRoute('users', $row->id, $row->name . ' ' . $row->last_name, 'Users'),
                $row->email,
                $row->phone,
                $row->objects->implode('name', ','),
                $row->roles->implode('name', ','),
                $status,
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);

    }

    public function add()
    {
        $objects = ObjectModel::query()->select(['id', 'name'])->get();
        $roles = Role::query()->select(['id', 'name'])->where('deleted_at', null)->get();

        return view('admin.users.create')->with(['objects' => $objects, 'roles' => $roles]);
    }

    public function show($id)
    {
        $user = User::withTrashed()->firstWhere('id', $id);
        $objects = ObjectModel::query()->select(['id', 'name'])->get();
        $roles = Role::query()->select(['id', 'name'])->where('deleted_at', null)->get();

        return view('admin.users.show')->with(['user' => $user, 'objects' => $objects, 'roles' => $roles]);
    }

    /**
     * @param \App\Http\Requests\UserRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->except(['_token']);
        $roleIds = $data['role_ids'] ?? [];
        $objectIds = $data['object_ids'] ?? [];
        $data['deleted_at'] = !empty($data['status']) ? null : Carbon::now()->format('Y-m-d H:i:s');
        unset($data['status']);
        $data['username'] = !empty($data['username']) ? $data['username'] : $data['email'];

        $user = User::query()->create($data);

        if (!empty($roleIds)) {
            foreach ($roleIds as $key => $roleId) {
                $user->roles()->attach($roleId);
                $user->objects()->attach($objectIds[$key]);
                $user->objects()->attach($objectIds[$key], ['role_id' => $roleId]);
            }
        }

        return redirect()->route('admin.users.index');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id): View
    {
        $user = User::withTrashed()->firstWhere('id', $id);
        $objects = ObjectModel::query()->select(['id', 'name'])->get();
        $roles = Role::query()->select(['id', 'name'])->where('deleted_at', null)->get();

        return view('admin.users.edit')->with([
            'user' => $user,
            'objects' => $objects,
            'roles' => $roles,
        ]);
    }

    /**
     * @param \App\Http\Requests\UserRequest $request
     * @param                                $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $user = User::withTrashed()->firstWhere('id', $id);
        $data = $request->except(['_token']);
        $roleIds = $data['role_ids'] ?? [];
        $objectIds = $data['object_ids'] ?? [];

        if (!empty($request->get('update_password'))) {
            $user->update(['password' => $request->get('new_password')]);

            return redirect()->route('admin.users.index');
        }

        $user->update([
            'username' => $data['username'] ?? $data['email'],
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'company_name' => $data['company_name'],
            'deleted_at' => !empty($data['status']) ? null : Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        $user->objects()->detach();
        if (!empty($roleIds)) {
            foreach ($roleIds as $key => $roleId) {
                $user->roles()->detach($roleId);
                $user->roles()->attach($roleId);
                if (!empty($objectIds)) {
                    $user->objects()->attach($objectIds[$key], ['role_id' => $roleId]);
                }

            }
        }

        return redirect()->route('admin.users.index');

    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        $user = User::withTrashed()->firstWhere('id', $id);

        $user->update(['deleted_at' => Carbon::now()->format('Y-m-d H:i:s')]);

        return redirect()->route('admin.users.index');
    }

}
