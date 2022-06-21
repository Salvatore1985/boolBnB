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
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <th scope="row">{{$user->name}}</th>
                            <td>{{$user->surname}}</td>
                            <td>{{$user->email}}</td>
                            <td colspan="2">
                                <form action="{{ route('user.users.destroy', $user) }}" method="POST"
                                    class="user-destroyer" user-name="{{ ucfirst($user->title) }}"
                                    onclick="return confirm('Sei sicuro di voler eliminare {{ $user->name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-md btn-delete btn-outline-danger" type="submit">
                                        &#10008; Elimina
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <h2>
                            You have no Posts
                        </h2>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
