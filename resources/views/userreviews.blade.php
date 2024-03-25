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
                                            // dd($userProfile);
                                        @endphp
                                        @foreach ($sortedReviews as $review)
                                            <h3>Nome: {{ $review->name }} {{ $review->surname }}</h3>
                                            <span>Data: {{ $review->date }}</span>
                                            <br>
                                            <span>Contenuto: {{ $review->content }}</span>
                                            <br>
                                            <span>Valutazione ricevuta: {{ $review->vote }}</span>
                                        @endforeach
                                    </div>
                                @endif
                            @endauth
                        @else
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
