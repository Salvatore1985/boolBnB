<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SHOW Apartment</title>
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps.css'>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps-web.min.js"></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/services/services-web.min.js"></script>
    <style>
        #map-div { width: 100vw; height: 100vh; }
    </style>
</head>
<body>
    <h1>{{$apartment->description}}</h1>

    @dump($apartment)

    <div id="map-div"></div>

    <a href="{{route('user.apartments.index')}}">
        Lista appartamenti
    </a>

    <script type="text/javascript">
        const API_KEY = 'tlI6fGKvUCfBh91AG1PKyRZwhaxoGIWp';
        const APPLICATION_NAME = 'My Application';
        const APPLICATION_VERSION = '1.0';

        tt.setProductInfo(APPLICATION_NAME, APPLICATION_VERSION);
        const position = {lng: -122.47483, lat: 37.80776};

        var map = tt.map({
        key: API_KEY,
        container: 'map-div',
        center: position,
        zoom: 12
        });

        var marker = new tt.Marker().setLngLat(position).addTo(map);
        var popup = new tt.Popup({ anchor: 'top' }).marker.setPopup(popup).togglePopup()

    </script>
</body>
</html>
