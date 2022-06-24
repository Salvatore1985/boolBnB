<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.partials.head')

<body>

    @include('layouts.partials.header')

    <main class="background-image-form height-main-form">
        @yield('content')
    </main>
    @yield('layouts.partials.footer')
    @yield('js-files')
</body>

</html>
