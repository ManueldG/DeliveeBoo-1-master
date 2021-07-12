@extends('layouts.app')

@section('content')

    <main class="container">
        
        <table class="table mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($restaurants as $restaurant)
                    <tr>
                        <td>{{$restaurant->id}}</td>
                        <td>{{$restaurant->name}}</td>
                        <td>{{$restaurant->address}}</td>
                        <td>
                            <a class="btn btn-success" href="{{ route('admin.restaurants.show', $restaurant->id)}}">SHOW</a>
                        </td>
                        <td>EDIT</td>
                        <td>DELETE</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </main>

@endsection