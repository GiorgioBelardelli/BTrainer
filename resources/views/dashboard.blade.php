@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{ __('You are logged in!') }}

                    {{-- Verifica se l'utente ha un profilo --}}
                    @if (!$userProfile)
                    <h1>Vuoi crearti un profilo da Trainer?</h1>
                    <button><a href="{{ route('profile.create') }}" class="btn">CREA PROFILO</a></button>
                    @endif

                </div>
            </div>
        </div>
    </div>
    @endsection


    <style lang=scss scoped>
        .card-header {
            color: white;
        }

        .card {
            .card-body {
                color: white;
            }
        }

        button {
            background-color: yellow;
        }
    </style>