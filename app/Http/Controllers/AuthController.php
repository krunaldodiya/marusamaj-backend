<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use App\Http\Requests\Register;

class AuthController extends Controller
{
    public function login(Login $request)
    {
        return 'test';
    }

    public function register(Register $request)
    {
        return 'test';
    }
}
