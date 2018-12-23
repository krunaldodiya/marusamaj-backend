<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Relative;
use App\User;

class RelativeController extends Controller
{
    public function requestRelation(Request $request)
    {
        $authUser = auth()->user();

        try {
            Relative::create([
                'user_id' => $authUser['id'],
                'relative_id' => $request['relative_id'],
                'user_relation' => $request['user_relation'],
                'relative_relation' => $request['relative_relation'],
                'status' => false
            ]);

            $user = User::with('caste', 'sub_caste', 'relatives')->where(['id' => $authUser['id']])->first();
            return compact('user');
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
