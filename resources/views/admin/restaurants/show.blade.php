@extends('layouts.app')

@section('content')

    <main class="container">

        <header>
            <a href="{{ route('admin.restaurants.index') }}">Torna a Indice Ristoranti</a>
            <h2 class="my-5">{{ $restaurant->name }}</h2>
            @if (count($restaurant->cuisines) > 0)
            <h4>Tipologie cucine</h4>
            @foreach ($restaurant->cuisines as $cuisine)
                <span class="badge badge-primary">{{$cuisine->type}}</span>
            @endforeach
        @endif 
        </header>

        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid" src="{{$restaurant->image}}" alt="{{$restaurant->name}}">
            </div>
            <div class="col-md-6">
                {{ $restaurant->description }}
            </div>    
        </div>

        <div class="mt-5">

            <h3>Contatti</h3>
            <ul class="list-group">
                <li class="list-group-item"><strong>Via:</strong> {{ $restaurant->address }}</li>
                <li class="list-group-item"><strong>Città:</strong> {{ $restaurant->city }}</li>
                <li class="list-group-item"><strong>CAP:</strong> {{ $restaurant->cap }}</li>
                <li class="list-group-item"><strong>Numero di Telefono:</strong> {{ $restaurant->phone_number }}</li>
            </ul>

        </div>
    </main>

@endsection