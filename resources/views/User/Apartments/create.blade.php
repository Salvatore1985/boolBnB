@extends('layouts.createPage')

@section('form-content')
    <div class=" p-3 ">
        <section class="container ">
            <form class="text-center bg-light  rounded p-5" action="{{ route('user.apartments.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="title" class="form-label">Titolo dell' appartamento</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" placeholder="* campo richiesto" value="{{ old('title') }}" />
                        @error('title')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address" class="form-label">La via</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                            id="address" placeholder="* campo richiesto" value="{{ old('address') }}" />
                        @error('address')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="n_floor" class="form-label"> Numero dei piani</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="n_floor"
                            name="n_floor" placeholder="* campo richiesto" value="{{ old('n_floor') }}" />
                        @error('n_floor')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                {{--  --}}
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="n_rooms" class="form-label "> Numero delle stanze</label>
                        <input type="text" class="form-control @error('n_rooms') is-invalid @enderror" name="n_rooms"
                            id="n_rooms" placeholder="* campo richiesto" value="{{ old('n_rooms') }}"
                            placeholder="* campo richiesto" />
                        @error('n_rooms')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="sqr_meters" class="form-label">Metri dell'appartamento</label>
                        <input type="text" class="form-control @error('sqr_meters') is-invalid @enderror" id="sqr_meters"
                            name="sqr_meters" placeholder="* campo richiesto" value="{{ old('sqr_meters') }}" />
                        @error('sqr_meters')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="n_beds" class="form-label">Numero dei letti</label>
                        <input type="text" class="form-control @error('n_beds') is-invalid @enderror" name="n_beds"
                            id="n_beds" placeholder="* campo richiesto" value="{{ old('n_beds') }}" />
                        @error('n_beds')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                {{--  --}}
                <div class="form-group col-md-3">

                </div>
                <div class="form-group ">
                    <label for="description" class="form-label">Descrizione dell'appartamento</label>
                    <textarea rows="1.5" class="form-control  @error('description') is-invalid @enderror" name="description"
                        id="description" placeholder="* campo richiesto" value="{{ old('description') }}">
                    {{ old('description') }}
                </textarea>
                    @error('description')
                        <div class="text-start invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="n_bathrooms" class="form-label">Il numero dei bagni</label>
                        <input type="text" class="form-control @error('n_bathrooms') is-invalid @enderror"
                            id="n_bathrooms" name="n_bathrooms" placeholder="* campo richiesto"
                            value="{{ old('n_bathrooms') }}" />
                        @error('n_bathrooms')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <div class="col-sm-2">Servizi</div>
                        <div class="col-sm-10 text-left h-50 overflow-auto">
                            @foreach ($services as $service)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck1" name="service[]"
                                        value="{{ $service->id }}">
                                    <label class="form-check-label" for="gridCheck1">
                                        {{ $service->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <fieldset class="form-group col-md-3">
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="is_visible" id="is_visible"
                                        value="1" checked>
                                    <label class="form-check-label" for="is_visible">
                                        App. disponibile
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="is_visible" id="is_visible"
                                        value="0">
                                    <label class="form-check-label" for="gridRadios2">
                                        App. non disponibile
                                    </label>
                                </div>

                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group col-md-3">
                        <label for="price" class="form-label">Inserisci il prezzo</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                            id="price" placeholder="* campo richiesto" value="{{ old('price') }}" />
                        @error('price')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mt-5">
                            <button type="submit" class="btn btn-primary col-md-12">Pubblica il tuo appartamento</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
