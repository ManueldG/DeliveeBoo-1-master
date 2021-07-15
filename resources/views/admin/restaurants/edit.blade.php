@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="mb-5">EDIT RESTAURANT</h1>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                @if ($errors->any())
                    <div class="alert alert-danger mb-5">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.restaurants.update', $restaurant->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="name" class="form-label">Name*</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $restaurant->name) }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                         <label for="description" class="form-label">Description</label>
                         <textarea name="description" id="description" rows="6" class="form-control  @error('description') is-invalid @enderror">{{ old('description', $restaurant->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address*</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $restaurant->address) }}">
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">City*</label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city', $restaurant->city) }}">
                        @error('city')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="cap" class="form-label">CAP*</label>
                        <input type="text" class="form-control @error('cap') is-invalid @enderror" id="cap" name="cap" value="{{ old('cap', $restaurant->cap) }}">
                        @error('cap')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number*</label>
                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number', $restaurant->phone_number) }}">
                        @error('phone_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- CUISINES --}}
                    <h5 class="mb-3">Cuisines*</h5>

                    <div class="mb-3 @error('cuisines') border border-danger @enderror">
                        @foreach ($cuisines as $cuisine)
                            <span class="d-inline-block mr-3">
                                <input type="checkbox" name="cuisines[]" id="cuisine{{ $loop->iteration }}"
                                value="{{$cuisine->id}}"
                                @if($errors->any() && in_array($cuisine->id, old('cuisines', []))) 
                                    checked
                                @elseif(!$errors->any() && $restaurant->cuisines->contains($cuisine->id))
                                    checked
                                @endif>
                                <label for="cuisine{{ $loop->iteration }}">
                                {{$cuisine->type}}</label>
                            </span>
                        @endforeach
                        @error('cuisines')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    {{-- RESTAURANT IMAGE --}}
                    <div class="mb-3">
                        <div>
                            <label for="image" class="form-label">Restaurant Image</label>
                        </div>
                        <input type="text" class="form-control" name="image" id="image" value="{{ old('price', $restaurant->image)}}">
                        @error('image')
                        <div>{{$message}}</div>
                        @enderror
                    </div>

                    <button class="btn btn-primary" type="submit">Edit restaurant</button>
                </form>
            </div>
        </div>
    </div>

@endsection
