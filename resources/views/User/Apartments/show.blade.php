<style>
    #map-div {
        width: 500px;
        height: 450px;
    }
</style>
@extends('layouts.createPage')
@section('title', 'Apartment')
@section('form-content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                @if (session('alert-message'))
                    <div class="alert alert-{{ session('alert-type') }}">
                        {{ session('alert-message') }}
                    </div>
                @endif
            </div>
            <div class="col-12 col-lg-8 d-flex my-bg-card-map">
                <div>
                    <h1>{{ $apartment->title }}</h1>
                    <h2>Sito in: {{ $apartment->address }}</h2>
                </div>
            </div>
            {{-- form --}}
            <div class="col-12 col-lg-4 my-5">
                <ul class="d-flex justify-content-between align-items-center">
                    <li class="text-decoration-none list-style-type-none">
                        <a href="{{ route('user.apartments.index') }} "class="btn btn-success ">
                            I tuoi appartamenti
                        </a>
                    </li>
                    <li class="text-decoration-none list-style-type-none">
                        <a href="{{ route('user.apartments.edit', $apartment) }} "class="btn btn-warning">
                            &#9998;
                        </a>
                    </li>
                    <li class="text-decoration-none list-style-type-none d-flex align-items-center">
                        <form action="{{ route('user.apartments.destroy', $apartment) }}" method="POST"
                            class="apartment-destroyer mx-0 my-auto " apartment-name="{{ ucfirst($apartment->title) }}"
                            onclick="return confirm('Sei sicuro di voler eliminare {{ $apartment->title }}?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-md btn-delete btn-outline-danger" type="submit">
                                &#10008;
                            </button>
                        </form>
                    </li>
                    <li class="text-decoration-none list-style-type-none">
                        <a href="{{ route('user.sponsorships.purchase', $apartment) }} "class="btn btn-primary">
                            Sponsorizza
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-between">
            {{-- image --}}
            <div class="col-12 col-lg-6 my-5 my-bg-card-map ">
                @foreach ($apartment->images as $image)
                    @if (str_starts_with($image->link, 'https://') || str_starts_with($image->link, 'http://'))
                        <img class=" w-100 p-3" src="{{ $image->link }}" alt="{{ $apartment->title }}">
                    @else
                        <img class=" w-100 p-3" src="{{ asset('/storage') . '/' . $image->link }}"
                            alt="{{ $apartment->title }}">
                    @endif
                @endforeach
            </div>
            {{-- tomtom --}}
            <div class="col-12 col-lg-5 my-5  ">
                <div class="row">
                    <div class="col-12">
                        <div class="my-bg-card-map" id="map-div" lat="{{ $apartment->lat }}"
                            log="{{ $apartment->long }}">
                        </div>
                    </div>
                    {{-- service --}}
                    <div class="col-12 my-3">
                        <div>
                            <h1>Descrizione</h1>
                            <p>{{ $apartment->description }}</p>

                            <ul class="list-group">
                                <li class="list-group-item">Metri quadri: {{ $apartment->sqr_meters }}</li>
                                <li class="list-group-item">N. Camere: {{ $apartment->n_rooms }}</li>
                                <li class="list-group-item">N. Bagni: {{ $apartment->n_bathrooms }}</li>
                                <li class="list-group-item">N. Letti: {{ $apartment->n_beds }}</li>
                                <li class="list-group-item">N. Price: {{ $apartment->price }}</li>
                            </ul>
                            <ul class="list-group">
                                @if (count($apartment->services) !== 0)
                                    <li class="list-group-item">
                                        servizi:
                                        @foreach ($apartment->services as $service)
                                            <pre class="me-2">{{ $service->name }}</pre>
                                        @endforeach
                                    </li>
                                @else
                                    Non ci sono servizi
                                @endif
                            </ul>
                            <div>
                                @forelse ($apartment->messages as $message)
                                    <div class="card-body border-bottom">
                                        <h5 class="card-title h6"><span class="font-italic">E-mail:</span>
                                            {{ $message->email }}
                                        </h5>
                                        <p class="card-text"><span class="font-italic">Messaggio:</span>
                                            {{ $message->email_content }}</p>
                                    </div>
                                @empty
                                    <div class="card-body border-bottom">Non ci sono messaggi</div>
                                @endforelse
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
@endsection

@section('js-files')
    <script type="text/javascript">
        const API_KEY = 'tlI6fGKvUCfBh91AG1PKyRZwhaxoGIWp';
        const APPLICATION_NAME = 'My Application';
        const APPLICATION_VERSION = '1.0';
        const mapDiv = document.querySelector('#map-div');
        const lat = mapDiv.getAttribute('lat');
        const long = mapDiv.getAttribute('log');
        const title = document.querySelector('h1');

        //tt.setProductInfo(APPLICATION_NAME, APPLICATION_VERSION);
        const positions = [{
            lat: lat,
            lng: long
        }, ];

        const map = tt.map({
            key: API_KEY,
            container: 'map-div',
            center: positions[0],
            zoom: 15
        });

        positions.forEach((position) => {
            const marker = new tt.Marker().setLngLat(position).addTo(map);
            const popup = new tt.Popup({
                anchor: 'top'
            }).setText(title.innerHTML)
            marker.setPopup(popup).togglePopup()
        });
    </script>
@endsection
