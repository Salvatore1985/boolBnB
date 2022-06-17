@extends('layouts.editPage')
@section('form-content')

<section class="container p-5">

    <form action="{{ route('user.apartments.update', $apartment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12 mb-3">
                <label for="title" class="form-label">Inserisci un titolo<sup>*</sup></label>
                <input
                    type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    name="title"
                    id="title"
                    value="{{$apartment->title}}"
                />
                @error('title')
                    <div class="text-start invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

        <div class="col-12 mb-3">
            <label for="address" class="form-label">Inserisci l'indirizzo<sup>*</sup></label>
            <input
                type="text"
                class="form-control @error('address') is-invalid @enderror"
                name="address"
                id="address"
                value="{{$apartment->address}}"
            />
            @error('address')
                    <div class="text-start invalid-feedback">
                        {{ $message }}
                    </div>
            @enderror
        </div>

        <div class="col-12 mb-3">
            <label for="description" class="form-label">Inserisci una descrizione<sup>*</sup></label>
            <textarea
                type="text"
                rows="8"
                class="form-control @error('description') is-invalid @enderror"
                name="description"
                id="description" value="{{$apartment->description}}">
                    {{$apartment->description}}
            </textarea>
            @error('description')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-12 mb-3">
            <label for="sqr_meters" class="form-label">Inserisci i metri quadri<sup>*</sup></label>
            <input
                type="text"
                class="form-control @error('sqr_meters') is-invalid @enderror"
                name="sqr_meters"
                id="sqr_meters"
                value="{{$apartment->sqr_meters}}"
            />
            @error('sqr_meters')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-12 mb-3">
            <label for="n_beds" class="form-label">Inserisci il numero di letti<sup>*</sup></label>
            <input
                type="text"
                class="form-control @error('n_beds') is-invalid @enderror"
                name="n_beds"
                id="n_beds"
                value="{{$apartment->n_beds}}"
            />
            @error('n_beds')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-12 mb-3">
            <label for="n_rooms" class="form-label">Inserisci il numero di stanze<sup>*</sup></label>
            <input
                type="text"
                class="form-control @error('n_rooms') is-invalid @enderror"
                name="n_rooms"
                id="n_rooms"
                value="{{$apartment->n_rooms}}"
            />
            @error('n_rooms')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-12 mb-3">
            <label for="n_bathrooms" class="form-label">Inserisci il numero di bagni<sup>*</sup></label>
            <input
                type="text"
                class="form-control @error('n_bathrooms') is-invalid @enderror"
                name="n_bathrooms"
                id="n_bathrooms"
                value="{{$apartment->n_bathrooms}}"
            />
            @error('n_bathrooms')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-12 mb-3">
            <label for="n_floor" class="form-label">Inserisci il numero di piani<sup>*</sup></label>
            <input
                type="text"
                class="form-control @error('n_floor') is-invalid @enderror"
                id="n_floor"
                name="n_floor"
                id="n_floor"
                value="{{$apartment->n_floor}}"
            />
            @error('n_floor')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-12 mb-3">
            <label for="price" class="form-label">Inserisci prezzo<sup>*</sup></label>
            <input
                type="text"
                class="form-control @error('price') is-invalid @enderror"
                name="price"
                id="price"
                value="{{$apartment->price}}"
            />
            @error('price')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-12 mb-3">
            <label for="service">Servizi</label>
            <div>
                @foreach ($services as $service)
                    <input type="checkbox"
                        class="form-check"
                        id="service"
                        name="service[]"
                        value="{{$service->id}}"
                        title="Seleziona il service"
                        @if ($apartment->services->contains($service))
                            checked
                        @endif
                    />
                    <label for="services">
                        {{$service->name}}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="form-check form-switch mr-4 mb-5">
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
</section>

@endsection
