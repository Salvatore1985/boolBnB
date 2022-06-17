@extends('layouts.createPage')

@section('form-content')
    <form class="text-center" action="{{ route('user.apartments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- campo titolo --}}
        <div class="col-12 mb-3">
            <label for="title" class="form-label">Inserisci il titolo dell' appartamento</label>
            <input
                type="text"
                class="form-control @error('title') is-invalid @enderror"
                id="title"
                name="title"
                placeholder="* campo richiesto"
                value="{{ old('title') }}"
            />
            @error('title')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- campo indirizzo --}}
        <div class="col-12 mb-3">
            <label for="address" class="form-label">Inserisci la via</label>
            <input
                type="text"
                class="form-control @error('address') is-invalid @enderror"
                name="address"
                id="address"
                placeholder="* campo richiesto"
                value="{{ old('address') }}"
            />
            @error('address')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- campo stanze --}}
        <div class="col-12 mb-3">
            <label for="n_rooms" class="form-label">Inserisci il numero delle stanze</label>
            <input
                type="text"
                class="form-control @error('n_rooms') is-invalid @enderror"
                name="n_rooms"
                id="n_rooms"
                placeholder="* campo richiesto"
                value="{{ old('n_rooms') }}"
                placeholder="* campo richiesto"
            />
            @error('n_rooms')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- campo descrizione --}}
        <div class="col-12 mb-3">
            <label for="description" class="form-label">Inserisci la descrizione dell'appartamento</label>
            <textarea
            rows="8"
            class="form-control  @error('description') is-invalid @enderror"
            name="description"
            id="description"
            placeholder="* campo richiesto"
            value="{{ old('description') }}">
                {{ old('description') }}
            </textarea>

            @error('description')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- campo metri sqr. --}}
        <div class="col-12 mb-3">
            <label for="sqr_meters" class="form-label">Inserisci i metri dell'appartamento</label>
            <input
                type="text"
                class="form-control @error('sqr_meters') is-invalid @enderror"
                id="sqr_meters"
                name="sqr_meters"
                placeholder="* campo richiesto"
                value="{{ old('sqr_meters') }}"
            />
            @error('sqr_meters')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- campo n_letti --}}
        <div class="col-12 mb-3">
            <label for="n_beds" class="form-label">Inserisci numero dei letti</label>
            <input
                type="text"
                class="form-control @error('n_beds') is-invalid @enderror"
                name="n_beds"
                id="n_beds"
                placeholder="* campo richiesto"
                value="{{ old('n_beds') }}"
            />
            @error('n_beds')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- campo n_bagni --}}
        <div class="col-12 mb-3">
            <label for="n_bathrooms" class="form-label">Inserisci il numero dei bagni</label>
            <input
                type="text"
                class="form-control @error('n_bathrooms') is-invalid @enderror"
                id="n_bathrooms"
                name="n_bathrooms"
                placeholder="* campo richiesto"
                value="{{ old('n_bathrooms') }}"
            />
            @error('n_bathrooms')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- campo n_piani --}}
        <div class="col-12 mb-3">
            <label for="n_floor" class="form-label">Inserisci il numero dei piani</label>
            <input
                type="text"
                class="form-control @error('n_floor') is-invalid @enderror"
                name="n_floor"
                id="n_floor"
                placeholder="* campo richiesto"
                value="{{ old('n_floor') }}"
            />
            @error('n_floor')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- campo prezzo --}}
        <div class="col-12 mb-3">
            <label for="price" class="form-label">Inserisci il prezzo</label>
            <input
                type="text"
                class="form-control @error('price') is-invalid @enderror"
                name="price"
                id="price"
                placeholder="* campo richiesto"
                value="{{ old('price') }}"
            />
            @error('price')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        {{-- campo servizi --}}
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
        {{-- campo visibile --}}
        <div class="form-check form-switch">
            <input class="form-check-input" type="radio" name="is_visible" id="is_visible" value="1" checked>
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
