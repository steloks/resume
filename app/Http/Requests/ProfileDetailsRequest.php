<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class ProfileDetailsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Sets custom validation messages.
     *
     * @return array
     */
    public function messages()
    {

        return [
            'password.same' => __('Password does not match old password'),
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $password = $this->request->get('password');
        if (!empty($password)) {
            return [
                'password' => function ($attribute, $password, $fail) {
                    if (!Hash::check($password, $this->user()->password)) {
                        $fail('Your current password doesnt match');
                    }
                },
                'new_password' => 'required_with:confirm_new_password|same:confirm_new_password|min:6',
                'confirm_new_password' => 'min:6',
            ];
        }

        return [
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'string|max:255|unique:users,email,' . auth()->id(),
            'phone' => 'required',
        ];

    }
}
