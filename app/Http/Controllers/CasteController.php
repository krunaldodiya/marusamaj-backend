<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\SubCaste;

class CasteController extends Controller
{
    public function __construct()
    {
        //
    }

    public function castes(Request $request)
    {
        $castes = SubCaste::with('caste')->get();

        return ['castes' => $castes];
    }
}
