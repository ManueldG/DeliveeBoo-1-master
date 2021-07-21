<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    public function index(){
        $restaurants = Restaurant::with(['cuisines'])->get();

        return response()->json($restaurants);
    }

    public function show(){


        //$restaurant = Restaurant::where('name', $name)->with(['cuisines','plates'])->first();

        $restaurant = DB::table('cuisine_restaurant')
            ->join('restaurants', 'restaurants.id', '=', 'cuisine_restaurant.restaurant_id')
            ->join('cuisines', 'cuisines.id', '=', 'cuisine_restaurant.cuisine_id')
            ->select('restaurants.name as restaurant_name')
            ->get();

        //$restaurant = Restaurant::where('name', $name)->with(['cuisines','plates'])->first();


        return response()->json($restaurant);
    }
}
