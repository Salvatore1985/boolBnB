<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.partials.head')

<body>
    <div id="app">
        <header class="height-header-form">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm height-header-form">
                <div class="container">
                    <img id="logo" src="{{asset('images/boolBnB-mini-logo.png')}}" alt="BoolBnB Logo">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        BoolBnB
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        @if (Auth::user())
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.home') }}">Pannello di controllo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.apartments.index') }}">I tuoi
                                        Appartmenti</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.apartments.create') }}">Diventa Host</a>
                                </li> --}}
                            </ul>
                        @endif

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    </div>


    <main class="background-image-form height-main-form">
        @yield('content')
    </main>

    @yield('js-files')
</body>

</html>
