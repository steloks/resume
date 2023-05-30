<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
            {
                if (Str::contains($this->url(), 'register')) {
                    return $this->register();
                }
                return $this->login();
            }
        }
        return [];
    }

    public function register()
    {
        return [
            'name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'postcode' => 'required',
            'address' => 'required_with:postcode',
        ];
    }

    public function login()
    {
        return [
            'email_login' => 'required',
            'password_login' => 'required',
        ];
    }
}
