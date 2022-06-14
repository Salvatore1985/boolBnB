@extends('layouts.editPage')
@section('route', "{{ route('user.apartments.update', $apartment->id) }}")
@section('form-content')
<div class="mb-3">
    <label for="address">Indirizzo</label>
    <input type="text" name="address" id="address" value="{{$apartment->address}}">
    <div id="titleHelp" class="form-text">Inserisci un indirizzo</div>
    @error('address')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="n_rooms">Numero stanze</label>
    <input type="text" name="n_rooms" id="n_rooms" value="{{$apartment->n_rooms}}">
    <div id="titleHelp" class="form-text">Inserisci numero stanze</div>
    @error('n_rooms')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="description">Descrizione</label>
    <input type="text" name="description" id="description" value="{{$apartment->description}}">
    <div id="titleHelp" class="form-text">Inserisci una descrizione</div>
    @error('description')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="sqr_meters">Metri</label>
    <input type="text" name="sqr_meters" id="sqr_meters" value="{{$apartment->sqr_meters}}">
    <div id="titleHelp" class="form-text">Inserisci una descrizione</div>
    @error('sqr_meters')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="n_beds">Metri</label>
    <input type="text" name="n_beds" id="n_beds" value="{{$apartment->n_beds}}">
    <div id="titleHelp" class="form-text">Inserisci numero letti</div>
    @error('n_beds')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="n_bathrooms">Bagni</label>
    <input type="text" name="n_bathrooms" id="n_bathrooms" value="{{$apartment->n_bathrooms}}">
    <div id="titleHelp" class="form-text">Inserisci numero bagni</div>
    @error('n_bathrooms')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="title">Titolo</label>
    <input type="text" name="title" id="title" value="{{$apartment->title}}">
    <div id="titleHelp" class="form-text">Inserisci un titolo</div>
    @error('title')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="price">Titolo</label>
    <input type="text" name="price" id="price" value="{{$apartment->price}}">
    <div id="titleHelp" class="form-text">Inserisci prezzo</div>
    @error('price')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

@endsection
