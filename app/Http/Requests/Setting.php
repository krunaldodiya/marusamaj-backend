<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;

class Setting extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'setting.show_mobile' => 'boolean',
            'setting.show_birthday' => 'boolean',
            'uid' => 'numeric|digits:12',
            'secondary_mobile' => 'numeric|digits:10',
        ];
    }

    public function response(array $errors)
    {
        return new JsonResponse($errors, 422);
    }
}
