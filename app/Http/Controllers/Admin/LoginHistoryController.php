<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoginHistory;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class LoginHistoryController extends Controller
{
    public function index()
    {
        $users = User::withTrashed()->select(['id', 'name', 'last_name'])->get();

        return view('admin.login_history.index')->with(['users' => $users]);
    }

    public function gridDataLoginHistory(Request $request): \Illuminate\Http\JsonResponse
    {
        $iTotalRecords = LoginHistory::all()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));
        $userId = $request->get('user_id');

        $dataFilterEloquent = LoginHistory::query([
            'authentication_log.id',
        ])->with(['user']);

        if (!empty($userId)) {
            $dataFilterEloquent->whereHas('user', function ($q) use ($userId) {
                $q->where('users.id', $userId);
            });
        }

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->where('authentication_log.type', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('authentication_log.id', $searchValue);
            });
        }

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
                case 1:
                    $dataFilterEloquent->orderBy('authentication_log.authenticatable_id', $orderDirection);
                    break;
                case 2:
                    $dataFilterEloquent->orderBy('authentication_log.ip_address', $orderDirection);
                    break;
                case 3:
                    $dataFilterEloquent->orderBy('authentication_log.user_agent', $orderDirection);
                    break;
                case 3:
                    $dataFilterEloquent->orderBy('authentication_log.login_at', $orderDirection);
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

        $roleNames = Role::query()->where('name', '<>', 'Client')->pluck('name');
        foreach ($data as $row) {

            $records["data"][] = [
                $row->id,
                $row->user->hasRole($roleNames) ? parseDetailRoute('users', $row->user->id, $row->user->name . ' ' . $row->user->last_name, 'Users') : parseEditRoute('clients', $row->user->id, $row->user->name . ' ' . $row->user->last_name),
                $row->ip_address,
                $row->user_agent,
                parseDate($row->login_at)
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);
    }
}
