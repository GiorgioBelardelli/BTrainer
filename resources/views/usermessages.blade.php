@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('messages') }}
    </h2>
        <div class="messages">
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
        </div>
    @endsection


<style lang=scss scoped>
        .card-header {
            color: white;
        }

        .card {
            .card-body {
                color: white;

                .reviews, .messages, .sponsorship {
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

        .card{

            .sponsorships{

                color: white;
                .card-container{

                    display: flex;
                    justify-content: space-around;
                    align-items: center;
                    margin-top: 50px;

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

                    .sponsorship-card:hover {
                        transform:scale(1.1);
                    }

                        .card-title{
                            background-color: white;
                            font-style: italic;
                            border-bottom: 1px solid black;
                            
                            h4 {
                                background-color:white;
                            }
                        }
                        .card-info {
                            background-color: white;

                            strong { 
                                background-color: white;
                            }
                        }
                        .card-button  {

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
