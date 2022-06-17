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
        {{-- <div class="col-12 mb-3">
            <label for="address" class="form-label">Inserisci la via</label>
            <input
                type="text"
                class="form-control @error('address') is-invalid @enderror"
                name="address"
                id="address"
                placeholder="* campo richiesto"
                value="{{ old('address') }}"
            />

            <button id="address-search">
                Cerca il tuo indirizzo
            </button>
            @error('address')
                <div class="text-start invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div> --}}
        {{-- testing --}}
        <div class="col-12">
            <label for="address">inserisci la via:</label>
            <input class="w-100" type="text" name="address" id="address" value="{{ old('address') ?? ''}}" required>
            @error('address')
                <div class="alert alert-danger mt-2">
                    Il nome della via
                    {{ $message }}
                </div>
            @enderror
                <ul class="list-group d-none" id="results">
                    <li class="list-group-item active" id="1-result"></li>
                    <li class="list-group-item active" id="2-result"></li>
                    <li class="list-group-item active" id="3-result"></li>
                    <li class="list-group-item active" id="4-result"></li>
                    <li class="list-group-item active" id="5-result"></li>
                </ul>
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
@section('script-content')
<script defer>
    let address = document.getElementById('address');
    address.addEventListener('keyup', logKey);
    function logKey() {
            let newAdress = address.value.replace(/ /g, "%20");
            let search ='https://api.tomtom.com/search/2/search/' + newAdress + '.json?countrySet=IT&lat=37.337&lon=-121.89&extendedPostalCodesFor=Str&minFuzzyLevel=1&maxFuzzyLevel=2&view=Unified&relatedPois=off&key=SsllzLi6J5XLezFkwzq7gpR0xOCwBOzL&countrySet=Italia';
            let request = new XMLHttpRequest(); // Create a request variable and assign a new XMLHttpRequest object to it.
            request.open('GET', search); // Open a new connection, using the GET request on the URL endpoint
            request.send();

            let tips;
            request.onload = async function () {
                const data = JSON.parse(this.response);
                for (let index = 0; index < 5; index++) {
                    let id=index+1+"-result";
                    let li=document.getElementById(id);
                    if(data["results"][index]["address"]["freeformAddress"] != undefined && data["results"][index]["address"]["countryCode"] != undefined ){
                        li.innerHTML = data["results"][index]["address"]["freeformAddress"] + " " +data["results"][index]["address"]["countryCode"];
                    }
                    document.getElementById("results").classList.remove("d-none");
                    // document.getElementById("results").classList.add("d-none");
                }
            }
        }
</script>
@endsection
