<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Plate;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    public function index(){

        $restaurants = DB::table('cuisine_restaurant')
                ->join('restaurants', 'restaurants.id', '=', 'cuisine_restaurant.restaurant_id')
                ->join('cuisines', 'cuisines.id', '=', 'cuisine_restaurant.cuisine_id')
                ->select('restaurants.id','restaurants.name','restaurants.description','restaurants.image','restaurants.address','restaurants.city','restaurants.cap','restaurants.phone_number')
                ->distinct()
                ->limit(20)
                ->get();

                return response()->json(['success' => true,
                'results' => $restaurants]);
    }


    public function id($id){
        $restaurants = DB::table('cuisine_restaurant')
                ->join('restaurants', 'restaurants.id', '=', 'cuisine_restaurant.restaurant_id')
                ->join('cuisines', 'cuisines.id', '=', 'cuisine_restaurant.cuisine_id')
                ->select('restaurants.id','restaurants.name','restaurants.description','restaurants.image','restaurants.address','restaurants.city','restaurants.cap','restaurants.phone_number')
                ->distinct()
                ->limit(20)
                ->where('restaurants.id',$id)
                ->get();



        return response()->json(['success' => true,
            'results' => $restaurants]);
    }

    public function cuisine($type){

            $str = explode('-', $type);
            $restaurants = DB::table('cuisine_restaurant')
                ->join('restaurants', 'restaurants.id', '=', 'cuisine_restaurant.restaurant_id')
                ->join('cuisines', 'cuisines.id', '=', 'cuisine_restaurant.cuisine_id')
                ->select('restaurants.id','restaurants.name','restaurants.description','restaurants.image','restaurants.address','restaurants.city','restaurants.cap','restaurants.phone_number')
                ->distinct()
                ->limit(5)
                ->whereIn('cuisines.type',$str)
                ->get();
            //$restaurant = Restaurant::where('name', $name)->with(['cuisines','plates'])->first();

            return response()->json(['success' => true,
            'results' => $restaurants]);
            //return response()->json($restaurants);
    }
}

