@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    @if ($userProfile)
                    @auth
                    @if (Auth::user()->id === $userProfile->user_id)
                    {{-- <div class="offcanvas offcanvas-start" id="demo">
                        <div class="offcanvas-header">
                          <h1 class="offcanvas-title">Heading</h1>
                          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
                        </div>
                        <div class="offcanvas-body">
                          <p>Some text lorem ipsum.</p>
                          <p>Some text lorem ipsum.</p>
                          <button class="btn btn-secondary" type="button">A Button</button>
                        </div>
                      </div>
                      
                      <!-- Button to open the offcanvas sidebar -->
                      <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
                        Open Offcanvas Sidebar
                      </button>
                    <div class="img-card">
                        <img v-if="profile" :src="getImagePath(
                            `../assets/trainers/${profile.profile.photo}`
                        )
                            " :alt="profile.name + ' ' + profile.surname" />
                        <div class="caption" v-if="profile">
                            <!-- NOME COGNOME SPEC -->
                            <div class="name">
                                <h2>{{ profile.name }} {{ profile.surname }}</h2>
                            </div>
                            <div v-for="specialization in profile.profile
                            .specializations" :key="specialization" class="specializations">
                                <h3>{{ specialization }}</h3>
                            </div>
                            <div class="social">
                                <i class="fa-brands fa-facebook"></i>
                                <i class="fa-brands fa-instagram"></i>
                                <i class="fa-brands fa-x-twitter"></i>
                                <i class="fa-brands fa-tiktok"></i>
                                <i class="fa-regular fa-envelope"></i>
                            </div>
                        </div>
                    </div> --}}

                    <div class="dashboard-main">
                        <div class="messages">
                            <h4>Ultimi Messaggi</h4>
                            @php
                            $sortedMessages = $userProfile->messages->sortByDesc('date')->take(3);
                            @endphp

                            {{-- Box del Messaggio Singolo --}}
                            @foreach ($sortedMessages as $message)

                            <div class="single-msg">
                                

                                <div class="details">

                                    <div class="name"> {{ $message->name }} {{ $message->surname }}</div>

                                    <div class="date"> {{ \Carbon\Carbon::parse($message->date)->format('d/m/Y H:i') }}</div>

                                </div>

                                <div class="email"> {{ $message->email }}</div>

                                <div class="content">{{ $message->content }}</div>
                                
                            </div>

                            @endforeach

                            <a class="btn" href="{{ route('usermessages') }}">{{ __('Visualizza tutti i tuoi messaggi') }}</a>
                            
                        </div>
                        

                        <div class="reviews">
                            <h4>Ultime recensioni</h4>
                            @php
                            $sortedReviews = $userProfile->reviews->sortByDesc('date')->take(3);
                            @endphp
                            @foreach ($sortedReviews as $review)

                            {{-- Box della recensione singola  --}}

                            <div class="single-msg">
                                <div class="details">

                                    <div class="name"> {{ $review->name }} {{ $review->surname }}</div>
                                    <div class="date"> {{ \Carbon\Carbon::parse($review->date)->format('d/m/Y') }}</div>

                                </div>
                                
                                <div class="content"> {{ $review->content }}</div>
                            </div>

                            @endforeach
                            
                            <a class="btn" href="{{ url('userreviews') }}">{{ __('Visualizza tutte le tue recensioni') }}</a>
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
        .card {
            background-color: rgba(0, 0, 0, 0.76);
            .card-body {
                color: white;
                background-color: rgba(0, 0, 0, 0.9);
                .reviews,
                .messages,
                 {
                    margin-bottom: 20px;
                }
                .dashboard-main {
                    display: flex;
                    justify-content: space-between;

                    .single-msg {
                        margin-top: 30px;
                    }

                    .single-msg:hover {
                        color: yellow;
                    }
                    .messages, .reviews {
                        flex-basis:45%;
                        color: white;

                            .details {
                                display: flex;
                                width:75%;
                                justify-content: space-between;
                                margin-bottom: 5px;

                                .name ,.date {
                                    font-size: 16px;
                                    color: white;
                                    padding-top: 10px
                                }
                                .date {
                                    
                                    font-weight: 200
                                }
                            }

                        
                        .email {
                            font-weight: 200;
                            font-size: 15px;
                        }
                        .email, .content {
                            color: white;
                        }
                        .content {
                            margin-top: 10px;
                            width: 75%;
                        }
                    }

                    .btn {
                        margin-top: 50px;
                        padding: 8px;
                        border-radius: 5px;
                        color: black;
                        background-color: yellow;
                    }
                    .btn:hover {
                        transform: scale(1.01);
                    }
                }
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
                                font-size:55px;
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