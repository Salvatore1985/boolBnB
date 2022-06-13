@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            {{-- phone_n --}}
                            <div class="form-group row">
                                <label for="phone_n"
                                    class="col-md-4 col-form-label text-md-right">{{ __('phone_n') }}</label>

                                <div class="col-md-6">
                                    <input id="phone_n" type="string"
                                        class="form-control @error('phone_n') is-invalid @enderror" name="phone_n"
                                        value="{{ old('phone_n') }}" required autocomplete="phone_n" max="10">

                                    @error('phone_n')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- date_of_birth --}}
                            <div class="form-group row">
                                <label for="date_of_birth"
                                    class="col-md-4 col-form-label text-md-right">{{ __('date_of_birth') }}</label>

                                <div class="col-md-6">
                                    <input id="date_of_birth" type="date"
                                        class="form-control @error('date_of_birth') is-invalid @enderror"
                                        name="date_of_birth" value="{{ old('date_of_birth') }}" required
                                        autocomplete="date_of_birth">

                                    @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- userName --}}
                            <div class="form-group row">
                                <label for="userName"
                                    class="col-md-4 col-form-label text-md-right">{{ __('userName') }}</label>

                                <div class="col-md-6">
                                    <input id="userName" type="text"
                                        class="form-control @error('userName') is-invalid @enderror" name="userName"
                                        value="{{ old('userName') }}" required autocomplete="userName">

                                    @error('userName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- profile_photo --}}
                            <div class="form-group row">
                                <label for="profile_photo"
                                    class="col-md-4 col-form-label text-md-right">{{ __('profile_photo') }}</label>

                                <div class="col-md-6">
                                    <input id="profile_photo" type="text"
                                        class="form-control @error('profile_photo') is-invalid @enderror"
                                        name="profile_photo" value="{{ old('profile_photo') }}" required
                                        autocomplete="profile_photo">

                                    @error('profile_photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- user_address --}}
                            {{-- <div class="form-group row">
                                <label for="user_address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('user_address') }}</label>

                                <div class="col-md-6">
                                    <input id="user_address" type="text"
                                        class="form-control @error('user_address') is-invalid @enderror" name="user_address"
                                        value="{{ old('user_address') }}" required autocomplete="user_address">

                                    @error('user_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
