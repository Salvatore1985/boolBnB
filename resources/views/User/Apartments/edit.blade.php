@extends('layouts.editPage')
@section('form-content')
    <div class="my-bg-color height-main-form p-3 h-100">
        <section class="container shadow my-bg-card-info">
            <div class="row justify-content-center flex-wrap">
                <div class="col-12 p-1 d-flex">
                    @foreach ($apartment->images as $image)
                        <div class="position-relative">
                            @if (str_starts_with($image->link, 'https://') || str_starts_with($image->link, 'http://'))
                        <img class="rounded-1 my-img-wrapper me-3" src="{{ $image->link }}" alt="{{ $apartment->title }}">
                        @else
                        <img class="rounded-1 my-img-wrapper me-3" src="{{ asset('/storage') . '/' . $image->link }}"
                            alt="{{ $apartment->title }}">
                            @endif
                            <div class="delete position-absolute my-delete-position">
                                <form action="{{ route('user.image.destroy', $image) }}" method="POST" class="image-destroyer"
                                onclick="return confirm('Sei sicuro di voler eliminare la seguente foto?')">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="rounded-1 delete">
                                        &#10006;
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <form class="text-center bg-light rounded p-5 height-main-form "
                action="{{ route('user.apartments.update', $apartment->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    {{-- Apartment Title --}}
                <div class="form-row d-flex flex-wrap flex-md-nowrap">
                    {{-- Apartment Title --}}
                    <div class="form-group col-12 col-md-6 me-2">
                        <label
                        for="title"
                        class="form-label my-page-text-color mb-2">
                            Titolo dell' appartamento *
                        </label>
                        <input type="text" class="form-control mb-4 @error('title') is-invalid @enderror" id="title"
                            name="title" placeholder="* campo richiesto" value="{{ old('title', $apartment->title) }}" required
                            autocomplete="on" autofocus minlength="3">

                        @error('title')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- Apartment address --}}
                    <div class="form-group col-12 col-md-6">
                        <label
                        for="address"
                        class="form-label my-page-text-color mb-2">
                            Inserisci l'indirizzo dell'appartamento *
                        </label>
                        <input class="form-control mb-4 @error('address') is-invalid @enderror" type="text" name="address"
                            id="address" value="{{ old('address', $apartment->address) }}" placeholder="* campo richiesto" required
                            autocomplete="on" autofocus minlength="5">

                        @error('address')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <ul class="list-group d-none" id="results">
                            @for ($i = 1; $i < 6; $i++ )
                                <li class="list-group-item element-list" id="{{$i}}-result"></li>
                            @endfor
                        </ul>
                    </div>
                </div>
                <div class="form-row d-flex mb-4 justify-content-evenly">
                    {{-- Apartment n_rooms --}}
                    <div class="form-group col-2 me-4">
                        <label for="n_rooms" class="form-label my-page-text-color mb-2">
                            Num. stanze*
                        </label>
                        <input type="number" class="form-control @error('n_rooms') is-invalid @enderror" name="n_rooms"
                            id="n_rooms" value="{{ old('n_rooms', $apartment->n_rooms) }}"
                            placeholder="*n" required autocomplete="on" autofocus min="1">

                        @error('n_rooms')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- Apartment n_beds --}}
                    <div class="form-group col-2 me-4">
                        <label for="n_beds" class="form-label my-page-text-color mb-2">
                            Numero letti*
                        </label>
                        <input type="number" class="form-control @error('n_beds') is-invalid @enderror" name="n_beds"
                            id="n_beds" placeholder="*n" value="{{ old('n_beds', $apartment->n_beds) }}" required
                            autocomplete="on" autofocus min="1">
                        @error('n_beds')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- end of n_beds --}}
                    {{-- Apartment n_bathrooms --}}
                    <div class="form-group col-2 me-4">
                        <label for="n_bathrooms" class="form-label my-page-text-color mb-2">
                            Numero Bagni*
                        </label>
                        <input type="number" class="form-control @error('n_bathrooms') is-invalid @enderror"
                            id="n_bathrooms" name="n_bathrooms" placeholder="*n"
                            value="{{ old('n_bathrooms', $apartment->n_bathrooms) }}" required autocomplete="on" autofocus min="1">

                        @error('n_bathrooms')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- Apartment srq_meters --}}
                    <div class="form-group col-2 me-4">
                        <label for="sqr_meters" class="form-label my-page-text-color mb-2">
                            metri quadri*
                        </label>
                        <input type="number" class="form-control @error('sqr_meters') is-invalid @enderror" id="sqr_meters"
                            name="sqr_meters" placeholder="*n" value="{{ old('sqr_meters', $apartment->sqr_meters) }}" required
                            autocomplete="on" autofocus min="1">

                        @error('sqr_meters')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                {{-- end of row --}}
                <div class="form-row">
                    <div class="form-group col-12 mb-4">
                        <label for="image[]"
                        class="form-label my-page-text-color mb-2">
                            Inserisci altre foto del tuo appartamento*
                        </label>
                        <input type="file" class="form-control @error('images') is-invalid @enderror" name="images[]"
                            id="image[]" placeholder="* campo richiesto" multiple
                            type="file">
                        @error('images')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-12 mb-4">
                        <label for="description" class="form-label my-page-text-color mb-2">
                            Descrizione dell'appartamento *
                        </label>
                        <textarea rows="3" class="form-control  @error('description') is-invalid @enderror" name="description"
                            placeholder="* campo richiesto" id="description" value="{{ old('description', $apartment->description) }}" required autocomplete="on"
                            autofocus minlength="10">{{ old('description', $apartment->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                {{-- end of row --}}
                <div class="form-row d-flex justify-content-evenly">
                    {{-- Apartment Services --}}
                    <div class="form-group col-3 me-2 my-input-height">
                        <div class="form-label my-page-text-color mb-2">
                            Servizi*
                        </div>
                        <div class="h-100 overflow-auto">
                            @error('service')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            @foreach ($services as $service)
                                <div class="form-check">
                                    <input

                                    class="form-check-input @error('service') is-invalid @enderror" type="checkbox"
                                        id="service-{{ $service->id }}" value="{{ $service->id }}"
                                        name="services[]" @if (in_array($service->id, old('services', $service_id))) checked @endif>
                                        <label class="form-check-label" for="service-{{ $service->id }}">
                                            {{ $service->name }}
                                        </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- Apartment visibility --}}
                    <fieldset class="form-group col-md-3">
                        <div class="row">
                            <div class="col-sm-10">

                                <label class="form-label my-page-text-color mb-2" for="is_visible">
                                    Disponibilità*
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_visible" id="is_visible"
                                        value="1" checked>
                                    <label class="form-label my-page-text-color mb-2" for="is_visible">
                                        App. disponibile
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_visible" id="is_visible"
                                        value="0">
                                    <label class="form-label my-page-text-color mb-2" for="gridRadios2">
                                        App. non disponibile
                                    </label>
                                </div>

                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group col-md-3">
                        <label for="price" class="form-label my-page-text-color mb-2 text-center">
                            Inserisci il prezzo *
                        </label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                            id="price" placeholder="* campo richiesto" value="{{ old('price', $apartment->price) }}" required
                            autocomplete="on" autofocus min="1">

                        @error('price')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                    </div>
                {{-- end of row --}}
                </div>
                <div class="form-row d-flex justify-content-center">
                    {{-- Submit button --}}
                    <div class="col-12 mt-5">
                        <button type="submit" class="btn btn-outline-primary col-md-12">Pubblica il tuo appartamento</button>
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
