<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Plate;
use Illuminate\Http\Request;


class MenuController extends Controller
{
    public function index(){
<<<<<<< HEAD
        $menus = Plate::all();
        
        return response()->json($menus);
=======
        $plates = Plate::all();

        return response()->json($plates);
>>>>>>> fb33aa192e8ad8c01cb6b6a39f26582e0b2ee19e
    }

   /*  public function show($name){

        $menu = Plate::where('name', $name)->with(['plates'])->first();

        return response()->json($menu);
    } */
}
