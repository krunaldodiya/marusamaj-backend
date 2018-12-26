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

        if ($request->type === 'send') {
            return $this->send($request, $authUser);
        }

        if ($request->type === 'add') {
            return $this->add($request, $authUser);
        }

        if ($request->type === 'remove') {
            return $this->remove($request, $authUser);
        }
    }

    public function send($request, $authUser)
    {
        $from = $request->from;
        $to = $request->to;

        try {
            Relative::insert([
                [
                    'user_id' => $authUser['id'],
                    'from' => $from,
                    'to' => $to,
                    'from_relation' => $request['from_relation'],
                    'to_relation' => $request['to_relation'],
                    'status' => false
                ],
                [
                    'user_id' => $authUser['id'],
                    'from' => $to,
                    'to' => $from,
                    'from_relation' => $request['to_relation'],
                    'to_relation' => $request['from_relation'],
                    'status' => false
                ]
            ]);

            $user = User::with('caste', 'sub_caste', 'setting', 'relatives.user.setting', 'default_account')->where(['id' => $authUser['id']])->first();
            return compact('user');
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function add($request, $authUser)
    {
        $from = $request->from;
        $to = $request->to;

        try {
            Relative::where(['from' => $from, 'to' => $to])
                ->orWhere(['from' => $to, 'to' => $from])
                ->update(['status' => true]);

            $user = User::with('caste', 'sub_caste', 'setting', 'relatives.user.setting', 'default_account')->where(['id' => $authUser['id']])->first();
            return compact('user');
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function remove($request, $authUser)
    {
        $from = $request->from;
        $to = $request->to;

        try {
            Relative::where(['from' => $from, 'to' => $to])
                ->orWhere(['from' => $to, 'to' => $from])
                ->delete();

            $user = User::with('caste', 'sub_caste', 'setting', 'relatives.user.setting', 'default_account')->where(['id' => $authUser['id']])->first();
            return compact('user');
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
