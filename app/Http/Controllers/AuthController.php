<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use App\Http\Requests\Register;
use App\User;
use App\Exceptions\OtpVerificationFailed;
use Error;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function getToken($username)
    {
        $user = User::with('caste', 'sub_caste', 'relatives')->where(['username' => $username])->first();
        $token = $user->createToken('SocialStock', [])->accessToken;

        return compact('user', 'token');
    }

    public function login(Login $request)
    {
        $username = $request->username;
        $password = $request->password;

        try {
            $auth = auth()->attempt(['username' => $username, 'password' => $password]);

            if ($auth) {
                return $this->getToken($username);
            }

            throw ValidationException::withMessages([
                'password' => ['Invalid Password.']
            ]);

        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function register(Register $request)
    {
        $mobile = $request->mobile;
        $username = $request->username;
        $password = $request->password;

        try {
            $createUser = User::create(['mobile' => $mobile, 'username' => $username, 'password' => $password]);

            if ($createUser) {
                return $this->getToken($username);
            }

            throw new OtpVerificationFailed("Error, Try again later.");
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
