<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CmsController extends Controller
{
    /**
     * @param $slug
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index($slug): View
    {
        $cms = Cms::query()->firstWhere('slug', $slug);

        return view('cms.content')->with(['cms' => $cms]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param                          $slug
     * @param                          $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $slug, $id): RedirectResponse
    {
        Cms::query()->firstWhere('id', $id)->update(['content' => $request->get('content')]);

        return redirect()->back();
    }

    /**
     * @return \Illuminate\View\View
     */
    public function blogIndex(): View
    {
        $cms = Cms::query()->where('type', 'blog')->get();

        return view('cms.blog')->with(['cms' => $cms]);
    }
}
