<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SHOW Apartment</title>
</head>
<body>
    <h1>{{$apartment->description}}</h1>

    @dump($apartment)

    <a href="{{route('user.apartments.index')}}">
        Lista appartamenti
    </a>

</body>
</html>
