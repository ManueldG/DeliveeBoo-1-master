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

        <div class="row mt-3">
            <div class="col-md-6">
                <img class="img-fluid rounded" src="{{$restaurant->image}}" alt="{{$restaurant->name}}">
            </div>
            <div class="col-md-6">
                {{ $restaurant->description }}
            </div>    
        </div>

        <div class="mt-5">
            <a class="btn btn-primary mb-5" href="{{ route('admin.plates.create', ['id'=>$restaurant->id])}}">Create your plate</a>
            <h3>I nostri piatti</h3>
            <ul class="mb-5 list-group">
                {{-- {{dd($plate)}} --}}
                @foreach ($plates as $plate)
                <li class="list-group-item">
                   <strong>Name plate: </strong> 
                   <a href="{{ route('admin.plates.show', $plate->id)}}">
                       {{$plate->name}}
                    </a>
                </li>
                @endforeach
            </ul>
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