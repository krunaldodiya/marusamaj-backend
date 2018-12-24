<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caste;
use App\User;
use App\Http\Requests\UpdateUserProfile;

class UserController extends Controller
{
    public function getUsersByMobile(Request $request)
    {
        $users = User::where('mobile', $request->mobile)->get();

        return compact('users');
    }

    public function me()
    {
        $authUser = auth()->user();
        $user = User::with('caste', 'sub_caste', 'relatives.user.caste', 'relatives.user.sub_caste')->where(['id' => $authUser['id']])->first();

        $wallet = $user->wallet;
        $transactions = $wallet->transactions;

        return compact('user');
    }

    public function updateUserProfile(UpdateUserProfile $request)
    {
        $authUser = auth()->user();
        $input = $request->only(['name', 'dob', 'education', 'occupation', 'father_city', 'mother_city', 'gender', 'marital_status', 'profile_updated']);

        try {
            $authUser->update($input);
            $user = User::with('caste', 'sub_caste', 'relatives.user.caste', 'relatives.user.sub_caste')->where(['id' => $authUser['id']])->first();

            return compact('user');
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getAllUsers(Request $request)
    {
        $limit = 10;
        $authUser = auth()->user();
        $users = User::with('caste', 'sub_caste', 'relatives.user.caste', 'relatives.user.sub_caste')
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
