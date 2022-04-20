@extends('layouts.app')

@section('content')

<div class="container px-0 pt-3">

    <div class="auth-card bg-light p-3 mx-auto rounded">

        <div class="text-center">
            <p class="text-secondary h5">{{ __('Register') }}</p>
        </div>

        @include('common.error')

        <div class="auth-card-body mx-auto">

            <form method="POST" action="{{ route('register') }}" class="mb-2">
                @csrf

                <div class="mb-2">
                    <label for="name">{{ __('Name') }}</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ __('Name') }}">
                </div>

                <div class="mb-2">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('Email Address') }}">
                </div>

                <div class="mb-2">
                    <label for="password">{{ __('Password') }}</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password" placeholder="{{ __('Password') }}">
                </div>

                <div class="mb-3">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input type="password" name="password_confirmation" id="password-confirm" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                </div>

                <div class="buttons">
                    <button type="submit" class="btn btn-primary rounded-pill w-100">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>

            <div class="mb-0 text-center auth-link">
                <a href="{{ route('login') }}" class="rounded-pill">{{ __('Login') }}</a>
            </div>

        </div>

    </div>

</div>

@endsection
