<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Restaurant;
use App\Plate;
use App\Cuisine;
use App\User;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $restaurants = Restaurant::where('user_id', auth()->id())->get();

        return view('admin.restaurants.index', compact('restaurants'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $restaurants = Restaurant::all();
        $user = User::all();
        $cuisines = Cuisine::all();

        return view('admin.restaurants.create', compact('cuisines','restaurants', 'user'));
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
            'name' => 'required|unique:restaurants|max:30',
            'description' => 'nullable',
            'image' => 'nullable',
            'address' => 'required',
            'city' => 'required',
            'cap' => 'required|max:5',
            'phone_number' => 'required|max:20',
            'cuisines' => 'required|exists:cuisines,id',
            'user_id' => 'exists:user,id'
        ],[
            'required' => ' The :attribute is required !!',
            'unique' => ' The :attribute is already taken',
            'max' => 'Max :max characters allowed '
        ]);

        $data = $request->all();

        $new_restaurant = new Restaurant();

        $user = Auth::user();
        $data['user_id'] = $user['id'];

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
        $user = Auth::user();
        $restaurant = Restaurant::find($id);
        $plates = Plate::all()->where('restaurant_id', $restaurant->id);


        //dump($user->id);


        if(!$restaurant||($restaurant->user_id!==$user->id)) {
            abort(404);
        }
        return view('admin.restaurants.show', compact('restaurant', 'plates'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurant = Restaurant::find($id);
        $cuisines = Cuisine::all();
        $user = Auth::user();

        if(!$restaurant){
            abort(404);
        }

        if(!$restaurant||($restaurant->user_id!==$user->id)) {
            abort(404);
        }

        return view('admin.restaurants.edit', compact('restaurant', 'cuisines'));
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

        $request->validate([
            'name' => [
                'required',
                Rule::unique('restaurants')->ignore($id),
                'max:30',
            ],
            'description' => 'nullable',
            'image' => 'nullable',
            'address' => 'required',
            'city' => 'required',
            'cap' => 'required|max:5',
            'phone_number' => 'required|max:20',
            'cuisines' => 'required|exists:cuisines,id',
            'user_id' => 'exists:user,id',
        ],[
            'required' => ' The :attribute is required !!',
            'unique' => ' The :attribute is already taken',
            'max' => 'Max :max characters allowed '
        ]);

        $data = $request->all();
        $restaurant = Restaurant::find($id);

        if(array_key_exists('cuisines', $data)){
            $restaurant->cuisines()->sync($data['cuisines']);
        } else {
            $restaurant->cuisines()->detach();
        }

        $restaurant->update($data);
        return redirect()->route('admin.restaurants.show', $restaurant->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $restaurant = Restaurant::find($id);
        $restaurant->delete();
        return redirect()->route('admin.restaurants.index')->with('deleted', $restaurant->name);
    }
}
