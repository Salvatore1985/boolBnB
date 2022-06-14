@extends('layouts.app');

@section('content')
<div class="container w-75 mx-auto">
    <div class="row">
        {{-- Create Apartment Button --}}
        <div class="col-12 text-end">
            {{-- Enter route --}}
            <a href="{{route('user.apartments.create')}} "
            class="btn btn-sm btn-success">
                Add Apartment
            </a>
        </div>

        {{-- Delete Apartment Message --}}
        <div class="col-12">
            @if (session('delete-message'))
                <div class="alert alert-danger">
                    {{session('delete-message')}}
                </div>
            @endif
        </div>

        {{-- Apartment List Table --}}
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Address</th>
                        <th scope="col">number rooms</th>
                        <th scope="col">sqr. meters</th>
                        <th scope="col">price</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($apartments as $apartment)
                        <tr>
                            <th scope="row">{{$apartment->id}}</th>
                            <td>{{$apartment->address}}</td>
                            <td>{{$apartment->sqr_meters}}</td>
                            <td>{{$apartment->price}}</td>
                            <td>
                                {{-- add route apartment.show --}}
                                <a href="{{route('user.apartments.show', $apartment->id)}} " class="btn btn-primary">
                                    Read More
                                </a>
                            </td>

                            {{-- edit button apartments --}}
                            <td>
                                {{-- add route --}}
                                <a href="{{route('user.apartments.edit', $apartment)}} "
                                class="btn btn-warning">
                                    &#9998;
                                </a>
                            </td>
                            <td colspan="2">
                                {{-- add delete route --}}
                                <form action="{{route("user.apartments.destroy", $apartment)}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <h2>
                            You have no Apartments
                        </h2>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <div class="col-12 d-flex justify-content-center text-center p-3">
                {{$apartments->links()}}
            </div>
        </div>
    </div>
</div>

@endsection

