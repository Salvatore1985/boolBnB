@extends('layouts.editPage')
@section('form-content')
    <div class="background-image-form height-main-form p-3 h-100">
        <section class="container ">
            <div class="col-12 d-flex flex-wrap mb-4">
                @foreach ($apartment->images as $image)
                    <div class="col-4 p-1 position-relative">
                        <div class="delete position-absolute">
                            <form action="{{ route('user.image.destroy', $image) }}" method="POST" class="image-destroyer"
                                onclick="return confirm('Sei sicuro di voler eliminare la seguente foto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-1 delete">
                                    &#10006;
                                </button>
                            </form>
                        </div>
                        @if (str_starts_with($image->link, 'https://') || str_starts_with($image->link, 'http://'))
                            <img class="rounded-1 w-100" src="{{ $image->link }}" alt="{{ $apartment->title }}">
                        @else
                            <img class="rounded-1 w-100" src="{{ asset('/storage') . '/' . $image->link }}"
                                alt="{{ $apartment->title }}">
                        @endif
                    </div>
                @endforeach
            </div>
            <form class="text-center bg-light rounded p-5 height-main-form "
                action="{{ route('user.apartments.update', $apartment->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    {{-- Apartment title --}}
                    <div class="form-group col-md-3">
                        <label for="title" class="form-label">
                            Titolo dell' appartamento *
                        </label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" placeholder="* campo richiesto" value="{{ old('title', $apartment->title) }}"
                            required autocomplete="on" autofocus minlength="3">

                        @error('title')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- Apartment images --}}
                    <div class="col-12">
                        <label for="image[]">
                            inserisci altre foto del tuo appartamento
                        </label>
                        <input type="file" class="form-control" name="images[]" id="image[]" multiple>

                        @error('images')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- Apartment Address --}}
                    <div class="form-group col-md-6">
                        <label for="address">
                            Inserisci l'indirizzo *
                        </label>
                        <input class="w-100" type="text" name="address" id="address"
                            value="{{ old('address', $apartment->address) }}" required autocomplete="on" autofocus
                            minlength="5">

                        @error('address')
                            <div class="alert alert-danger mt-2">
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
                            id="n_rooms" placeholder="* campo richiesto"
                            value="{{ old('n_rooms', $apartment->n_rooms) }}" placeholder="* campo richiesto" required
                            autocomplete="on" autofocus min="1">

                        @error('n_rooms')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Apartment sqr_meters --}}
                    <div class="form-group col-md-6">
                        <label for="sqr_meters" class="form-label">
                            Metri dell'appartamento *
                        </label>
                        <input type="number" class="form-control @error('sqr_meters') is-invalid @enderror" id="sqr_meters"
                            name="sqr_meters" placeholder="* campo richiesto"
                            value="{{ old('sqr_meters', $apartment->sqr_meters) }}" required autocomplete="on" autofocus
                            min="1">

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
                            id="n_beds" placeholder="* campo richiesto"
                            value="{{ old('n_beds', $apartment->n_beds) }}" required autocomplete="on" autofocus
                            min="1">

                        @error('n_beds')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                {{-- Apartment description --}}
                <div class="form-group ">
                    <label for="description" class="form-label">
                        Descrizione dell'appartamento *
                    </label>
                    <textarea rows="1.5" class="form-control  @error('description') is-invalid @enderror" name="description"
                        id="description" placeholder="* campo richiesto" value="{{ old('description', $apartment->description) }}"
                        required autocomplete="on" autofocus minlength="10">{{ old('description', $apartment->description) }}</textarea>
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
                            value="{{ old('n_bathrooms', $apartment->n_bathrooms) }}" required autocomplete="on"
                            autofocus min="1">

                        @error('n_bathrooms')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- Apartment services --}}
                    <div class="form-group col-md-3">
                        <div class="col-sm-2">
                            Servizi *
                        </div>
                        <div class="col-sm-10 text-left h-50 overflow-auto">
                            @foreach ($services as $service)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('service') is-invalid @enderror" type="checkbox"
                                        id="service-{{ $service->id }}" value="{{ $service->id }}"
                                        name="services[]" @if (in_array($service->id, old('services', $service_id))) checked @endif>
                                    <label class="form-check-label" for="service-{{ $service->id }}">
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
                    {{-- Apartment is_visible --}}
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
                            id="price" placeholder="* campo richiesto"
                            value="{{ old('price', $apartment->price) }}" required autocomplete="on" autofocus
                            min="1">
                        @error('price')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        {{-- Submit button --}}
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary col-md-12">Pubblica il tuo
                                appartamento</button>
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
