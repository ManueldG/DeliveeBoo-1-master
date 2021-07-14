@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="mb-5">CREATE NEW PLATE</h1>

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
                <form action="{{ route('admin.plates.store') }}" method="POST">
                    @csrf
                    @method('POST')

                      
                     <input type="hidden" name="restaurant_id" value="{{ $id }}"> 
                    <div class="mb-3">
                        <label for="name" class="form-label">Name*</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                         <label for="description" class="form-label">Description</label>
                         <textarea name="description" id="description" rows="6" class="form-control  @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    </div>

                    {{-- <div class="mb-3">
                        <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="visibility" value="1">
                        <label class="custom-control-label" for="visibility">Toggle this switch element</label>
                    </div> --}}

                    <div class="form-group">
                        <label for="visibility">Visibility</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input @error('visibility') is-invalid @enderror" name="visibility" id="visibility0" value="0" {{ old('visibility') == 0 ? 'checked' : '' }}>
                            <label for="visibility0" class="form-check-label">No</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input @error('visibility') is-invalid @enderror" name="visibility" id="visibility1" value="1" {{ old('visibility') == 1 ? 'checked' : '' }}>
                            <label for="visibility1" class="form-check-label">Sì</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price*</label>
                        <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- PLATE IMAGE --}}
                    <div class="mb-3">
                        <div>
                            <label for="image" class="form-label">Plate Image</label>
                        </div>
                        <input type="text" class="form-control" name="image" id="image">
                        @error('image')
                        <div>{{$message}}</div>
                        @enderror
                    </div>

                    <button class="btn btn-primary" type="submit">Create Plate</button>
                </form>
            </div>
        </div>
    </div>

@endsection