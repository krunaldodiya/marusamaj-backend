<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class Register extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'mobile' => 'required|numeric|digits:10',
            'username' => 'required|min:4|unique:users|regex:/^[0-9a-z.\-_]+$/',
            'password' => 'required|min:4',
        ];
    }

    public function messages()
    {
        return [
            'mobile.required' => 'Mobile is required',
            'username.required' => 'Username is required',
            'password.required' => 'Password is required',
        ];
    }

    public function response(array $errors)
    {
        return new JsonResponse($errors, 422);
    }
}
