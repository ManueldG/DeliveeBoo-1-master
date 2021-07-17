<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Plate;
use Illuminate\Http\Request;


class MenuController extends Controller
{
    public function index(){
        $plates = Plate::all();

        return response()->json($plates);
    }

   /*  public function show($name){

        $menu = Plate::where('name', $name)->with(['plates'])->first();

        return response()->json($menu);
    } */
}
