<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Mail\ForgotPasswordMail;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * @param \App\Http\Requests\AuthRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(AuthRequest $request): \Illuminate\Http\JsonResponse
    {
        $newUser = User::create($request->all());

        UserAddress::create([
            'user_id' => $newUser->id,
            'postcode' => $request->postcode,
            'address' => $request->address,
        ]);

        $newUser->roles()->attach(3);

        return response()->json(['success' => true, 'message' => '']);
    }

    public function login(AuthRequest $request)
    {
        $user = User::where('email', $request->email_login)->first();

        if ($user) {
            if (Hash::check($request->password_login, $user->password)) {
                if ($request->adminLogin) {
                    if ($user->roles()->whereIn('name', ['admin', 'user'])) {
                        Auth::guard('admin')->login($user, $request->rememberMe ? true : false);
                        return redirect()->route('admin.dashboard-index');
                    } else {
                        return redirect()->route('adminLoginForm');
                    }
                }
                Auth::login($user, $request->rememberMe ? true : false);
                return response()->json(['route' => route('home')], 200);
            } else {
                return response()->json(['error' => ['password_login' => 'Wrong password']], 401);
            }
        } else {
            return response()->json(['error' => ['email_login' => 'User not found']], 401);
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout($isAdmin = null): \Illuminate\Http\RedirectResponse
    {
        if ($isAdmin) {
            Auth::guard('admin')->logout();
            return redirect()->route('adminLoginForm');
        }

        Auth::logout();
        return redirect()->route('home');
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function resetPassword(Request $request): \Illuminate\Http\JsonResponse
    {
        $email = $request->get('email');
        $user = User::query()->firstWhere('email', $email);

        if (!$user->exists()) {
            return response()->json(['success' => false, 'message' => __('No user with provided email is found.')]);
        }

        $tempPass = Str::random(16);

        try {
            $user->update([
                'password' => $tempPass
            ]);

            Mail::to($email)->send(new ForgotPasswordMail($user, $tempPass));

        } catch (\Exception $exception) {
            throw $exception;
        }

        return response()->json(['success' => true]);
    }

}
