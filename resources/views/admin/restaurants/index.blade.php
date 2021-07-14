@extends('layouts.app')

@section('content')

    <main class="container">
        @if (session('deleted'))
            <div class="alert alert-success">
                <strong>{{ session('deleted') }}</strong>
                deleted successfully.
            </div>
        @endif
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
                        <td>
                            <a class="btn btn-warning" href="{{route('admin.restaurants.edit', $restaurant->id)}}">EDIT</a>
                        </td>
                        <td>
                            <form class="delete-post-form" action="{{route('admin.restaurants.destroy', $restaurant->id)}}" method="POST">
                                @csrf    
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="DELETE">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-5 row justify-content-md-center">
             <a class="btn btn-primary mr-2" href="{{ route('admin.restaurants.create') }}">Add your restaurant</a>
        </div> 
    </main>

@endsection