<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Plate;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = DB::table('cuisine_restaurant')
                ->join('restaurants', 'restaurants.id', '=', 'cuisine_restaurant.restaurant_id')
                ->join('cuisines', 'cuisines.id', '=', 'cuisine_restaurant.cuisine_id')
                ->select('restaurants.id', 'restaurants.name', 'restaurants.description', 'restaurants.image', 'restaurants.address', 'restaurants.city', 'restaurants.cap', 'restaurants.phone_number')
                ->distinct()
                ->limit(20)
                ->get();

        return response()->json(['success' => true,
                'results' => $restaurants]);
    }


    public function id($id)
    {
        $restaurants = DB::table('cuisine_restaurant')
                ->join('restaurants', 'restaurants.id', '=', 'cuisine_restaurant.restaurant_id')
                ->join('cuisines', 'cuisines.id', '=', 'cuisine_restaurant.cuisine_id')
                ->select('restaurants.id', 'restaurants.name', 'restaurants.description', 'restaurants.image', 'restaurants.address', 'restaurants.city', 'restaurants.cap', 'restaurants.phone_number')

                ->limit(20)
                ->where('restaurants.id', $id)
                ->get();

        /*
        SELECT A.restaurant_id AS Rist1, B.restaurant_id AS Rist2, A.cuisine_id AS Plate1, B.cuisine_id AS Plate2

        FROM cuisine_restaurant A, cuisine_restaurant B
        WHERE A.restaurant_id = B.restaurant_id

        AND A.cuisine_id IN (1,7)
        AND B.cuisine_id IN (1,7)
        AND A.cuisine_id <> B.cuisine_id

        ORDER BY `Plate1` ASC
        */



        return response()->json(['success' => true,
            'results' => $restaurants]);
    }

    public function cuisine($type)
    {
        $str = explode('-', $type);

        $restaurants = DB::table('cuisine_restaurant')
                ->join('restaurants', 'restaurants.id', '=', 'cuisine_restaurant.restaurant_id')

                ->join('cuisines AS cucina', 'cucina.id', '=', 'cuisine_restaurant.cuisine_id')

                ->select('restaurants.*')

                ->whereIn('cucina.type', $str)

                ->groupBy('restaurant_id')

                ->having(DB::raw('count(restaurant_id)'),'=',count($str))

                ->get();



        return response()->json(['success' => true,
            'results' => $restaurants]);

    }
}
