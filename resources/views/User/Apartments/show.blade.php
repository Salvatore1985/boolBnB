<style>
    #map-div {
        width: 30vw;
        height: 50vh;
    }
</style>
@extends('layouts.createPage')

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
            <div class="col-6 d-flex">
                <div>
                    <h1>{{ $apartment->title }}</h1>
                    <h2>{{ $apartment->address }}</h2>
                </div>

            </div>
            <div class="col-6 d-flex flex-column align-items-end">
                <div class="py-2">

                    <a href="{{ route('user.apartments.edit', $apartment) }} "class="btn btn-warning">
                        &#9998; Modifica
                    </a>
                </div>
                {{-- delete form --}}
                <div>

                    <form action="{{ route('user.apartments.destroy', $apartment) }}" method="POST"
                        class="apartment-destroyer" apartment-name="{{ ucfirst($apartment->title) }}"
                        onclick="return confirm('Sei sicuro di voler eliminare {{ $apartment->title }}?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-md btn-delete btn-outline-danger" type="submit">
                            &#10008; Elimina
                        </button>
                    </form>
                </div>
                <a href="{{ route('user.sponsorships.purchase', $apartment) }} "class="btn btn-primary">
                    Sponsorizza
                </a>
            </div>
            <div class="col-6 ">
                @foreach ($apartment->images as $image)
                    @if (str_starts_with($image->link, 'https://') || str_starts_with($image->link, 'http://'))
                        <img class="rounded-1 w-100 " src="{{ $image->link }}" alt="{{ $apartment->title }}">
                    @else
                        <img class="rounded-1 w-100 " src="{{ asset('/storage') . '/' . $image->link }}"
                            alt="{{ $apartment->title }}">
                    @endif
                @endforeach
            </div>
            <div class="col-6">
                <div id="map-div" lat="{{ $apartment->lat }}" log="{{ $apartment->long }}"></div>
                <div>
                    <h1>{{ $apartment->description }}</h1>

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
                        <h5 class="card-title h6"><span class="font-italic">E-mail:</span> {{ $message->email }}</h5>
                        <p class="card-text"><span class="font-italic">Messaggio:</span> {{ $message->email_content }}</p>
                        </div>
                    @empty
                        <div class="card-body border-bottom">Non ci sono messaggi</div>
                    @endforelse
                    </div>

                </div>


            </div>

            {{-- <section class="d-flex ">
                @foreach ($apartment->images as $image)
                    <div class="col-6 show-img mb-3">
                        @if (str_starts_with($image->link, 'https://') || str_starts_with($image->link, 'http://'))
                            <img class="rounded-1 w-100" src="{{ $image->link }}" alt="{{ $apartment->title }}">
                        @else
                            <img class="rounded-1 w-100" src="{{ asset('/storage') . '/' . $image->link }}"
                                alt="{{ $apartment->title }}">
                        @endif
                    </div>
                @endforeach
                <div>
                    <p>{{ $apartment->description }}</p>

                    <ul class="list-group">
                        <li class="list-group-item">Metri quadri: {{ $apartment->sqr_meters }}</li>
                        <li class="list-group-item">N. Camere: {{ $apartment->n_rooms }}</li>
                        <li class="list-group-item">N. Piani: {{ $apartment->n_floor }}</li>
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

                </div>
            </section> --}}

            {{-- <div class="col-5">
                <div id="map-div" lat="{{ $apartment->lat }}" log="{{ $apartment->long }}"></div>
            </div> --}}
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
