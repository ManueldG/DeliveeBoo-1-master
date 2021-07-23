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

                ->join('cuisines AS cucina', 'cucina.id', '=', 'cuisine_restaurant.cuisine_id')

                ->select('restaurants.*', 'cucina.*', 'cuisine_restaurant.*')

                ->whereIn('cucina.type', $str)

                ->get();



        /*

        SELECT `cuisine_id`,`restaurant_id` FROM `cuisine_restaurant` WHERE `cuisine_id` in (1,7)


        select A.restaurant_id AS Rist1, A.cuisine_id AS Plate1, B.cuisine_id AS Plate2

        FROM cuisine_restaurant A, cuisine_restaurant B
        WHERE A.restaurant_id = B.restaurant_id

        AND A.cuisine_id IN (1,7)
        AND B.cuisine_id IN (1,7)
        AND A.cuisine_id <> B.cuisine_id
        group by A.`restaurant_id`
        ORDER BY `Plate1` ASC

        $product1 = Product::find(1);
        $children = Product::where('id', '<>', $product1->id)->
        where('color_id', $product1->color_id)->
        get();
        */
        $res[]='';
        //$restaurant = Restaurant::where('name', $name)->with(['cuisines','plates'])->first();
        foreach ($restaurants as $restaurant) {
            if (in_array($restaurant->type, $str) || ($restaurant->type===null)) {
                $restaurant->type2 = $restaurant->type;
                $res[$restaurant->restaurant_id]=$restaurant;
            }
        }


        return response()->json(['success' => true,
            'results' => $res]);

    }
}
