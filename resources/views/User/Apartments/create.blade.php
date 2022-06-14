@extends('layouts.app')

@section('content')
    <div class="wrapper w-75 mx-auto">
        <div class="container-fluid">
            <div class="row p-4">
                {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif --}}
            </div>
            <div class="row p-4">

                {{-- ? Per ogni valore rilevante ai fini del salvataggio abbiamo creato: --}}
                {{-- # Un campo modificabile (tipicamente un input) in cui l'utente può inserire i contenuti --}}
                {{-- § Un attributo del campo relativo di input chiamato "name" che ci consente di recupare il valore dal controller --}}
                <form action="{{ route('user.apartments.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="address">Inserisci la via</label>
                        <input type="text" name="address" id="address">
                        @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="n_rooms">Inserisci il numero delle stanze</label>
                        <input type="text" name="n_rooms" id="n_rooms">
                        @error('image_url')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">

                        <label for="description" class="form-label">Inserisci la descrizione dell'appartamento</label>
                        <textarea class="form-control" id="description" name="description" id="description"></textarea>
                        @error('content')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="sqr_meters" class="form-label">Inserisci la descrizione dell'appartamento</label>
                        <textarea class="form-control" id="sqr_meters" name="sqr_meters" id="sqr_meters"></textarea>
                        @error('content')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="n_beds" class="form-label">Inserisci la descrizione dell'appartamento</label>
                        <textarea class="form-control" id="n_beds" name="n_beds" id="n_beds"></textarea>
                        @error('content')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="n_bathrooms" class="form-label">Inserisci la descrizione dell'appartamento</label>
                        <textarea class="form-control" id="n_bathrooms" name="n_bathrooms" id="n_bathrooms"></textarea>
                        @error('content')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="n_floor" class="form-label">Inserisci la descrizione dell'appartamento</label>
                        <textarea class="form-control" id="n_floor" name="n_floor" id="n_floor"></textarea>
                        @error('content')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Inserisci la descrizione dell'appartamento</label>
                        <textarea class="form-control" id="title" name="title" id="title"></textarea>
                        @error('content')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Inserisci la descrizione dell'appartamento</label>
                        <textarea class="form-control" id="price" name="price" id="price"></textarea>
                        @error('content')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Pubblica il tuo appartamento</button>
                </form>

            </div>
        </div>
    </div>
@endsection
