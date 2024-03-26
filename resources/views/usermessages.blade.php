@extends('layouts.app')

@section('content')
<div class="container">

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

        <div class="messages">
            <h4>Tutti  i tuoi  Messaggi</h4>
            @php
            $sortedMessages = $userProfile->messages->sortByDesc('date');
            @endphp

            {{-- Box del Messaggio Singolo --}}
            @foreach ($sortedMessages as $message)

            <div class="single-msg">
                

                <div class="details">

                    <div class="name"> {{ $message->name }} {{ $message->surname }}</div>

                    <div class="email"> {{ $message->email }}</div>

                    <div class="date"> {{ \Carbon\Carbon::parse($message->date)->format('d/m/Y H:i') }}</div>

                </div>


                <div class="content">{{ $message->content }}</div>
                
            </div>

            @endforeach
            
        </div>
    @endsection

    <style lang="scss" scoped>

        .card {
            text-align: center;
        
            .card-body {
                color: white;
                text-align: center;
            }
        }
        
        .messages {
            flex-basis: 48%;
            color: white;
            text-align: center;
            margin-bottom: 50px;

            h4 {
            font-size: 35px;
        }
        
            .single-msg {
                margin-top: 50px;
                
                
                .email {
                    text-align: center;
                    line-height: 34px;
                    font-weight:100;
                }
        
                .email, .content {
                    color: white;
                    text-align: center;
                    margin: auto;
                }
        
                .content {
                    margin-top: 10px;
                    width: 60%;
                    margin: auto;
                }

                .details {
                    display: flex;
                    max-width: 40%;
                    margin: auto;
                    justify-content: center;
                    align-items: center;
                    gap: 15px;
                    margin-bottom: 5px;
                    text-align: center;
        
                    .name, .date {
                        font-size: 16px;
                        color: white;
                        text-align: center;
                        line-height: 34px;
                    }

                    .name {
                        width: fit-content;
                    
                    }
        
            }
        }
        
        </style>
        
        