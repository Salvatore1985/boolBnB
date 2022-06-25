<div id="app">
    <header>
        {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav> --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-light my-bg-card-map">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">

                    <img class="logo" src="{{ asset('images/boolBnB-logo.png') }}" alt="BoolBnB Logo">
                </a>
                {{-- <ul class="navbar-nav  mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                </ul> --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="true" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-grow-0 " id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto m-2">
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('user.home') }}" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pannello di controllo
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown"> --}}
                                @if (Auth::user())
                                <li class="nav-item ms-auto p-2">
                                    <a class="nav-link @if (Auth::id() === 1) d-none @endif" aria-current="page"
                                        href="{{ route('user.apartments.index') }}">
                                        I tuoi appartmenti
                                    </a>
                                </li>
                                    @if (Auth::id() === 1)
                                        <li class="nav-item ms-auto p-2">
                                            <a class="nav-link" aria-current="page"
                                                href="{{ route('user.apartments.index') }}">
                                                I Appartmenti
                                            </a>
                                        </li>
                                        <li class="nav-item ms-auto p-2">
                                            <a class="nav-link" aria-current="page"
                                                href="{{ route('admin.services.index') }}">
                                                Servizi
                                            </a>
                                        </li>
                                        <li class="nav-item ms-auto p-2">
                                            <a class="nav-link" aria-current="page"
                                                href="{{ route('user.users.index') }}">
                                                Utenti
                                            </a>
                                        </li>
                                        <li class="nav-item ms-auto p-2">
                                            <a class="nav-link" aria-current="page"
                                                href="{{ route('user.sponsorships.index') }}">
                                                Sponsorizzazioni
                                            </a>
                                        </li>
                                    @endif
                                    <hr class="dropdown-divider">
                                    <li class="nav-item ms-auto p-2">
                                        <a class="nav-link" aria-current="page" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            Log Out
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @endif
                                @guest
                                    <li class="nav-item ms-auto p-2">
                                        <a class="nav-link text-black" #aria-current="page" href="{{ route('login') }}">
                                            {{ __('Login') }}
                                        </a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item ms-auto p-2">
                                            <a class="nav-link text-black" aria-current="page"
                                                href="{{ route('register') }}">
                                                {{ __('Register') }}
                                            </a>
                                        </li>
                                    @endif
                                @endguest
                            {{-- </ul>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</div>
