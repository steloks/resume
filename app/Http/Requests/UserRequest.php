<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        if (\Illuminate\Support\Facades\Route::is('admin.users.update')) {
            if (!empty($this->request->get('update_password'))) {
                $user = User::query()->firstWhere('email', $this->request->get('email'));

                return [
                    'password' => function ($attribute, $password, $fail) use ($user) {
                        if (!Hash::check($password, $user->password)) {
                            $fail('Your current password doesnt match');
                        }
                    },
                    'new_password' => 'required_with:confirm_new_password|same:confirm_new_password|min:6',
                    'confirm_new_password' => 'min:6',
                ];
            }

            return [
                'email' => 'string|max:255|unique:users,email,' . $this->id,
                'username' => ['sometimes'],
                'name' => 'required',
                'last_name' => 'required',
                'phone' => 'required',
                'company_name' => 'nullable',
                'status' => 'required',
            ];
        } else {
            return [
                'username' => ['nullable', 'max:255'],
                'name' => 'required',
                'last_name' => 'required',
                'password' => ['required', 'sometimes', 'string', 'min:6'],
                'email' => 'required|unique:users',
                'phone' => 'required',
                'company_name' => 'nullable',
                'status' => 'required',
            ];
        }
    }
}
