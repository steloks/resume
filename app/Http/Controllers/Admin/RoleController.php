<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Module;
use App\Models\ObjectModel;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RoleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        $roles = Role::query()->select(['id', 'name'])->withTrashed()->get();

        return view('admin.roles.index')->with(['roles' => $roles]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function gridDataRoles(Request $request): \Illuminate\Http\JsonResponse
    {
        $iTotalRecords = Role::withTrashed()->get()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));
        $roleId = $request->get('role_id');
        $status = (int)$request->get('status');

        $dataFilterEloquent = Role::query([
            'roles.*',
        ])->withTrashed();

        if (!empty($roleId)) {
            $dataFilterEloquent->where('id', $roleId);
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
                $query->where('roles.name', 'LIKE', '%' . $searchValue . '%');
            });
        }

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
                case 2:
                    $dataFilterEloquent->orderBy('roles.name', $orderDirection);
                    break;
                case 3:
                    $dataFilterEloquent->orderBy('roles.created_at', $orderDirection);
                    break;
                case 4:
                    $dataFilterEloquent->orderBy('roles.deleted_at', $orderDirection);
                    break;
                default:
                    $dataFilterEloquent->orderBy('roles.id', $orderDirection);
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
                parseEditRoute('roles', $row->id, $row->id, 'asIcon', 'Roles') . (empty($row->deleted_at) ? parseDeleteRoute('roles', $row->id, $row->id, 'asIcon', 'Roles') : ''),
                $row->id,
                parseDetailRoute('roles', $row->id, $row->name, 'Roles'),
                $row->description,
                parseDate($row->created_at),
                $status
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);

    }

    public function add()
    {
        $users = User::all();
        $objects = ObjectModel::all();
        return view('admin.roles.create')->with(['users' => $users, 'objects' => $objects]);
    }

    public function show($id)
    {
        $role = Role::query()->firstWhere('id', $id);
        $users = User::all();
        $objects = ObjectModel::all();
        $usersWithRole = User::query()->whereHas('objects', function ($q) use ($role) {
            $q->where('user_objects.role_id', $role->id)->orderBy('user_objects.id', 'asc');
        })->with(['objects' => function ($qq) use ($role) {
            $qq->where('role_id', $role->id);
        }])->get();

        return view('admin.roles.show')->with(['role' => $role, 'users' => $users, 'objects' => $objects, 'usersWithRole' => $usersWithRole]);
    }

    /**
     * @param \App\Http\Requests\RoleRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->except(['_token']);
        $users = $data['user_ids'] ?? [];
        $objects = $data['object_ids'] ?? [];

        $role = Role::query()->create([
            'name' => $data['name'],
            'description' => $data['description'],
            'deleted_at' => !empty($data['status']) ? Carbon::now()->format('Y-m-d H:i:s') : null,
        ]);

        foreach ($users as $key => $userId) {
            $user = User::query()->firstWhere('id', $userId);

            $user->roles()->attach($role->id);
            $user->objects()->attach([$objects[$key] => ['role_id' => $role->id]]);
        }


        return redirect()->route('admin.roles.index');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id): View
    {
        $role = Role::query()->firstWhere('id', $id);
        $users = User::all();
        $objects = ObjectModel::all();
        $usersWithRole = User::query()->whereHas('objects', function ($q) use ($role) {
            $q->where('user_objects.role_id', $role->id)->orderBy('user_objects.id', 'asc');
        })->with(['objects' => function ($qq) use ($role) {
            $qq->where('role_id', $role->id);
        }])->get();
        $modules = Module::all();

        return view('admin.roles.edit')->with(['role' => $role, 'users' => $users, 'objects' => $objects, 'usersWithRole' => $usersWithRole, 'modules' => $modules]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param                          $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RoleRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $role = Role::query()->firstWhere('id', $id);
        $data = $request->except(['_token']);
        $users = $data['user_ids'] ?? [];
        $objects = $data['object_ids'] ?? [];

        $role->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'deleted_at' => !empty($data['status']) ? Carbon::now()->format('Y-m-d H:i:s') : null,
        ]);

        foreach ($role->users()->get() as $user) {
            $user->roles()->detach($role->id);
            $user->objects()->wherePivot('role_id', $role->id)->detach();
        }

        foreach ($users as $key => $userId) {
            $user = User::query()->firstWhere('id', $userId);
            $user->roles()->attach($role->id);
            $user->objects()->attach($objects[$key], ['role_id' => $role->id]);
        }

        foreach ($request->show_module as $moduleId => $value) {
            if ($id == 1) {
                $sync[$moduleId] = [
                    'show_module' => 1,
                    'create_edit' => 1,
                    'view' => 1,
                    'delete' => 1,
                ];
                continue;
            }
            $sync[$moduleId] = [
                'show_module' => $value,
                'create_edit' => $request->create_edit[$moduleId],
                'view' => $request->view[$moduleId],
                'delete' => $request->delete[$moduleId],
            ];

        }

        $role->modules()->sync($sync);

        return redirect()->back();
//            ->route('admin.roles.index');

    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        $role = Role::query()->firstWhere('id', $id);

        if (Str::contains($role->name, ['Admin', 'admin'])) {
            return redirect()->route('admin.roles.index');
        }

        $role->delete();

        return redirect()->route('admin.roles.index');
    }
}
