<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caste;
use App\Http\Requests\UpdateUserProfile;
use App\Http\Requests\UpdateUserCaste;
use App\Http\Requests\UpdateUserFamily;

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

    public function updateUserCaste(UpdateUserCaste $request)
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

    public function updateUserProfile(UpdateUserProfile $request)
    {
        $user = auth()->user();
        $input = $request->only(['name', 'dob', 'education', 'occupation', 'gender', 'marital_status', 'profile_updated']);

        try {
            $user->update($input);
            return compact('user');
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function updateUserFamily(UpdateUserFamily $request)
    {
        $user = auth()->user();
        $input = $request->only(['father_name', 'father_city', 'mother_name', 'mother_city', 'family_updated']);

        try {
            $user->update($input);
            return compact('user');
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
