@extends('layouts.app')

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
            @if (session('alert-message'))
                <div class="alert alert-{{session('alert-type')}}">
                    {{session('alert-message')}}
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
                        <th scope="col">Read More</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Is Visible</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($apartments as $apartment)
                        <tr>
                            <th scope="row">{{$apartment->id}}</th>
                            <td>{{$apartment->sqr_meters}}</td>
                            <td>{{$apartment->n_rooms}}</td>
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
                            <td>
                                {{-- delete form --}}
                                <form action="{{route('user.apartments.destroy', $apartment)}}" method="POST" class="apartment-destroyer" apartment-name="{{ucfirst($apartment->title)}}"
                                onclick="return confirm('Sei sicuro di voler eliminare {{$apartment->title}}?')">
                                    @csrf
                                    @method('DELETE')
                                        <button class="btn btn-md btn-delete btn-outline-danger" type="submit">
                                            &#10006;
                                        </button>
                                </form>

                            </td>
                            <td>{{$apartment->is_visible}}</td>

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

