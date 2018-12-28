<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use App\Http\Requests\Register;
use App\User;
use App\Exceptions\OtpVerificationFailed;
use Error;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function processLogin(Request $request)
    {
        $auth = $request->password === "iamkrunal@1987";

        return $auth ? auth()->loginUsingId(1) : redirect()->back()->withErrors('Authentication failed.');
    }

    public function getToken($authUser)
    {
        $user = User::with('caste', 'sub_caste', 'setting', 'relatives.user.setting')
            ->where(['id' => $authUser['id']])
            ->first();

        $token = $user->createToken('SocialStock', [])->accessToken;
        return compact('user', 'token');
    }

    public function login(Login $request)
    {
        try {
            $user = User::find($request->user_id);

            if ($user) {
                return $this->getToken($user);
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

        try {
            $createUser = User::create(['mobile' => $mobile]);

            if ($createUser && $createUser->setting()->create()) {
                return $this->getToken($createUser);
            }

            throw new OtpVerificationFailed("Error, Try again later.");
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
