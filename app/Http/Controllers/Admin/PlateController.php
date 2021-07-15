<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Plate;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $id = $_GET['id'];
        $restaurants = Restaurant::all();
        $plates = Plate::all();

        return view('admin.plates.create', compact('plates','restaurants', 'id'));
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
            'name' => 'required',
            'restaurant_id' => 'required',
            'description' => 'required',
            'visibility' => 'nullable',
            'price' => 'required',
            'image' => 'nullable',
        ],[
            'required' => ' The :attribute is required.!!!!!!!',
            'unique' => ' The :attribute is already taken',
            'max' => 'Max :max characters allowed '
        ]);

        $data = $request->all();

        $new_plate = new Plate();
        
        $new_plate->fill($data);
        
        $new_plate->restaurant_id = $data['restaurant_id'];

        $new_plate->save();

        return redirect()->route('admin.restaurants.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plates = Plate::find($id);
        $restaurants = Restaurant::all()->where('id', $plates->restaurant_id);

        if(!$plates) {
            abort(404);
        }
        return view('admin.plates.show', compact('restaurants', 'plates'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plate = Plate::find($id);

        if(!$plate){
            abort(404);
        }

        return view('admin.plates.edit', compact('plate'));
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
        ],[
            'required' => ' The :attribute is required !!',
            'unique' => ' The :attribute is already taken',
            'max' => 'Max :max characters allowed '
        ]);

        $data = $request->all();
        $plate = Plate::find($id);

        $plate->update($data);
        return redirect()->route('admin.plates.show', $plate->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plate = Plate::find($id);
        $plate->delete();
        return redirect()->route('admin.restaurants.index')->with('deleted', $plate->name);
    }
}
