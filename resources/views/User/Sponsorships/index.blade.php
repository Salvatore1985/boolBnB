@extends('layouts.app')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Sponsorizzazioni</h1>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope='col'>Durata (Ore)</th>
                <th scope='col'>Prezzo (&euro;)</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sponsorships as $sponsorship)
                <tr>
                    <td>{{ $sponsorship->id }}</td>
                    <td>{{ $sponsorship->name }}</td>
                    <td> {{ $sponsorship->duration }}</td>
                    <td> {{ $sponsorship->price }}</td>
                    <td class="d-flex justify-content-end">
                        {{-- <a href="{{ route('admin.sponsorships.show', $sponsorship->id) }}" class="btn btn-primary">Vai</a> --}}
                        <a href="{{ route('admin.payments.index', ['apartment' => $apartment->id, 'sponsorship' => $sponsorship->id]) }}" class="btn btn-secondary mx-2">Acquista</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Non ci sono sponsorizzazioni</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection