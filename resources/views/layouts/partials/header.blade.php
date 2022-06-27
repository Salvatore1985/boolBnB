<div id="app">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light my-bg-card-map">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">

                    <img class="logo" src="{{ asset('images/boolBnB-logo.png') }}" alt="BoolBnB Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true"
                    aria-label="Toggle navigation">
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
                                <a class="nav-link text-primary " aria-current="page" href="{{ route('user.home') }}">
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item ms-auto p-2">
                                <a class="nav-link text-primary  @if (Auth::id() === 1) d-none @endif"
                                    aria-current="page" href="{{ route('user.apartments.index') }}">
                                    I tuoi appartmenti
                                </a>
                            </li>
                            @if (Auth::id() === 1)
                                <li class="nav-item ms-auto p-2">
                                    <a class="nav-link text-primary " aria-current="page"
                                        href="{{ route('user.apartments.index') }}">
                                        I Appartmenti
                                    </a>
                                </li>
                                <li class="nav-item ms-auto p-2">
                                    <a class="nav-link text-primary " aria-current="page"
                                        href="{{ route('admin.services.index') }}">
                                        Servizi
                                    </a>
                                </li>
                                <li class="nav-item ms-auto p-2">
                                    <a class="nav-link text-primary " aria-current="page"
                                        href="{{ route('user.users.index') }}">
                                        Utenti
                                    </a>
                                </li>
                                <li class="nav-item ms-auto p-2">
                                    <a class="nav-link text-primary " aria-current="page"
                                        href="{{ route('user.sponsorships.index') }}">
                                        Sponsorizzazioni
                                    </a>
                                </li>
                            @endif
                            <hr class="dropdown-divider">
                            <li class="nav-item ms-auto p-2">
                                <a class="nav-link text-primary " aria-current="page" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Log Out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endif
                        @guest
                            <li class="nav-item ms-auto p-2">
                                <a class="nav-link  text-primary " #aria-current="page" href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item ms-auto p-2">
                                    <a class="nav-link  text-primary " aria-current="page"
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
