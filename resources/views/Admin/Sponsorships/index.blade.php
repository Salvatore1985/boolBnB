@extends('layouts.app')
@section('content')
<div class="container w-75 mx-auto">
    <div class="row">
        <div class="col-12">
            @if (session('delete-message'))
                <div class="alert alert-danger">
                    {{session('delete-message')}}
                </div>
            @endif
        </div>
        <div class="col-12 text-end my-4">
            <a href="{{ route('user.sponsorships.create') }} " class="btn btn-sm btn-success">
                Aggiungi un sponsorizzazione
            </a>
        </div>

        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">nome</th>
                        <th scope="col">periodo</th>
                        <th scope="col">prezzo</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sponsorships as $sponsorship)
                        <tr>
                            <th scope="row">{{$sponsorship->name}}</th>
                            <th scope="row">{{$sponsorship->period}}</th>
                            <th scope="row">{{$sponsorship->price}}</th>
                            <td colspan="1">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('user.sponsorships.edit', $sponsorship) }} "class="btn btn-warning">
                                        &#9998; Modifica
                                    </a>
                                <form action="{{ route('user.sponsorships.destroy', $sponsorship) }}" method="POST"
                                    class="sponsorship-destroyer" sponsorship-name="{{ ucfirst($sponsorship->name) }}"
                                    onclick="return confirm('Sei sicuro di voler eliminare {{ $sponsorship->name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-md btn-delete btn-outline-danger" type="submit">
                                        &#10008; Elimina
                                    </button>
                                </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <h2>
                            Non ci sono servizi
                        </h2>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
