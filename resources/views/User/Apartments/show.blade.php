<style>
    #map-div { width: 100%; height: 30rem; }
</style>
@extends('layouts.createPage')

@section('form-content')

    @dump($images)

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-1">{{$apartment->title}}</h1>
                <h2>{{$apartment->address}}</h2>
            </div>
            <div class="col-12">
                {{-- le immagini qui! --}}
                {{--{{$apartment->image}}--}}
            </div>
            <div class="col-8">
                <p>{{$apartment->description}}</p>

                <ul class="list-group">
                    <li class="list-group-item">Metri quadri: {{$apartment->sqr_meters}}</li>
                    <li class="list-group-item">N. Camere: {{$apartment->n_rooms}}</li>
                    <li class="list-group-item">N. Piani: {{$apartment->n_floor}}</li>
                    <li class="list-group-item">N. Bagni: {{$apartment->n_bathrooms}}</li>
                    <li class="list-group-item">N. Letti: {{$apartment->n_beds}}</li>
                    <li class="list-group-item">N. Price: {{$apartment->price}}</li>
                </ul>

            </div>
            <div class="col-4">
                <a href="{{route('user.apartments.edit', $apartment)}} "class="btn btn-warning">
                    &#9998; Edit
                </a>

                <form action="{{route('user.apartments.destroy', $apartment)}}" method="POST" class="apartment-destroyer" apartment-name="{{ucfirst($apartment->title)}}">
                    @csrf
                    @method('DELETE')
                        <button class="btn btn-md btn-delete btn-outline-danger" type="submit">
                            &#10006; Delete
                        </button>
                </form>
            </div>
            <div class="col-12">
                <div id="map-div" lat="{{$apartment->lat}}" log="{{$apartment->long}}"></div>
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
        const positions = [
            { lat: lat, lng: long },
        ];

        const map = tt.map({
        key: API_KEY,
        container: 'map-div',
        center: positions[0],
        zoom: 15
        });

        positions.forEach((position) => {
            const marker = new tt.Marker().setLngLat(position).addTo(map);
            const popup = new tt.Popup({ anchor: 'top' }).setText(title.innerHTML)
            marker.setPopup(popup).togglePopup()
        });

    </script>
@endsection
