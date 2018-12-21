<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class Login extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required|min:4|exists:users',
            'password' => 'required|min:4',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username is required',
            'password.required' => 'Password is required',
        ];
    }

    public function response(array $errors)
    {
        return new JsonResponse($errors, 422);
    }
}
