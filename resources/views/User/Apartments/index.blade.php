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
        <div class="row justify-content-center">
            @forelse ($apartments as $apartment)
                <div class="col-6 card-group">
                    <div class="card mb-5">
                        @if ($apartment->is_visible == true)
                            <div class="my-position bg-warning my-rounded-1 ">
                                <h4 class="m-0 my-auto"></h4>
                            </div>
                        @endif
                        @if (str_starts_with($apartment->images[0]->link, 'https://') or str_starts_with($apartment->images[0]->link, 'http://'))
                            <img class="card-img-top img-apartment" src="{{ $apartment->images[0]->link }}"
                                alt="{{ $apartment->title }}">
                            @if ($apartment->is_visible == true)
                                <div class="my-position bg-warning my-rounded-1">
                                    <h4 class="card-text"><small class="text-muted font-weight-bold">Publicato</small>
                                    </h4>
                                </div>
                            @endif
                        @else
                            <img class="card-img-top img-apartment"
                                src="{{ asset('/storage') . '/' . $apartment->images[0]->link }}"
                                alt="{{ $apartment->title }}">
                        @endif
                        <div class="card-body d-flex flex-column justify-content-between shadow rounded p-4">
                            <h2 class="card-title  text-muted ">{{ $apartment->title }}</h2>
                            <hr>
                            <section class="d-flex justify-content-between shadow rounded">
                                <div class="p-4">
                                    <pre class="card-text">Prezzo: {{ $apartment->price }} €</pre>
                                    <pre class="card-text">Creato il: {{ $apartment->created_at }}</pre>
                                </div>
                                <div class="d-block">
                                    <ul class="list-group p-4">
                                        <li class="card-text list-style-type-circle">Servizi: </li>
                                        @forelse ($apartment->services as $service)
                                            <li class="list-style-type-none">
                                                <pre>{{ $service->name }}</pre>
                                            </li>

                                        @empty
                                            <p class="card-text">nessun servizio Extra</p>
                                        @endforelse
                                    </ul>

                                </div>
                            </section>
                            @if ($apartment->is_visible)
                                <h4 class="card-text py-4 "><small class="text-muted font-weight-bold">Publicato</small>
                                </h4>
                            @else
                                <h4 class="card-text py-4 "><small class="text-muted font-weight-bold">Non
                                        Publicato</small></h4>
                            @endif
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('user.apartments.edit', $apartment) }} "class="btn btn-warning">
                                    &#9998; Modifica
                                </a>
                                <a href="{{ route('user.apartments.show', $apartment) }} "class="btn btn-primary">
                                    &#10061; Visita
                                </a>
                                {{-- delete form --}}
                                <form action="{{ route('user.apartments.destroy', $apartment) }}" method="POST"
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

                </div>
            @empty
                <div class="col-12 d-flex justify-content-center shadow rounded my-3 my-bg-card-info">
                    <h2 class="py-3 py-sm-4 my-page-text-color text-center">
                        Non hai nessun appartamento
                    </h2>
                </div>
            @endforelse
            <div class="col-12">
                <div class=" d-flex justify-content-center text-center p-3">
                    {{ $apartments->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
