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


                    @if ($userProfile)
                    @auth
                    @if (Auth::user()->id === $userProfile->user_id)
                    <div class="reviews">
                        <h1>Recensioni: </h1>
                        @php
                        $sortedReviews = $userProfile->reviews->sortByDesc('date');
                        @endphp
                        @foreach ($sortedReviews as $review)
                        <h3>Nome: {{ $review->name }} {{ $review->surname }}</h3>
                        <span>Data: {{ $review->date }}</span>
                        <br>
                        <span>Contenuto: {{ $review->content }}</span>
                        @endforeach
                    </div>
                    <div class="messages">
                        <h1>Messaggi ricevuti: </h1>
                        @php
                        $sortedMessages = $userProfile->messages->sortByDesc('date');
                        @endphp
                        @foreach ($sortedMessages as $message)
                        <h3>Nome: {{ $message->name }} {{ $message->surname }}</h3>
                        <span>E-mail: {{ $message->email }}</span>
                        <br>
                        <span>Data: {{ $message->date }}</span>
                        <br>
                        <span>Contenuto: {{ $message->content }}</span>
                        @endforeach
                    </div>
                    {{-- Verifica se l'utente ha un profilo --}}
                                    
                                    <div class="sponsorships">
                                        <h1>Vuoi essere nostro partner? ecco le Sponsorships che offriamo:</h1>
                                        <div class="card-container">
                                            @foreach ($sponsorships as $sponsorship)
                                            <div class="sponsorship-card">
                                                <div class="card-title">
                                                    <h4> {{ $sponsorship->name }} </h4>
                                                </div>
                                                <div class="card-info">
                                                    <strong>Durata: {{ $sponsorship->duration }} </strong>
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

        .card{

            .sponsorships{

                color: white;
                .card-container{

                    display: flex;
                    justify-content: space-around;
                    align-items: center;

                    .sponsorship-card{
                        border: 1px solid yellow;
                        background-color:white;
                        border-radius: 10px;
                        height: 200px;
                        width: 300px;
                        display: flex;
                        flex-direction: column;
                        justify-content: space-around;
                        align-items: center;
                        gap: 10px;

                        .card-title{
                            background-color: white;
                            border-bottom: 1px solid yellow;       
                        }
                        .card-info {
                            background-color: white;
                        }
                        .card-button  {

                                a {
                                    color: black;
                                    background-color:yellow;
                                    padding: 8px;
                                    border: 1px solid black;
                                    border-radius: 5px;

                                }
                                a:hover {
                                    transform:translate(1.1);
                                }
                            
                        }
                    }
                        
                }
            }
        }
    
</style>
