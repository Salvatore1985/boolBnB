{{-- <div class="container">
        @if (Auth::user())
        <div class="collapse navbar-collapse" id="navbarSupportedContent"> --}}
{{-- <li class="nav-item @if (count(Auth::user()->apartments) = 0)
                    d-block @endif">
                    <a class="nav-link" href="{{ route('user.apartments.create') }}">
                        Diventa Host
                    </a>
                </li> --}}
{{-- </ul>
        @endif
        @if (Auth::id() === 1)
            <ul class="navbar-nav mr-auto">
                <li class="nav-item" >
                    <a class="nav-link" href="{{ route('admin.services.index') }}">
                        Servizi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.users.index') }}">
                        Utenti
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.sponsorships.index') }}">
                        Sponsorizzazioni
                    </a>
                </li>
            </ul>
        @endif --}}
<!-- Right Side Of Navbar -->
{{-- <ul class="navbar-nav ml-auto"> --}}
<!-- Authentication Links -->
{{-- @guest
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
</nav> --}}
<div id="app">
    <header class="height-header-form shadow">
        <nav class="navbar navbar-expand-lg navbar-light background_navbar height-header-form h5">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img id="logo" src="{{ asset('images/boolBnB-logo.png') }}" alt="BoolBnB Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse  align-items-end flex-grow-0" id="navbarSupportedContent">
                    @if (Auth::user())
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="{{ route('user.home') }}">
                                    Pannello di controllo
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('user.apartments.index') }}">
                                    I tuoi Appartmenti
                                </a>
                            </li>
                            @if (Auth::id() === 1)
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page"
                                        href="{{ route('user.apartments.index') }}">
                                        I Appartmenti
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page"
                                        href="{{ route('admin.services.index') }}">
                                        Servizi
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ route('user.users.index') }}">
                                        Utenti
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page"
                                        href="{{ route('user.sponsorships.index') }}">
                                        Sponsorizzazioni
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    Log Out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @endif
                    @guest
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link text-black" #aria-current="page" href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item ">
                                    <a class="nav-link text-black" aria-current="page" href="{{ route('register') }}">
                                        {{ __('Register') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    @endguest
                </div>
            </div>
        </nav>
    </header>
</div>
