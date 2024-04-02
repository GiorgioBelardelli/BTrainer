@extends('layouts.app')

@section('content')
<div class="container-fluid ms-sponsorship">
    <h2 class="">
        {{ __('Sponsorship: ') }}
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

                    <div class="sponsorships">
                        <div class="row card-container">
                            @foreach ($sponsorships as $sponsorship)
                            <div class="col-md-4 sponsorship-card">
                                <div class="card-title">
                                    <h4> {{ $sponsorship->name }} </h4>
                                </div>
                                <div class="card-info">
                                    <p><i class="fa-regular fa-clock"></i> {{ $sponsorship->duration }}h</p>
                                    <br>
                                    <p><i class="fa-solid fa-sack-dollar"></i> {{ $sponsorship->price }} €</p>
                                </div>
                                <div class="card-button text-center btn">

                                    <a href="{{ route('sponsorship.checkout', $sponsorship->id)}}">
                                        ACQUISTA
                                    </a>

                                </div>
                            </div>
                            @endforeach
                        </div>

                        @php
                            $nextActiveSponsorship = $userProfile->sponsorships()->max('expire_date');
                            // Verifica se la data di scadenza è nel futuro
                            $isFuture = \Carbon\Carbon::parse($nextActiveSponsorship)->isFuture();
                            // Formatta la data di scadenza
                            $expireDate = \Carbon\Carbon::parse($nextActiveSponsorship)->format('d/m/Y');
                        @endphp
                        
                        <div class="text-center">
                            <br>

                            @if ($nextActiveSponsorship)
                            @if ($isFuture)
                            <h3>La tua sponsorizzazione é in scadenza il:</h3>
                            <h3>{{ $expireDate }}</h3>
                            @else
                            <h3>Non hai attualmente sponsorizzazioni attive.</h3>
                            @endif
                            @else
                            <h3>Attualmente non hai sponsorizzazioni attive.</h3>
                            @endif
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

    <script>
        export default {
            data() {
                return {
                    imageUrl: 'public\img\PTrainer2.jpeg'
                };
            }
        };
    </script>
    <style lang=scss scoped>
        .card-header {
            color: white;
        }



        .card-body {
            background-color: #5A5A5A;
            height: auto;
        }

        .ms-sponsorship {
            background-color: #FFCC00;
            padding: 10vh;
            height: auto;

        }

        .btn:hover {
            transition: 0.5s;
            transform: scale(1.1);
        }

        .btn:not(:hover) {
            transform: scale(1);
            transition: 0.5s;
        }

        .card {

            .sponsorships {

                h4 {
                    text-align: center;
                }


                .card-container {

                    display: flex;
                    justify-content: space-around;
                    align-items: center;
                    margin-top: 30px;

                    .sponsorship-card {
                        border: 1px solid yellow;
                        background-color: white;
                        border-radius: 15px;
                        height: 300px;
                        width: 300px;
                        display: flex;
                        flex-direction: column;
                        justify-content: space-around;
                        align-items: center;
                        margin-bottom: 20px;
                        gap: 10px;
                        box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;

                        .sponsorship-card:hover {
                            transform: scale(1.1);
                        }

                        .card-title {
                            font-style: italic;
                            border-bottom: 1px solid black;

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