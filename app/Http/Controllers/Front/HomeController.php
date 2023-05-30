<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMail;
use App\Mail\OrderAdminMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('home');
    }

    public function contactForm(Request $request)
    {
        $admins = User::query()->whereHas('roles', function ($q) {
            $q->where('name', 'Admin');
        })->get();
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new ContactFormMail($request));
        }

        return $this->index();
    }
}
