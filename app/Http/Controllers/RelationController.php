<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RelationController extends Controller
{
    public function addFamilyMember(UpdateUserFamily $request)
    {
        $user = auth()->user();
        $input = $request->only(['father_name', 'father_city', 'mother_name', 'mother_city']);

        try {
            $user->update($input);
            return compact('user');
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
