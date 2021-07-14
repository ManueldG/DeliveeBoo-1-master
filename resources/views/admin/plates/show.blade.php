@extends('layouts.app')

@section('content')
<main class="container">
    <h1>{{ $plates->name}}</h1>

     <div class="row mt-5">
            <div class="col-md-6">
                <img class="img-fluid rounded" src="{{$plates->image}}" alt="{{$plates->name}}">
            </div>
            <div class="col-md-6">
                {{ $plates->description }}
            </div>    
      </div>

      <ul class="list-group mt-5">
          <li class="list-group-item">
                <strong>Price: </strong> €{{$plates->price}}
          
          <br>
                <strong>Avaiable: </strong> @if ($plates->visibility === 0)
                    No

                    @elseif ($plates->visibility === 1)
                    Yes
                        
                    @endif 
          </li>
      </ul>
                    
</main>
@endsection