@extends('layouts.createPage')

@section('form-content')
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
        <label for="address"> * Inserisci l'indirizzo *</label>
        <input type="text" name="address" id="address">
        @error('address')
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
        <input type="text" class="form-control" name="n_floor" id="n_floor">
        @error('content')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3 d-flex">
        <label for="service">Servizi</label>
            @foreach ($services as $service)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="flexCheckDefault"
                name="service[]" value="{{$service->id}}">
                <label class="form-check-label" for="flexCheckDefault">
                    {{$service->name}}
                </label>
            </div>
            @endforeach
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

    <div class="form-check form-switch">
        <input class="form-check-input" type="radio" name="is_visible" id="is_visible" value="1">
        <label class="form-check-label" for="is_visible">
            Appartamento disponibile 
        </label>
    </div>
    <div class="form-check form-switch">
        <input class="form-check-input" type="radio" name="is_visible" id="is_visible" value="0">
        <label class="form-check-label" for="is_visible">
            Appartamento non disponibile 
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Pubblica il tuo appartamento</button>
</form>

@endsection

