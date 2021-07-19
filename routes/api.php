<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')->group(function() {

    Route::get('/restaurants', 'RestaurantController@index');
    Route::get('/restaurants/{cuisine?}', 'RestaurantController@show');
    //Route::get('/restaurants/{name?}/plates/{plate?}/cuisine/{cuisine?}', 'RestaurantController@show');
    //Route::get('/cuisines', 'CuisineController@index');
    //Route::get('/plates', 'MenuController@index');






});
