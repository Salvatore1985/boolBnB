@extends('layouts.editPage')
@section('form-content')

<section class="container p-5">

        <form action="{{ route('user.apartments.update', $apartment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="title">* Inserisci un titolo *</label>
                    <input type="text" name="title" id="title" value="{{$apartment->title}}">
                    @error('title')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            <div class="mb-3">
                <label for="address"> * Inserisci l'indirizzo *</label>
                <input type="text" name="address" id="address" value="{{$apartment->address}}">
                @error('address')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description">* Inserisci una descrizione *</label>
                <textarea type="text" name="description" id="description" value="{{$apartment->description}}">
                    {{$apartment->description}}
                </textarea>
                @error('description')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="sqr_meters">* Inserisci i metri quadri *</label>
                <input type="text" name="sqr_meters" id="sqr_meters" value="{{$apartment->sqr_meters}}">
                @error('sqr_meters')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="n_beds">* Inserisci il numero di letti *</label>
                <input type="text" name="n_beds" id="n_beds" value="{{$apartment->n_beds}}">
                @error('n_beds')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="n_rooms">* Inserisci il numero di stanze *</label>
                <input type="text" name="n_rooms" id="n_rooms" value="{{$apartment->n_rooms}}">
                @error('n_rooms')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="n_bathrooms">* Inserisci il numero di bagni *</label>
                <input type="text" name="n_bathrooms" id="n_bathrooms" value="{{$apartment->n_bathrooms}}">
                @error('n_bathrooms')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="n_floor" class="form-label">* Inserisci il numero di piani *</label>
                <input type="text" class="form-control" id="n_floor" name="n_floor" id="n_floor" value="{{$apartment->n_floor}}">
                @error('content')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price">* Inserisci prezzo *</label>
                <input type="text" name="price" id="price" value="{{$apartment->price}}">
                @error('price')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 d-flex">
                <label for="service">Servizi</label>
                    @foreach ($services as $service)
                        <input type="checkbox"
                        class="form-check"
                        id="service"
                        name="service[]"
                        value="{{$service->id}}"
                        title="Seleziona il service"
                        @if ($apartment->services->contains($service))
                            checked
                        @endif
                        >
                        <label for="services">
                            {{$service->name}}
                        </label>
                    @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Modifica l'appartamento</button>
            </div>
        </form>
</section>

@endsection
