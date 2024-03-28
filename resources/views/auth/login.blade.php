@extends('layouts.app')

@section('content')
<div class="container-fluid ms-container-login">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="email" class="label-login col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="label-login col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="label-login form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="label-login form-check-label" for="remember">
                                        {{ __('Ricordami') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn">
                                    {{ __('Effettua il Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Password dimenticata?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<style lang=scss scoped>
    @use '../styles/partials/variables' as *;

    .ms-container-login {
        background-color: #FFCC00;
        height: 100vh;
        padding-top: 5vh;
    }

    .label-login {
        color: black;
    }

    strong {
        color: white;
    }

    form .btn {
        color: black;
        background-color: #FFCC00;
        margin: 0 10px 0 0;
    }


    .nav-item .nav-link:hover {
        color: white;
    }

    form .btn:hover {
        transform: scale(1.1);
        transition: 0.5s;
        color: black;
        background-color: #FFCC00;
    }

    form .btn:not(:hover) {
        transform: scale(1);
        transition: 0.5s;
    }

    form ul li a:hover {
        color: yellow;
    }

    label {
        color: white;
    }
</style>