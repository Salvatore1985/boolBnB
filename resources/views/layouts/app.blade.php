<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.partials.head')

    <body>
        <div id="app">
            <header class="height-header-form">
                @include('layouts.partials.header')
            </header>
        </div>

        <main class="background-image-form height-main-form">
            @yield('content')
        </main>

        @yield('js-files')
    </body>
</html>
