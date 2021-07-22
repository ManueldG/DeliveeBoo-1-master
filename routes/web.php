<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::prefix('admin')->namespace('Admin')->middleware('auth')->name('admin.')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    
    Route::resource('/restaurants', 'RestaurantController');

    Route::resource('/orders', 'OrderController');

    Route::resource('/plates', 'PlateController');
});

Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');
