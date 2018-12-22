<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caste;
use App\User;
use App\Http\Requests\UpdateUserProfile;
use App\Http\Requests\UpdateUserCaste;
use App\Http\Requests\UpdateUserFamily;

class UserController extends Controller
{
    public function me()
    {
        $authUser = auth()->user();
        $user = User::with('caste', 'sub_caste')->where(['id' => $authUser['id']])->first();

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
        $input = $request->only(['caste_id', 'sub_caste_id']);
        $input['caste_updated'] = true;

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
        $input = $request->only(['name', 'dob', 'education', 'occupation', 'father_city', 'mother_city', 'gender', 'marital_status']);
        $input['profile_updated'] = true;

        try {
            $user->update($input);
            return compact('user');
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getAllUsers(Request $request)
    {
        $limit = 10;
        $authUser = auth()->user();
        $users = User::with('caste', 'sub_caste')
            ->where(['caste_id' => $authUser['caste_id']])
            ->where(function ($query) use ($request) {
                if ($request->has('filters')) {
                    $filters = $request['filters'];

                    if ($filters['keywords']) {
                        $keywords = $filters['keywords'];

                        $query
                            ->where('name', 'LIKE', "%${keywords}%")
                            ->orWhere('username', 'LIKE', "%${keywords}%")
                            ->orWhere('mobile', 'LIKE', "%${keywords}%");
                    }

                    if ($filters['father_city']) {
                        $query
                            ->where('father_city', $filters['father_city']);
                    }

                    if ($filters['mother_city']) {
                        $query
                            ->where('mother_city', $filters['mother_city']);
                    }

                    if ($filters['gender'] && $filters['gender'] !== "Any") {
                        $query
                            ->where('gender', $filters['gender']);
                    }

                    if ($filters['marital_status'] && $filters['marital_status'] !== "Any") {
                        $query
                            ->where('marital_status', $filters['marital_status']);
                    }

                    return $query;
                }

                return $query;
            })
            ->paginate($limit);

        return compact('users');
    }

    public function changeAvatar(Request $request)
    {
        $authUser = auth()->user();

        $update = $authUser->update(['avatar' => $request->avatar]);

        return ['success' => $update ? true : false];
    }
}
