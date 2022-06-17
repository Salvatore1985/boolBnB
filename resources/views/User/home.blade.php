@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">

        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>
                        Ciao {{ Auth::user()->name }}
                    </h1>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Login effettuato con successo!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
