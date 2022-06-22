@extends('layouts.createPage')

@section('form-content')
    <div class="background-image-form height-main-form p-3 h-100">
        <section class="container ">
            <form class="text-center bg-light rounded p-5" action="{{ route('user.apartments.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                {{-- Apartment Title --}}
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="title" class="form-label">
                            Titolo dell' appartamento *
                        </label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" placeholder="* campo richiesto" value="{{ old('title') }}" required
                            autocomplete="on" autofocus minlength="3">

                        @error('title')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- Apartment address --}}
                    <div class="form-group col-md-6">
                        <label for="address">
                            Inserisci l'indirizzo dell'appartamento *
                        </label>
                        <input class="form-control @error('address') is-invalid @enderror" type="text" name="address"
                            id="address" value="{{ old('address') ?? '' }}" placeholder="* campo richiesto" required
                            autocomplete="on" autofocus minlength="5">

                        @error('address')
                            <div class="text-start invalid-feedback">
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
                </div>
                {{-- Apartment n_rooms --}}
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="n_rooms" class="form-label ">
                            Numero delle stanze *
                        </label>
                        <input type="number" class="form-control @error('n_rooms') is-invalid @enderror" name="n_rooms"
                            id="n_rooms" placeholder="* campo richiesto" value="{{ old('n_rooms') }}"
                            placeholder="* campo richiesto" required autocomplete="on" autofocus min="1">

                        @error('n_rooms')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- Apartment srq_meters --}}
                    <div class="form-group col-md-6">
                        <label for="sqr_meters" class="form-label">
                            Metri dell'appartamento *
                        </label>
                        <input type="number" class="form-control @error('sqr_meters') is-invalid @enderror" id="sqr_meters"
                            name="sqr_meters" placeholder="* campo richiesto" value="{{ old('sqr_meters') }}" required
                            autocomplete="on" autofocus min="1">

                        @error('sqr_meters')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- Apartment n_beds --}}
                    <div class="form-group col-md-3">
                        <label for="n_beds" class="form-label">
                            Numero dei letti *
                        </label>
                        <input type="number" class="form-control @error('n_beds') is-invalid @enderror" name="n_beds"
                            id="n_beds" placeholder="* campo richiesto" value="{{ old('n_beds') }}" required
                            autocomplete="on" autofocus min="1">
                        @error('n_beds')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                {{-- Apartment Images --}}
                <div class="col-12">
                    <label for="image[]">
                        Inserisci le foto del tuo appartamento *
                    </label>
                    <input type="file" class="form-control @error('images') is-invalid @enderror" name="images[]"
                        id="image[]" placeholder="* campo richiesto" multiple required autocomplete="on" autofocus
                        type="file">
                    @error('images')
                        <div class="text-start invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- Apartment Description --}}
                <div class="form-group ">
                    <label for="description" class="form-label">
                        Descrizione dell'appartamento *
                    </label>
                    <textarea rows="3" class="form-control  @error('description') is-invalid @enderror" name="description"
                        placeholder="* campo richiesto" id="description" value="{{ old('description') }}" required autocomplete="on"
                        autofocus minlength="10">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-start invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- Apartment n_bathrooms --}}
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="n_bathrooms" class="form-label">
                            Il numero dei bagni *
                        </label>
                        <input type="number" class="form-control @error('n_bathrooms') is-invalid @enderror"
                            id="n_bathrooms" name="n_bathrooms" placeholder="* campo richiesto"
                            value="{{ old('n_bathrooms') }}" required autocomplete="on" autofocus min="1">

                        @error('n_bathrooms')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- Apartment Services --}}
                    <div class="form-group col-md-3">
                        <div class="col-sm-2">
                            Servizi *
                        </div>
                        <div class="col-sm-10 text-left h-50 overflow-auto">
                            @foreach ($services as $service)
                                <div class="form-check">
                                    <input class="form-check-input  @error('service') is-invalid @enderror"
                                        type="checkbox" id="gridCheck1" name="service[]" value="{{ $service->id }}">
                                    <label class="form-check-label" for="gridCheck1" required autocomplete="on">
                                        {{ $service->name }}
                                    </label>
                                </div>
                            @endforeach
                            @error('service')
                                <div class="text-start invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- Apartment visibility --}}
                    <fieldset class="form-group col-md-3">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="is_visible" id="is_visible"
                                        value="1" checked>
                                    <label class="form-check-label" for="is_visible">
                                        App. disponibile
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_visible" id="is_visible"
                                        value="0">
                                    <label class="form-check-label" for="gridRadios2">
                                        App. non disponibile
                                    </label>
                                </div>

                            </div>
                        </div>
                    </fieldset>
                    {{-- Apartment price --}}
                    <div class="form-group col-md-3">
                        <label for="price" class="form-label">
                            Inserisci il prezzo *
                        </label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                            id="price" placeholder="* campo richiesto" value="{{ old('price') }}" required
                            autocomplete="on" autofocus min="1">

                        @error('price')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- Submit button --}}
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary col-md-12">Pubblica il tuo appartamento</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
@section('js-files')
    <script defer>
        let address = document.getElementById('address');
        address.addEventListener('keyup', logKey);

        function logKey() {
            let newAdress = address.value.replace(/ /g, "%20");
            let search = 'https://api.tomtom.com/search/2/search/' + newAdress +
                '.json?countrySet=IT&lat=37.337&lon=-121.89&extendedPostalCodesFor=Str&minFuzzyLevel=1&maxFuzzyLevel=2&view=Unified&relatedPois=off&key=SsllzLi6J5XLezFkwzq7gpR0xOCwBOzL&countrySet=Italia';
            let request = new XMLHttpRequest(); // Create a request variable and assign a new XMLHttpRequest object to it.
            request.open('GET', search); // Open a new connection, using the GET request on the URL endpoint
            request.send();
            if (address.value == "") {
                document.getElementById("results").classList.add("d-none");
            }

            let tips;
            request.onload = async function() {
                const data = JSON.parse(this.response);
                for (let index = 0; index < 5; index++) {
                    let id = index + 1 + "-result";
                    let li = document.getElementById(id);
                    if (data["results"][index]["address"]["freeformAddress"] != undefined && data["results"][index][
                            "address"
                        ]["countryCode"] != undefined) {
                        li.innerHTML = data["results"][index]["address"]["freeformAddress"] + " " + data["results"][
                            index
                        ]["address"]["countryCode"];
                    }
                    li.addEventListener('click', function() {
                        address.value = this.innerHTML;
                        document.getElementById("results").classList.add("d-none");
                    });
                    document.getElementById("results").classList.remove("d-none");
                }
            }
        }
    </script>
@endsection
