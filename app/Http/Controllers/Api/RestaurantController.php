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

                /*
                SELECT A.restaurant_id AS Rist1, B.restaurant_id AS Rist2, C.cuisine_id AS Plate1, D.cuisine_id AS Plate2
FROM plates A, plates B ,cuisine_restaurant C,cuisine_restaurant D
WHERE A.restaurant_id = B.restaurant_id
AND C.cuisine_id IN (1,7)
AND C.cuisine_id <> D.cuisine_id
ORDER BY `Plate1` ASC
                */



        return response()->json(['success' => true,
            'results' => $restaurants]);
    }

    public function cuisine($type){

            $str = explode('-', $type);
            /*
            $restaurants = DB::table('cuisine_restaurant')
                ->join('restaurants', 'restaurants.id', '=', 'cuisine_restaurant.restaurant_id')
                ->join('cuisines', 'cuisines.id', '=', 'cuisine_restaurant.cuisine_id')
                ->select('restaurants.id','restaurants.name','restaurants.description','restaurants.image','restaurants.address','restaurants.city','restaurants.cap','restaurants.phone_number')
                ->distinct()
                ->limit(5)
                ->where('cuisines.type',$str)
                ->where()
                ->get();*/

                $restaurants = DB::table('cuisine_restaurant')
                ->join('restaurants', 'restaurants.id', '=', 'cuisine_restaurant.restaurant_id')
                ->join('cuisines', 'cuisines.id', '=', 'cuisine_restaurant.cuisine_id')
                ->select('restaurants.id','restaurants.name','restaurants.description','restaurants.image','restaurants.address','restaurants.city','restaurants.cap','restaurants.phone_number','cuisines.type')
                ->limit(5)
                ->where('cuisines.type',$str)
                ->get();

            //$restaurant = Restaurant::where('name', $name)->with(['cuisines','plates'])->first();
            foreach($restaurants as $restaurant)
            $restaurant->cuisine=$str;

            return response()->json(['success' => true,
            'results' => $restaurants]);
            //return response()->json($restaurants);
    }
}

