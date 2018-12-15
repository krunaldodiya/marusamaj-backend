<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserProfile;
use App\Caste;

class UserController extends Controller
{
    public function me()
    {
        $user = auth()->user();

        $wallet = $user->wallet;
        $transactions = $wallet->transactions;

        return compact('user');
    }

    public function wallet()
    {
        $user = auth()->user();
        $wallet = $user->wallet;
        $transactions = $wallet->transactions;

        return compact('wallet');
    }

    public function createUserProfile(CreateUserProfile $request)
    {
        $user = auth()->user();
        $input = $request->only(['mobile']);

        try {
            $user->update($input);
            $wallet = $user->wallet;
            $transactions = $wallet->transactions;

            return compact('user');
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function updateUserProfile(Request $request)
    {
        $user = auth()->user();
        $input = $request->only(['caste_id', 'sub_caste_id', 'caste_updated']);

        try {
            $user->update($input);
            return compact('user');
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
