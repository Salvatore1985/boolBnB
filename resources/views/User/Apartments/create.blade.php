@extends('layouts.createPage')

@section('form-content')
    <form class="text-center" action="{{ route('user.apartments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-12 mb-3">
            <label for="title" class="form-label">Inserisci il titolo dell' appartamento<sup>*</sup></label>
            <input
                type="text"
                class="form-control @error('title') is-invalid @enderror"
                id="title"
                name="title"
                value="{{ old('title') }}"
            />
            @error('title')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-12 mb-3">
            <label for="address" class="form-label">Inserisci la via<sup>*</sup></label>
            <input
                type="text"
                class="form-control @error('address') is-invalid @enderror"
                name="address"
                id="address"
                value="{{ old('address') }}"
            />
            @error('address')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-12 mb-3">
            <label for="n_rooms" class="form-label">Inserisci il numero delle stanze<sup>*</sup></label>
            <input
                type="text"
                class="form-control @error('n_rooms') is-invalid @enderror"
                name="n_rooms"
                id="n_rooms"
                value="{{ old('n_rooms') }}"
            />
            @error('n_rooms')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-12 mb-3">
            <label for="description" class="form-label">Inserisci la descrizione dell'appartamento<sup>*</sup></label>
            <textarea
                rows="8"
                class="form-control  @error('description') is-invalid @enderror"
                name="description"
                id="description"
                value="{{ old('description') }}">
                    {{-- da sistemare --}}
                    {{-- {{{ old('description') }}} --}}
            </textarea>
            @error('description')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-12 mb-3">
            <label for="sqr_meters" class="form-label">Inserisci i metri dell'appartamento<sup>*</sup></label>
            <input
                type="text"
                class="form-control @error('sqr_meters') is-invalid @enderror"
                id="sqr_meters"
                name="sqr_meters"
                value="{{ old('sqr_meters') }}"
            />
            @error('sqr_meters')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        
        <div class="col-12 mb-3">
            <label for="n_beds" class="form-label">Inserisci numero dei letti<sup>*</sup></label>
            <input
                type="text"
                class="form-control @error('n_beds') is-invalid @enderror"
                name="n_beds"
                id="n_beds"
                value="{{ old('n_beds') }}"
            />
            @error('n_beds')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-12 mb-3">
            <label for="n_bathrooms" class="form-label">Inserisci il numero dei bagni<sup>*</sup></label>
            <input
                type="text"
                class="form-control @error('n_bathrooms') is-invalid @enderror"
                id="n_bathrooms"
                name="n_bathrooms"
                value="{{ old('n_bathrooms') }}"
            />
            @error('n_bathrooms')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-12 mb-3">
            <label for="n_floor" class="form-label">Inserisci il numero dei piani<sup>*</sup></label>
            <input
                type="text"
                class="form-control @error('n_floor') is-invalid @enderror"
                name="n_floor"
                id="n_floor"
                value="{{ old('n_floor') }}"
            />
            @error('n_floor')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-12 mb-3">
            <label for="price" class="form-label">Inserisci il prezzo<sup>*</sup></label>
            <input
                type="text"
                class="form-control @error('price') is-invalid @enderror"
                name="price"
                id="price"
                value="{{ old('price') }}"
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
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="service[]"
                            value="{{ $service->id }}">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{ $service->name }}
                        </label>
                    </div>
                @endforeach
            </div>
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
