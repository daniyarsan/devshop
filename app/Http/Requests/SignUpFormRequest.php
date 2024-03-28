<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SignUpFormRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->guest();
    }


    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:1'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', Password::default()],
        ];
    }

    public function prepareForValidation()
    {
        //TODO: узнать что делает метод
    }
}
