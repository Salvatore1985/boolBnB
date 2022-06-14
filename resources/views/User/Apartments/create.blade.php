@extends('layouts.creatPage')

@section('route', "{{ route('user.apartments.store') }}")
@section('form-content')

<div class="mb-3">
    <label for="address">Inserisci la via</label>
    <input type="text" name="address" id="address">
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

    <label for="description" class="form-label">Inserisci la descrizione dell'appartamento</label>
    <textarea class="form-control" id="description" name="description" id="description"></textarea>
    @error('content')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="sqr_meters" class="form-label">Inserisci la descrizione dell'appartamento</label>
    <textarea class="form-control" id="sqr_meters" name="sqr_meters" id="sqr_meters"></textarea>
    @error('content')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="n_beds" class="form-label">Inserisci la descrizione dell'appartamento</label>
    <textarea class="form-control" id="n_beds" name="n_beds" id="n_beds"></textarea>
    @error('content')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="n_bathrooms" class="form-label">Inserisci la descrizione dell'appartamento</label>
    <textarea class="form-control" id="n_bathrooms" name="n_bathrooms" id="n_bathrooms"></textarea>
    @error('content')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="n_floor" class="form-label">Inserisci la descrizione dell'appartamento</label>
    <textarea class="form-control" id="n_floor" name="n_floor" id="n_floor"></textarea>
    @error('content')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="title" class="form-label">Inserisci la descrizione dell'appartamento</label>
    <textarea class="form-control" id="title" name="title" id="title"></textarea>
    @error('content')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="price" class="form-label">Inserisci la descrizione dell'appartamento</label>
    <textarea class="form-control" id="price" name="price" id="price"></textarea>
    @error('content')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Pubblica il tuo appartamento</button>


@endsection
