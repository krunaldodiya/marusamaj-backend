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
            Relative::insert([
                [
                    'user_id' => $authUser['id'],
                    'from' => $request['from'],
                    'to' => $request['to'],
                    'from_relation' => $request['from_relation'],
                    'to_relation' => $request['to_relation'],
                    'status' => false
                ],
                [
                    'user_id' => $authUser['id'],
                    'from' => $request['to'],
                    'to' => $request['from'],
                    'from_relation' => $request['to_relation'],
                    'to_relation' => $request['from_relation'],
                    'status' => false
                ]
            ]);

            $user = User::with('caste', 'sub_caste', 'relatives')->where(['id' => $authUser['id']])->first();
            return compact('user');
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
