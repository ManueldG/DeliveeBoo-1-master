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

<<<<<<< HEAD
        $restaurant = Restaurant::where('name', $name)->with(['cuisines', 'plates'])->first();
=======
        $restaurant = Restaurant::where('name', $name)->with(['cuisines','plates'])->first();
>>>>>>> fb33aa192e8ad8c01cb6b6a39f26582e0b2ee19e

        return response()->json($restaurant);
    }
}
