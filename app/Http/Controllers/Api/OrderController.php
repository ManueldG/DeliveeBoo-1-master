<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'customer_name' => 'required|max:20',
            'customer_lastname' => 'required|max:20',
            'customer_address' => 'required',
            'phone_number' => 'required|size:10',
        ]);
        // Validation Errors
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }
        $data = $request->all();

        // // Save on DB
        $new_order = new Order();
        $new_order->fill($data);
        $new_order->save();

        return response()->json($data);
    }
}
