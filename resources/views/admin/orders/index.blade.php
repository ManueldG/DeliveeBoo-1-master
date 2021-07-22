@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('deleted'))
        <div class="alert alert-success">
            Order of
            <strong>{{ session('deleted') }}</strong>
            successfully deleted
        </div>
        @endif
        <h1>Order History</h1>
        <a class="btn btn-primary text-uppercase" href="{{route('admin.restaurants.show', $restaurant->id)}}">Back to Restaurant Info</a>
        <a class="btn btn-success text-uppercase" href="{{route('admin.charts.show', $restaurant->id)}}">Show orders chart</a>
        <table class="table mt-5">
            <thead>
                <tr>
                    <th>Order Date</th>
                    <th>Customer Name</th>
                    <th>Amount Paid</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->customer_name}} {{$order->customer_lastname}}</td>
                        <td>€{{number_format($order->tot_paid, 2)}}</td>   
                        <td>
                            <a class="btn btn-primary " href="{{route('admin.orders.show', $order->id)}}">Show Details</a>
                        </td> 
                        <td>
                            <form class="delete-form" action="{{route('admin.orders.destroy', $order->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="DELETE ORDER">
                            </form>
                        </td> 
                    </tr>
                @endforeach
            </tbody>
        </table>            
    </div>
    
@endsection