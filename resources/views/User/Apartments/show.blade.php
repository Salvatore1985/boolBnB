    <style>
        #map-div { width: 100vw; height: 100vh; }
    </style>
@extends('layouts.createPage')

@section('form-content')

    @dump($apartment)

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="display-1">{{$apartment->title}}</h1>
                <h2>{{$apartment->address}}</h2>
            </div>
            <div class="col-8">
                {{-- le immagini qui! --}}
                <p>{{$apartment->description}}</p>

                <ul class="list-group">
                    <li class="list-group-item">N. Camere: {{$apartment->n_rooms}}</li>
                    <li class="list-group-item">Metri quadri: {{$apartment->sqr_meters}}</li>
                    <li class="list-group-item">{{$apartment->n_rooms}}</li>
                    <li class="list-group-item">{{$apartment->n_rooms}}</li>
                    <li class="list-group-item">{{$apartment->n_rooms}}</li>
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
        </div>
    </div>



    {{--<div id="map-div"></div>--}}
@endsection


@section('js-files')
    <script type="text/javascript">
        const API_KEY = 'tlI6fGKvUCfBh91AG1PKyRZwhaxoGIWp';
        const APPLICATION_NAME = 'My Application';
        const APPLICATION_VERSION = '1.0';

        //tt.setProductInfo(APPLICATION_NAME, APPLICATION_VERSION);
        const positions = [
            { lat: 6.4434, lng: 3.3553 },
            { lat: 6.4442, lng: 3.3561 },
            { lat: 6.4451, lng: 3.3573 },
            { lat: 6.4459, lng: 3.3520 }
        ];

        const map = tt.map({
        key: API_KEY,
        container: 'map-div',
        center: positions[0],
        zoom: 15
        });

        positions.forEach((position) => {
            const marker = new tt.Marker().setLngLat(position).addTo(map);
            const popup = new tt.Popup({ anchor: 'top' }).setText('Apartment')
            marker.setPopup(popup).togglePopup()
        });

    </script>
@endsection
