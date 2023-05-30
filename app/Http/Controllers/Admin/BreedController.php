<?php

namespace App\Http\Controllers\Admin;

use App\Models\Breed;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class BreedController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('admin.breeds.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function gridDataBreeds(Request $request): \Illuminate\Http\JsonResponse
    {
        $iTotalRecords = Breed::all()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));

        $dataFilterEloquent = Breed::query([
            '*',
        ]);

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->where('breeds.name', 'LIKE', '%' . $searchValue . '%');
            });
        }

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
                case 2:
                    $dataFilterEloquent->orderBy('breeds.name', $orderDirection);
                    break;
                case 3:
                    $dataFilterEloquent->orderBy('breeds.description', $orderDirection);
                    break;
                case 4:
                    $dataFilterEloquent->orderBy('breeds.created_at', $orderDirection);
                    break;
                default:
                    $dataFilterEloquent->orderBy('breeds.id', $orderDirection);
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
                parseEditRoute('breeds', $row->id, $row->id, 'asIcon', 'Breeds') .
                parseDeleteRoute('breeds', $row->id, $row->id, 'asIcon', 'Breeds'),
                $row->id,
                parseDetailRoute('breeds', $row->id, $row->name, 'Breeds'),
                $row->description,
                parseDate($row->created_at)
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function add()
    {
        return view('admin.breeds.create');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $breed = Breed::query()->firstWhere('id', $id);

        return view('admin.breeds.show')->with(['breed' => $breed]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->except(['_token']);

        if (!empty($data['name'])) {
            Breed::query()->create($data);
        }

        return redirect()->route('admin.breeds.index');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id): View
    {
        $breed = Breed::query()->firstWhere('id', $id);

        return view('admin.breeds.edit')->with(['breed' => $breed]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param                          $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $breed = Breed::query()->firstWhere('id', $id);
        $breed->update(['description' => $request->get('description') ?? '']);

        if (!empty($request->get('name'))) {
            $breed->update(['name' => $request->get('name')]);
        }


        return redirect()->route('admin.breeds.index');

    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        $breed = Breed::query()->firstWhere('id', $id);

        $breed->delete();

        return redirect()->route('admin.breeds.index');
    }
}
