@extends('layouts.createPage')

@section('form-content')
    <div class="background-image-form height-main-form p-3 h-100">
        <section class="container ">
            <form class="text-center bg-light rounded p-5" action="{{ route('admin.services.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                {{-- Apartment name --}}
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="name" class="form-label">
                            Titolo dell' appartamento *
                        </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="* campo richiesto" value="{{ old('name') }}" required
                            autocomplete="on" autofocus minlength="2">

                        @error('name')
                            <div class="text-start invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary col-md-12">Pubblica il tuo appartamento</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection

