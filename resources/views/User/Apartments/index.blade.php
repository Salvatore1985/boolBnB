@extends('layouts.app')

@section('content')
    <div class="container w-75 mx-auto">
        <div class="row">
            {{-- Create Apartment Button --}}
            <div class="col-12 text-start my-4 mt-5">
                @if (!count($apartments) == 0)
                    <a href="{{ route('user.apartments.create') }} " class="btn btn-sm btn-outline-primary">
                        Aggiungi un appartamento
                    </a>
                @else
                    <a href="{{ route('user.apartments.create') }} " class="btn btn-sm btn-outline-primary">
                        Diventa un Host
                    </a>
                @endif
            </div>
            {{-- Delete Apartment Message --}}
            <div class="col-12">
                @if (session('alert-message'))
                    <div class="alert alert-{{ session('alert-type') }}">
                        {{ session('alert-message') }}
                    </div>
                @endif
            </div>
        </div>
        {{-- Start of cards --}}
        <div class="row">
            <div class="col-12 d-flex flex-wrap justify-content-center position-relative">
                    @forelse ($apartments as $apartment)
                    <div class="card my-card-size mb-5 m-1">
                        {{-- Image Slider --}}
                        <div id="carouselExampleIndicators" class="carousel slide w-100 position-relative" data-bs-ride="true">
                            <div class="carousel-indicators">
                                @for ($i = 0; $i < count($apartment->images); $i++)
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$i}}" class="active" aria-current="true" aria-label="Slide {{$i}}"></button>
                                @endfor
                            </div>
                            <div class="carousel-inner">
                                @foreach ($apartment->images as $image)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        @if (str_starts_with($image->link, 'https://') || str_starts_with($image->link, 'http://'))
                                            <img class="d-block w-100 img-height" src="{{ $image->link }}" alt="{{ $apartment->title }}">
                                        @else
                                            <img class="d-block w-100 img-height" src="{{ asset('/storage') . '/' . $image->link }}"
                                                alt="{{ $apartment->title }}">
                                        @endif
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="position-absolute my-card-position">
                            @if ($apartment->is_visible)
                                    <small class="text-muted font-weight-bold bg-primary">
                                        Publicato
                                    </small>
                            @else
                                <h4 class="card-text py-4 ">
                                    <small class="text-muted font-weight-bold">
                                        Non Publicato
                                    </small>
                                </h4>
                            @endif
                        </div>

                        {{-- Card body --}}
                        <div class="card-body shadow rounded p-4 position-relative">
                            <h2 class="card-title  text-muted ">{{ $apartment->title }}</h2>
                            <hr>
                            <p class="card-text">Creato il: {{ $apartment->created_at }}</p>
                        </div>
                        {{-- <div class="position-absolute my-btn-positions d-flex flex-column">
                            {{-- edit button
                            <a href="{{ route('user.apartments.edit', $apartment) }} "class="btn btn-warning mb-2">
                                    &#9998;
                            </a>
                            {{-- Visit button
                            <a href="{{ route('user.apartments.show', $apartment) }} "class="btn btn-primary">
                                &#10061;
                            </a>
                            {{-- delete form
                            <form action="{{ route('user.apartments.destroy', $apartment) }}" method="POST"
                            class="apartment-destroyer" apartment-name="{{ ucfirst($apartment->title) }}"
                            onclick="return confirm('Sei sicuro di voler eliminare {{ $apartment->title }}?')">
                            @csrf
                            @method('DELETE')
                                <button class="btn btn-md btn-delete btn-outline-danger" type="submit">
                                    &#10008;
                                </button>
                            </form>
                        </div> --}}
                    </div>
                                        {{-- @if ($apartment->is_visible)
                                            <h4 class="card-text py-4 "><small class="text-muted font-weight-bold">Publicato</small>
                                            </h4>
                                        @else
                                            <h4 class="card-text py-4 "><small class="text-muted font-weight-bold">Non
                                                    Publicato</small></h4>
                                        @endif
                                    </div>
                                    <div class="col-3 d-flex justify-content-evenly">
                                    <a href="{{ route('user.apartments.edit', $apartment) }} "class="btn btn-warning">
                                        &#9998; Modifica
                                    </a>
                                    <a href="{{ route('user.apartments.show', $apartment) }} "class="btn btn-primary">
                                        &#10061; Visita
                                    </a>
                                    {{-- delete form --}}
                                    {{-- <form action="{{ route('user.apartments.destroy', $apartment) }}" method="POST"
                                        class="apartment-destroyer" apartment-name="{{ ucfirst($apartment->title) }}"
                                        onclick="return confirm('Sei sicuro di voler eliminare {{ $apartment->title }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-md btn-delete btn-outline-danger" type="submit">
                                            &#10008; Elimina
                                        </button>
                                    </form>
                                </div>
                                    </div>
                                </div>
                            </section> --}}
            @empty
            <div class="col-12 d-flex justify-content-center shadow rounded my-3 my-bg-card-info">
                <h2 class="py-3 py-sm-4 my-page-text-color text-center">
                    Non hai nessun appartamento
                </h2>
            </div>
            @endforelse
            @if (!$apartment->is_visible)
            <div class="position-absolute w-100 h-100 my-ocapity-card">

            </div>
            @endif
        </div>
    </div>

@endsection
{{-- @section('js-files')
    <script>
        // new Splide( '.splide' ).mount();
        let elms = document.getElementsByClassName( 'splide' );
            for ( let i = 0; i < elms.length; i++ ) {
            new Splide( elms[ i ] ).mount();
            }
    </script>
@endsection --}}
{{-- is_visible --}}
{{-- @if ($apartment->is_visible == true)
                            <div class="my-position bg-warning my-rounded-1 ">
                                <h4 class="m-0 my-auto"></h4>
                            </div>
                        @endif --}}
