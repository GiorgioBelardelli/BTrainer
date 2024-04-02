@extends('layouts.app')

@section('content')
<div id="new-container" class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Form di registrazione') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- Input del nome  --}}

                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- input del cognome  --}}

                        <div class="mb-4 row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Cognome') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ 'YEahhhhhh' }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Qui l'utente inserisce l'e-mail  --}}

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: white"> </strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Qui l'utente inserisce la password  --}}

                        <div class="mb-4 row">
                            <label for="password" required class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <span id="password-length-error" class="invalid-feedback" role="alert" style="display: none;">
                                    <strong style="color: white;">La password deve essere lunga almeno 8 caratteri.</strong>
                                </span>

                                {{-- Qui viene verificata la corrispondenza delle due password richiamando il metodo che c'è nello script --}}

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ 'Le password devono corrispondere'}}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Input conferma password  --}}

                        <div class="mb-4 row">
                            <label for="password-confirm" required class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <span id="password-confirm-error" class="invalid-feedback" role="alert" style="display: none;">
                                    <strong style="color: white;">Le password devono corrispondere</strong>
                                </span>
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn">
                                    {{ __('Registrati') }}
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('password').addEventListener('input', function() {
            var password = this.value;
            var passwordLengthError = document.getElementById('password-length-error');

            if (password.length < 8) {
                passwordLengthError.style.display = 'block';
            } else {
                passwordLengthError.style.display = 'none';
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('password-confirm').addEventListener('input', function() {
            var passwordConfirm = this.value;
            var passwordConfirmError = document.getElementById('password-confirm-error');

            if (passwordConfirm.length < 8) {
                passwordConfirmError.style.display = 'block';
            } else {
                passwordConfirmError.style.display = 'none';
            }
        });
    });

    // Questo metodo verifica che nella mail sia presente la @

    document.addEventListener('DOMContentLoaded', function() {
        var emailInput = document.getElementById('email');
        var emailError = document.getElementById('email-error');

        emailInput.addEventListener('input', function() {
            var email = this.value;

            if (!emailInput.includes('@')) {
                emailError.style.display = 'block';
            } else {
                emailError.style.display = 'none';
            }
        });
    });

    // Questo metodo verifica la corrispondenza delle due password 

    document.addEventListener('DOMContentLoaded', function() {
        var passwordInput = document.getElementById('password');
        var passwordConfirmInput = document.getElementById('password-confirm');
        var passwordConfirmError = document.getElementById('password-confirm-error');

        passwordConfirmInput.addEventListener('input', function() {
            var password = passwordInput.value;
            var passwordConfirm = this.value;

            if (password !== passwordConfirm) {
                passwordConfirmError.style.display = 'block';
            } else {
                passwordConfirmError.style.display = 'none';
            }
        });
    });
</script>

</script>

<style lang=scss scoped>
    #new-container {
        background-color: #FFCC00;
        padding-top: 50px;
        height: auto;
        padding-bottom: 50px;
    }

    .nav-item .nav-link:hover {
        color: white;
    }

    form .btn {
        color: black;
        background-color: #FFCC00;
    }

    form .btn:hover {
        transform: scale(1.1);
        color: black;
        background-color: #FFCC00;
        transition: 0.5s;
    }

    form .btn:not(:hover) {
        transform: scale(1);
        transition: 0.5s;
    }


    strong {
        color: white;
    }
</style>