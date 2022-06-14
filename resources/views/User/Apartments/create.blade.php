@extends('layouts.createPage')

@section('form-content')
@dump(Auth::id())
<form class="text-center"
    action= "{{ route('user.apartments.store') }}"
    method="POST"
    enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Inserisci il titolo dell' appartamento</label>
        <input type="text" class="form-control" id="title" name="title" id="title">
        @error('content')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="street">Inserisci la via</label>
        <input type="text" name="street" id="street">
        @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="house_number">Inserisci il numero civico</label>
        <input type="text" name="house_number" id="house_number">
        @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="city">Inserisci la città</label>
        <input type="text" name="city" id="city">
        @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="n_rooms">Inserisci il numero delle stanze</label>
        <input type="text" name="n_rooms" id="n_rooms">
        @error('image_url')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">

        <label for="description" class="form-label">Inserisci la descrizione
            dell'appartamento</label>
        <textarea class="form-control" id="description" name="description" id="description"></textarea>
        @error('content')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="sqr_meters" class="form-label">Inserisci i metri dell'appartamento</label>
        <input type="text" class="form-control" id="sqr_meters" name="sqr_meters" id="sqr_meters">
        @error('content')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="n_beds" class="form-label">Inserisci numero dei letti</label>
        <input type="text" class="form-control" id="n_beds" name="n_beds" id="n_beds">
        @error('content')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="n_bathrooms" class="form-label">Inserisci il numero dei bagni</label>
        <input type="text" class="form-control" id="n_bathrooms" name="n_bathrooms" id="n_bathrooms">
        @error('content')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="n_floor" class="form-label">Inserisci il numero dei piani</label>
        <input type="text" class="form-control" id="n_floor" name="n_floor" id="n_floor">
        @error('content')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Inserisci il prezzo</label>
        <input type="text" class="form-control" id="price" name="price" id="price">
        @error('content')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Pubblica il tuo appartamento</button>
</form>

@endsection
{{-- @extends('layouts.creatPage') --}}
{{-- @section('route', "{{ route('user.apartments.store') }}") --}}
{{-- @section('form-content')















    <button type="submit" class="btn btn-primary">Pubblica il tuo appartamento</button>



@endsection --}}
