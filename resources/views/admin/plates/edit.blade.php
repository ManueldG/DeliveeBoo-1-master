@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="mb-5">EDIT PLATE</h1>

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
                <form action="{{ route('admin.plates.update', $plate->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="name" class="form-label">Name*</label>
                        <input required type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $plate->name) }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                         <label for="description" class="form-label">Description</label>
                         <textarea name="description" id="description" rows="6" class="form-control  @error('description') is-invalid @enderror"> {{ old('description', $plate->description) }} </textarea>
                    </div>

                    <div class="form-group">
                        <div class="form-check form-switch">
                            <input type="checkbox" class="form-check-input @error('visibility') is-invalid @enderror" name="visibility" id="visibility1" value="1" {{ old('visibility', $plate->visibility) == 1 ? 'checked' : '' }}>
                            <label for="visibility1" class="form-check-label">Avaiable</label>
                        </div>
                    </div>

                    <div class="mb-3 w-25">
                        <label for="price" class="form-label">Price*</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">€</div>
                            </div>
                            <input required type="number" placeholder="0.00" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $plate->price) }}">
                            @error('price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- RESTAURANT IMAGE --}}
                    <div class="mb-3">
                        <div>
                            <label for="image" class="form-label">Plate Image</label>
                        </div>
                        <input type="text" class="form-control" name="image" id="image" value="{{ old('price', $plate->image) }}">
                        @error('image')
                        <div>{{$message}}</div>
                        @enderror
                    </div>

                    <button class="btn btn-primary" type="submit">Edit plate</button>
                </form>
            </div>
        </div>
    </div>

@endsection
