<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Caste;
use App\Http\Requests\UpdateUserCaste;
use App\User;

class CasteController extends Controller
{
    public function __construct()
    {
        //
    }

    public function castes(Request $request)
    {
        $castes = Caste::with('sub_castes')->get();

        return ['castes' => $castes];
    }

    public function updateUserCaste(UpdateUserCaste $request)
    {
        $authUser = auth()->user();
        $input = $request->only(['caste_id', 'sub_caste_id', 'caste_updated']);

        try {
            $authUser->update($input);
            $user = User::with('caste', 'sub_caste', 'setting', 'relatives.user.setting')->where(['id' => $authUser['id']])->first();

            return compact('user');
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
