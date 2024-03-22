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
                    {{-- {{ __('Sei Loggato!') }} --}}


                    @if ($userProfile)
                    @auth
                    @if (Auth::user()->id === $userProfile->user_id)
                    <div class="reviews">
                        <h4>Le tue Recensioni: </h4>
                        @php
                        $sortedReviews = $userProfile->reviews->sortByDesc('date');
                        @endphp
                        @foreach ($sortedReviews as $review)
                        <h3>Nome: {{ $review->name }} {{ $review->surname }}</h3>
                        <span>Data: {{ \Carbon\Carbon::parse($review->date)->format('d/m/Y') }}</span>
                        <br>
                        <span>Contenuto: {{ $review->content }}</span>
                        @endforeach
                    </div>
                    <div class="messages">
                        <h4>I tuoi Messaggi: </h4>
                        @php
                        $sortedMessages = $userProfile->messages->sortByDesc('date');
                        @endphp
                        @foreach ($sortedMessages as $message)
                        <h3>Nome: {{ $message->name }} {{ $message->surname }}</h3>
                        <span>E-mail: {{ $message->email }}</span>
                        <br>
                        <span>Data: {{ \Carbon\Carbon::parse($message->date)->format('d/m/Y H:i') }}</span>
                        <br>
                        <span>Contenuto: {{ $message->content }}</span>
                        @endforeach
                    </div>
                    {{-- Verifica se l'utente ha un profilo --}}

                    <div class="sponsorships">
                        <h4>Accedi alle nostre Sponsorships:</h4>
                        <div class="card-container">
                            @foreach ($sponsorships as $sponsorship)
                            <div class="sponsorship-card">
                                <div class="card-title">
                                    <h4> {{ $sponsorship->name }} </h4>
                                </div>
                                <div class="card-info">
                                    <strong>Durata: {{ $sponsorship->duration }}h</strong>
                                    <br>
                                    <strong> A soli: {{ $sponsorship->price }} €</strong>
                                </div>
                                <div class="card-button text-center">

                                    <a href="{{ route('sponsorship.checkout', $sponsorship->id)}}">
                                        ACQUISTA
                                    </a>

                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    @endif
                    @endauth
                    @else
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

                .reviews,
                .messages,
                .sponsorship {
                    margin-bottom: 20px;
                }
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

        .card {

            .sponsorships {

                color: white;

                .card-container {

                    display: flex;
                    justify-content: space-around;
                    align-items: center;
                    margin-top: 50px;

                    .sponsorship-card {
                        border: 1px solid yellow;
                        background-color: white;
                        border-radius: 10px;
                        height: 200px;
                        width: 300px;
                        display: flex;
                        flex-direction: column;
                        justify-content: space-around;
                        align-items: center;
                        gap: 10px;

                        .sponsorship-card:hover {
                            transform: scale(1.1);
                        }

                        .card-title {
                            background-color: white;
                            font-style: italic;
                            border-bottom: 1px solid black;

                            h4 {
                                background-color: white;
                            }
                        }

                        .card-info {
                            background-color: white;

                            strong {
                                background-color: white;
                            }
                        }

                        .card-button {

                            a {
                                color: white;
                                background-color: black;
                                padding: 8px;
                                border: 1px solid black;
                                border-radius: 5px;

                            }

                            a:hover {
                                filter: opacity(0.8);

                            }

                        }
                    }

                }
            }
        }
    </style>