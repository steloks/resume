<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cms;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CmsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('admin.cms.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        Cms::query()->create([
            'slug' => 'blog-' . Str::kebab($request->get('title')),
            'title' => $request->get('title'),
            'type' => 'blog',
            'short_preview' => $request->get('short_preview'),
            'content' => $request->get('content'),
        ]);

        return redirect()->route('admin.cms.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function gridDataCms(Request $request): \Illuminate\Http\JsonResponse
    {
        $iTotalRecords = Cms::all()->count();
        $iDisplayLength = (int)($request->get('length'));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart = (int)($request->get('start'));
        $sEcho = (int)($request->get('draw'));

        $dataFilterEloquent = Cms::query([
            'cms.*',
        ]);

        // Search
        $search = $request->get('search');
        $searchValue = $search['value'] ?? '';
        if (!empty($searchValue)) {
            $dataFilterEloquent->where(function ($query) use ($searchValue) {
                $query->where('title', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('id', $searchValue)
                    ->orWhere('type', 'LIKE', '%' . $searchValue . '%');
            });
        }

        // Sorting
        $order = $request->get('order');
        if (isset($order[0]['column'])) {
            $orderDirection = mb_strtoupper($order[0]['dir']);
            switch ($order[0]['column']) {
                case 1:
                    $dataFilterEloquent->orderBy('title', $orderDirection);
                    break;
                case 2:
                    $dataFilterEloquent->orderBy('created_at', $orderDirection);
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
                parseEditRoute('cms', $row->id, $row->id, 'asIcon') .
                ($row->type != 'info' ? parseDeleteRoute('cms', $row->id, $row->id, 'asIcon') : ''),
                $row->id,
                parseEditRoute('cms', $row->id, $row->title),
                ucfirst($row->type),
                parseDate($row->created_at),
            ];
        }

        $records["draw"] = $sEcho;
        $records["recordsTotal"] = $iTotalRecords;
        $records["recordsFiltered"] = $iFilteredRecords;

        return response()->json($records);

    }

    public function edit($id): View
    {
        $cms = Cms::query()->firstWhere('id', $id);

        return view('admin.cms.edit')->with(['cms' => $cms]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param                          $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $cms = Cms::query()->firstWhere('id', $id);
        $cms->update([
            'title' => $request->get('title'),
            'content' => $request->get('content')
        ]);

        if ($cms->type == 'blog') {
            $cms->update([
                'short_preview' => $request->get('short_preview')
            ]);
        }


        return redirect()->route('admin.cms.index');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function add(): View
    {
        return view('admin.cms.create');
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        Cms::query()->findOrFail($id)->delete();

        return redirect()->route('admin.cms.index');
    }
}
