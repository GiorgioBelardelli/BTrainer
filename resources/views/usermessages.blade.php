@extends('layouts.app')

@section('content')
<div class="container ms-container-5">

    {{-- <div class="messages">
                        <h4>I tuoi Messaggi:</h4>
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
</div> --}}

{{-- Tutti i messaggi dell'utente --}}
<h4>I tuoi messaggi: </h4>
<div class="messages">

    <div class="all-messages">
        @php
        $sortedMessages = $userProfile->messages->sortByDesc('date');
        @endphp

        {{-- Box del Messaggio Singolo --}}
        @foreach ($sortedMessages as $message)

        <div class="single-msg">


            <div class="details">

                <div class="name-date">
                    <div class="name"><i class="fa-regular fa-user"></i> {{ $message->name }} {{ $message->surname }}</div>

                    <p class="date"><i class="fa-solid fa-calendar-days"></i> {{ \Carbon\Carbon::parse($message->date)->format('d/m/Y H:i') }}</p>
                </div>

                <div class="email"><i class="fa-regular fa-envelope"></i> {{ $message->email }}</div>



            </div>


            <div class="content"><i class="fa-solid fa-pen-nib"></i> {{ $message->content }}</div>

        </div>

        @endforeach
    </div>

</div>
@endsection

<style lang="scss" scoped>
    .all-messages {
        padding: 5vh;
    }

    .ms-container-5 {
        background-color: #FFCC00;
        padding: 5vh;

        h4 {
            font-size: 2rem;
        }
    }

    .name-date {
        display: flex;
        justify-content: space-between;
    }

    .card {
        padding: 5vh;
    }

    .messages {
        flex-basis: 48%;
        color: white;
        background-color: #5A5A5A;


        .single-msg {
            padding: 3vh 3vw 3vh 1vw;
            border: #FFCC00 1px solid;
            border-radius: 15px;
            margin-bottom: 2vh;


            .email {
                line-height: 34px;
                font-weight: 100;
            }

            .email,
            .content {
                color: white;
                margin: auto;
            }

            .content {
                margin-top: 10px;
                margin: auto;
            }

            .details {
                margin: auto;

                .name,
                .date {
                    font-size: 16px;
                    color: white;
                    line-height: 34px;
                }

                .name {}

            }
        }
    }
</style>