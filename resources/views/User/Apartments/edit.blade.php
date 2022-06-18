@extends('layouts.editPage')
@section('form-content')
    <section>
        <div class="background-image-form height-main-form p-3 h-100">
            <section class="container ">
                <div class="col-12 d-flex flex-wrap mb-4">
                    @foreach ($apartment->images as $image)
                    <div class="col-4 p-1 position-relative">
                        <div class="delete position-absolute">
                            <form action="{{route('user.image.destroy', $image)}}" method="POST" class="image-destroyer" onclick="return confirm('Sei sicuro di voler eliminare la seguente foto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-1 delete">
                                    &#10006;
                                </button>
                            </form>
                        </div>
                        {{--  --}}
                        {{-- <form action="{{route('user.apartments.destroy', $apartment)}}" method="POST" class="apartment-destroyer" apartment-name="{{ucfirst($apartment->title)}}">
                            @csrf
                            @method('DELETE')
                                <button class="btn btn-md btn-delete btn-outline-danger" type="submit">

                                </button>
                        </form> --}}
                        {{--  --}}
                        @if (str_starts_with($apartment->image, 'https://') || str_starts_with($apartment->image, 'http://'))
                            <img class="rounded-1" src="{{$image->link}}" alt="apartment img" >
                        @else
                            <img class="rounded-1" src="{{ asset('/storage') . '/' . $image->link }}" alt="">
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
                        <div class="form-group col-md-3">
                            <label for="title" class="form-label">Titolo dell' appartamento</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" placeholder="* campo richiesto"
                                value="{{ old('title', $apartment->title) }}" />
                            @error('title')
                                <div class="text-start invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- Apartment images --}}
                        <div class="col-12">
                            <label for="image[]">inserisci altre foto del tuo appartamento</label>
                            <input type="file" class="form-control" name="images[]" id="image[]" multiple>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address">inserisci la via:</label>
                            <input class="w-100" type="text" name="address" id="address" value="{{ old('address', $apartment->address) }}" required>
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

                        <div class="form-group col-md-3">
                            <label for="n_floor" class="form-label"> Nmero di piani</label>
                            <input type="text" class="form-control @error('n_floor') is-invalid @enderror" id="n_floor"
                                name="n_floor" placeholder="* campo richiesto"
                                value="{{ old('n_floor', $apartment->n_floor) }}" />
                            @error('n_floor')
                                <div class="text-start invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{--  --}}
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="n_rooms" class="form-label "> Numero delle stanze</label>
                            <input type="text" class="form-control @error('n_rooms') is-invalid @enderror" name="n_rooms"
                                id="n_rooms" placeholder="* campo richiesto"
                                value="{{ old('n_rooms', $apartment->n_rooms) }}" placeholder="* campo richiesto" />
                            @error('n_rooms')
                                <div class="text-start invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sqr_meters" class="form-label">Metri dell'appartamento</label>
                            <input type="text" class="form-control @error('sqr_meters') is-invalid @enderror"
                                id="sqr_meters" name="sqr_meters" placeholder="* campo richiesto"
                                value="{{ old('sqr_meters', $apartment->sqr_meters) }}" />
                            @error('sqr_meters')
                                <div class="text-start invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="n_beds" class="form-label">Numero dei letti</label>
                            <input type="text" class="form-control @error('n_beds') is-invalid @enderror" name="n_beds"
                                id="n_beds" placeholder="* campo richiesto"
                                value="{{ old('n_beds', $apartment->n_beds) }}" />
                            @error('n_beds')
                                <div class="text-start invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{--  --}}
                    <div class="form-group col-md-3">

                    </div>
                    <div class="form-group ">
                        <label for="description" class="form-label">Descrizione dell'appartamento</label>
                        <textarea rows="1.5" class="form-control  @error('description') is-invalid @enderror" name="description"
                            id="description" placeholder="* campo richiesto" value="{{ old('description', $apartment->description) }}">
                        {{ old('description', $apartment->description) }}
                    </textarea>
                        @error('description')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="n_bathrooms" class="form-label">Il numero dei bagni</label>
                            <input type="text" class="form-control @error('n_bathrooms') is-invalid @enderror"
                                id="n_bathrooms" name="n_bathrooms" placeholder="* campo richiesto"
                                value="{{ old('n_bathrooms', $apartment->n_bathrooms) }}" />
                            @error('n_bathrooms')
                                <div class="text-start invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <div class="col-sm-2">Servizi</div>
                            <div class="col-sm-10 text-left h-50 overflow-auto">
                                @foreach ($services as $service)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="service[]"
                                            value="{{ $service->id }}">
                                        <label class="form-check-label" for="gridCheck1">
                                            {{ $service->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
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
                        <div class="form-group col-md-3">
                            <label for="price" class="form-label">Inserisci il prezzo</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror"
                                name="price" id="price" placeholder="* campo richiesto"
                                value="{{ old('price', $apartment->price) }}" />
                            @error('price')
                                <div class="text-start invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="mt-5">
                                <button type="submit" class="btn btn-primary col-md-12">Pubblica il tuo
                                    appartamento</button>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </section>
@endsection

@section('js-files')
<script defer>
    let address = document.getElementById('address');
    address.addEventListener('keyup', logKey);
    function logKey() {
            let newAdress = address.value.replace(/ /g, "%20");
            let search ='https://api.tomtom.com/search/2/search/' + newAdress + '.json?countrySet=IT&lat=37.337&lon=-121.89&extendedPostalCodesFor=Str&minFuzzyLevel=1&maxFuzzyLevel=2&view=Unified&relatedPois=off&key=SsllzLi6J5XLezFkwzq7gpR0xOCwBOzL&countrySet=Italia';
            let request = new XMLHttpRequest(); // Create a request variable and assign a new XMLHttpRequest object to it.
            request.open('GET', search); // Open a new connection, using the GET request on the URL endpoint
            request.send();
            if(address.value == ""){
                        document.getElementById("results").classList.add("d-none");
            }

            let tips;
            request.onload = async function () {
                const data = JSON.parse(this.response);
                for (let index = 0; index < 5; index++) {
                    let id=index+1+"-result";
                    let li=document.getElementById(id);
                    if(data["results"][index]["address"]["freeformAddress"] != undefined && data["results"][index]["address"]["countryCode"] != undefined ){
                        li.innerHTML = data["results"][index]["address"]["freeformAddress"] + " " +data["results"][index]["address"]["countryCode"];
                    }
                    li.addEventListener('click', function(){
                        address.value = this.innerHTML;
                        document.getElementById("results").classList.add("d-none");
                    });
                    document.getElementById("results").classList.remove("d-none");
                }
            }
        }
</script>
@endsection
