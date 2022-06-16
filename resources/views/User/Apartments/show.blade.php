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

    <a href="{{route('user.apartments.index')}}">
        Lista appartamenti
    </a>

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
</body>
</html>
