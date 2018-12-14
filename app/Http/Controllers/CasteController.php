<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Caste;

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
}
