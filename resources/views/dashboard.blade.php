@extends('layouts.app')

@section('content')
<div class="container-fluid ms-container-4">
    <h2>
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

        <div class="row dashboard-main">
            <div class="col-md-12 messages">
                <h4>Ultimi Messaggi</h4>
                @php
                $sortedMessages = $userProfile->messages->sortByDesc('date')->take(3);
                @endphp

                {{-- Box del Messaggio Singolo --}}
                @foreach ($sortedMessages as $message)

                <div class="single-msg">


                    <div class="details">

                        <div class="name"><i class="fa-regular fa-user"></i> {{ $message->name }} {{ $message->surname }}</div>

                        <div class="date"><i class="fa-solid fa-calendar-days"></i> {{ \Carbon\Carbon::parse($message->date)->format('d/m/Y H:i') }}</div>

                    </div>

                    <div class="email"><i class="fa-regular fa-envelope"></i> {{ $message->email }}</div>

                    <div class="content"><i class="fa-solid fa-pen-nib"></i> {{ $message->content }}</div>

                </div>

                @endforeach

                
            </div>


            <div class="col-md-12 reviews">
                <h4>Ultime recensioni</h4>
                @php
                $sortedReviews = $userProfile->reviews->sortByDesc('date')->take(3);
                @endphp
                @foreach ($sortedReviews as $review)

                {{-- Box della recensione singola  --}}

                <div class="single-msg">
                    <div class="details">

                        <div class="name"><i class="fa-regular fa-user"></i> {{ $review->name }} {{ $review->surname }}
                        </div>



                        <div class="date"><i class="fa-solid fa-calendar-days"></i> {{ \Carbon\Carbon::parse($review->date)->format('d/m/Y') }}</div>

                    </div>

                    <div class="content"><i class="fa-solid fa-pen-nib"></i> {{ $review->content }}</div>
                </div>

                @endforeach

            </div>
        </div>



        @endif
        @endauth
        @else
        <h1>Vuoi crearti un profilo da Trainer?</h1>
        <a id="create-button" class="btn" href="{{ route('profile.create') }}">Crea profilo</a>
        @endif

    </div>
</div>
</div>
</div>
@endsection


<style lang=scss scoped>
    #create-button {
        padding: 8px;
        border-radius: 5px;
        color: black;
        background-color: #FFCC00;
        margin-top: 50px;
    }

    #create-button:hover {
        transition: 0.5s;
        transform: scale(1.1);
    }

    #create-button:not(:hover) {
        transform: scale(1);
        transition: 0.5s;
    }

    .ms-container-4 {
        background-color: #FFCC00;
        padding: 5vh;
        height: auto;
    }

    .card {
        border-radius: 15px;


        .card-body {
            color: white;
            background-color: #5A5A5A;
            padding: 5vh;


            .reviews,
            .messages {
                margin-bottom: 20px;
            }

            .single-msg {
                margin-top: 10px;
                border: #FFCC00 1px solid;
                padding: 10px;
                border-radius: 15px;
            }

            .dashboard-main {
                display: flex;
                justify-content: space-between;

                .single-msg:hover {
                    color: #FFCC00;
                }

                .messages,
                .reviews {
                    color: white;

                    .details {
                        display: flex;
                        width: 100%;
                        justify-content: space-between;

                        .name,
                        .date {
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

                    .email,
                    .content {
                        color: white;
                    }

                    .content {
                        margin-top: 10px;
                        width: 75%;
                    }
                }

                .btn {
                    margin-top: 20px;
                    padding: 8px;
                    border-radius: 5px;
                    color: black;
                    background-color: #FFCC00;
                    margin-bottom: 50px;
                }

                .btn:hover {
                    transition: 0.5s;
                    transform: scale(1.1);
                }

                .btn:not(:hover) {
                    transform: scale(1);
                    transition: 0.5s;
                }
            }
        }
    }

    button {
        background-color: #FFCC00;
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
                    border: 1px solid #FFCC00;
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
                            font-size: 55px;
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