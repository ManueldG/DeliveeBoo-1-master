<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;

class RestaurantController extends Controller
{
    public function index(){
        $restaurants = Restaurant::with(['cuisines'])->get();

        return response()->json($restaurants);
    }

    public function show($name){

        $restaurant = Restaurant::where('name', $name)->with(['cuisines'])->first();

        return response()->json($restaurant);
    }
}
