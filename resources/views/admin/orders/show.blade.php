@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Order of <span class="text-primary">{{$order->customer_name}} {{$order->customer_lastname}}</span></h1>
        <h3>Phone number: {{$order->phone_number}}</h3>
        <h3>Address: {{$order->customer_address}}</h3>
        <h3>Tot amount: {{$order->tot_paid}}€</h3>
        <h3>Date: <span class="text-primary">{{$order->created_at}}</span></h3>
        <a class="btn btn-primary" href="{{route('admin.orders.index')}}">Back to Menu</a>
    </div>
@endsection