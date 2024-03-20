@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('La tua Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{ __('Sei Loggato!') }}

                    {{-- Verifica se l'utente ha un profilo --}}
                    @if (!$userProfile)
                    <h1>Vuoi crearti un profilo da Trainer?</h1>
                    <button><a href="{{ route('profile.create') }}" class="btn">CREA PROFILO</a></button>
                    @endif

                    @auth
                    @if (Auth::user()->id === $userProfile->user_id)
                    <div class="reviews">
                        <h1>Recensioni: </h1>
                        @php
                        $sortedReviews = $userProfile->reviews->sortByDesc('date');
                        @endphp
                        @foreach ($sortedReviews as $review)
                        <h3>Nome: {{ $review->name }}</h3>
                        <span>Data: {{ $review->date }}</span>
                        <br>
                        <span>Contenuto: {{ $review->content }}</span>
                        @endforeach
                    </div>
                    @endif

                    @endauth

                    @auth
                    @if (Auth::user()->id === $userProfile->user_id)
                    <div class="messages">
                        <h1>Messaggi ricevuti: </h1>
                        @php
                        $sortedMessages = $userProfile->messages->sortByDesc('date');
                        @endphp
                        @foreach ($sortedMessages as $message)
                        <h3>Nome: {{ $message->name }}</h3>
                        <span>E-mail: {{ $message->email }}</span>
                        <br>
                        <span>Data: {{ $message->date }}</span>
                        <br>
                        <span>Contenuto: {{ $message->content }}</span>
                        @endforeach
                    </div>
                    @endif

                    @endauth

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

        .reviews {
            color: white;

            span {
                color: white;
            }
        }

        .messages {
            color: white;

            span {
                color: white;
            }
        }

        button {
            background-color: yellow;
        }
    </style>