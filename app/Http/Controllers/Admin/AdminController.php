<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use function GuzzleHttp\Promise\all;

class AdminController extends Controller
{
    public function getLoginForm()
    {
        return view('admin.login');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setLocale(Request $request): \Illuminate\Http\RedirectResponse
    {
        $locale = $request->get('locale');
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
