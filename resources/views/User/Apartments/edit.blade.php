@extends('layouts.editPage')
@section('form-content')

<form class="text-center" action="{{ route('user.apartments.update', $apartment->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title">Inserisci un titolo</label>
        <input type="text" name="title" id="title" value="{{$apartment->title}}">
        @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="street">Inserisci la via</label>
        <input type="text" name="street" id="street" value="{{$apartment->address}}">
        @error('street')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="house_number">Inserisci il numero civico</label>
        <input type="text" name="house_number" id="house_number" value="{{$apartment->house_number}}">
        @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="city">Inserisci la città</label>
        <input type="text" name="city" id="city" value="{{$apartment->city}}">
        @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="n_rooms">Inserisci numero stanze</label>
        <input type="text" name="n_rooms" id="n_rooms" value="{{$apartment->n_rooms}}">
        @error('n_rooms')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="description">Inserisci una descrizione</label>
        <textarea type="text" name="description" id="description" value="{{$apartment->description}}"></textarea>
        @error('description')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="sqr_meters">Inserisci i metri quadri</label>
        <input type="text" name="sqr_meters" id="sqr_meters" value="{{$apartment->sqr_meters}}">
        @error('sqr_meters')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="n_beds">Inserisci numero letti</label>
        <input type="text" name="n_beds" id="n_beds" value="{{$apartment->n_beds}}">
        @error('n_beds')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="n_bathrooms">Inserisci numero bagni</label>
        <input type="text" name="n_bathrooms" id="n_bathrooms" value="{{$apartment->n_bathrooms}}">
        @error('n_bathrooms')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="n_floor" class="form-label">Inserisci il numero dei piani</label>
        <input type="text" class="form-control" id="n_floor" name="n_floor" id="n_floor" value="{{$apartment->n_floor}}">
        @error('content')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="price">Inserisci prezzo</label>
        <input type="text" name="price" id="price" value="{{$apartment->price}}">
        @error('price')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-check form-switch">
        <input class="form-check-input" type="radio" name="is_visible" id="is_visible" value="1" {{$apartment->is_visible == 1 ? 'checked' : '' }}>
        <label class="form-check-label" for="is_visible">
            Appartamento disponibile 
        </label>
    </div>
    <div class="form-check form-switch">
        <input class="form-check-input" type="radio" name="is_visible" id="is_visible" value="0" {{$apartment->is_visible == 0 ? 'checked' : '' }}>
        <label class="form-check-label" for="is_visible">
            Appartamento non disponibile 
        </label>
    </div>

    <button type="submit" class="btn btn-primary">Modifica l'appartamento</button>
</form>


@endsection
