@extends('app')

@section('title', 'login')

@section('content')

<div class="container px-0 pt-3">

    <div class="auth-card bg-light p-3 mx-auto rounded">

        <div class="text-center">
            <p class="text-secondary h5">{{ __('Login') }}</p>
        </div>

        @include('common.error')

        <div class="auth-card-body mx-auto">

            <form method="POST" action="{{ route('login') }}" class="mb-2">
                @csrf

                <div class="mb-2">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email Address') }}" value="{{ old('email') }}" autocomplete="email" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password">{{ __('Password') }}</label>
                    <input type="password" name="password" id="password" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Password') }}" autocomplete="current-password" required>
                </div>

                <div class="buttons">
                    <button type="submit" class="btn btn-primary rounded-pill w-100">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>

            <div class="mb-0 text-center auth-link">
                <a href="{{ route('register') }}" class="rounded-pill">{{ __('Register') }}</a>
            </div>

        </div>

    </div>

</div>


@endsection
