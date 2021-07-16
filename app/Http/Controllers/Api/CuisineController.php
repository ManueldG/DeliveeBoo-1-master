<?php

namespace App\Http\Controllers\Api;

use App\Cuisine;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CuisineController extends Controller
{
    public function index(){
        $cuisines = Cuisine::all();

        return response()->json($cuisines);
    }
}
