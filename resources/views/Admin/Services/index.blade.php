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
            <a href="{{ route('admin.services.create') }} " class="btn btn-sm btn-success">
                Aggiungi un servizio
            </a>
        </div>

        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Servizio</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($services as $service)
                        <tr>
                            <th scope="row">{{$service->name}}</th>
                            <td colspan="1">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.services.edit', $service) }} "class="btn btn-warning">
                                        &#9998; Modifica
                                    </a>
                                <form action="{{ route('user.users.destroy', $service) }}" method="POST"
                                    class="service-destroyer" service-name="{{ ucfirst($service->name) }}"
                                    onclick="return confirm('Sei sicuro di voler eliminare {{ $service->name }}?')">
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
    <div class="col-12">
        <div class=" d-flex justify-content-center text-center p-3">
            {{ $services->links() }}
        </div>
    </div>
</div>
@endsection
