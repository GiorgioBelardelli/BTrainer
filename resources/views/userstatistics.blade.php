@extends('layouts.app')

@section('content')
    <div class="container bg">
        <h4 style="font-size: 2rem; padding-top: 5vh">Statistiche</h4>
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
                                @endif
                            @endauth
                        @else
                            <h1>Vuoi crearti un profilo da Trainer?</h1>
                            <button><a href="{{ route('profile.create') }}" class="btn">CREA PROFILO</a></button>
                        @endif

                        <div>
                            <div>
                                <h2 style="color: black">Recensioni per mese:</h2>
                                <ul style="color: black">
                                    <?php \Carbon\Carbon::setLocale('it'); ?>
                                    @foreach ($userProfile->reviews->groupBy(function ($review) {
            return \Carbon\Carbon::parse($review->date)->translatedFormat('F Y');
        }) as $month => $reviews)
                                        <li>{{ $month }}: {{ count($reviews) }} recensioni</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div>
                                <h2 style="color: black">Messaggi per mese:</h2>
                                <ul style="color: black">
                                    <?php \Carbon\Carbon::setLocale('it'); ?>
                                    @foreach ($userProfile->messages->groupBy(function ($message) {
            return \Carbon\Carbon::parse($message->date)->translatedFormat('F Y');
        }) as $month => $messages)
                                        <li>{{ $month }}: {{ count($messages) }} messaggi</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div>
                            <br>
                            <br>
                            <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const ctx2 = document.getElementById('myChart2');

            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto',
                        'Settembre', 'Ottobre', 'Novembre', 'Dicembre'
                    ],
                    datasets: [{
                        label: '# of Votes',
                        data: [{{ $votoGennaio }}, {{ $votoFebbraio }}, {{ $votoMarzo }},
                            {{ $votoAprile }}, {{ $votoMaggio }}, {{ $votoGiugno }},
                            {{ $votoLuglio }}, {{ $votoAgosto }}, {{ $votoSettembre }},
                            {{ $votoOttobre }}, {{ $votoNovembre }}, {{ $votoDicembre }},
                        ],
                        backgroundColor: 'rgba(255, 204, 0, 0.6)',
                        borderColor: '#FFCC00',
                        borderWidth: 3,
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

    @endsection

    <style lang=scss scoped>
        .bg {
            background-color: #FFCC00;
            border-radius: 10px;

        }

        .anno {
            display: none;
        }

        .mese {
            display: none;
        }

        .active {
            display: block;
        }


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
