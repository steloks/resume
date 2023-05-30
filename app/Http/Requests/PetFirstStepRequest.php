<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetFirstStepRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'breed' => 'required',
            'date_of_birth' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'image' => 'nullable',
        ];
    }
}
