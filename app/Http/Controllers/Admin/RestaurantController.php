<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Restaurant;
use App\Cuisine;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $restaurants = Restaurant::all();

        return view('admin.restaurants.index', compact('restaurants'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $cuisines = Cuisine::all();

        return view('admin.restaurants.create', compact('cuisines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:restaurants',
            'description' => 'nullable',
            'image' => 'nullable',
            'address' => 'required',
            'city' => 'required',
            'cap' => 'required|max:5',
            'phone_number' => 'required|max:20',
            'cuisines' => 'required'
        ]);

        $data = $request->all();

        $new_restaurant = new Restaurant();

        $new_restaurant->fill($data);

        $new_restaurant->save();

        if(array_key_exists('cuisines', $data)) {
            $new_restaurant->cuisines()->attach($data['cuisines']);
        }
        
        return redirect()->route('admin.restaurants.show', $new_restaurant->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $restaurant = Restaurant::find($id);

        if(!$restaurant) {
            abort(404);
        }
        return view('admin.restaurants.show', compact('restaurant'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
