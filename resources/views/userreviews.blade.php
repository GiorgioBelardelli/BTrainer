@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">

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
                                        <h4>Le tue recensioni</h4>
                                        @php
                                        $sortedReviews = $userProfile->reviews->sortByDesc('date');
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

        .card {
            margin-top: 100px;
        }
            .reviews {
                width: 75%;
                margin: auto;
                color: white;

                h4 {
                    font-size:35px;
                    text-align:center;
                }

                .single-msg {
                    margin-top: 30px;
                    color: white;
                    text-align:center;
                }

                .single-msg:hover {
                    color: yellow;
                }

                .details {
                    display: flex;
                    width: 75%;
                    justify-content: center;
                    gap: 25px;
                    margin-bottom: 5px;
                    margin: auto;
                    text-align: center;

                    .name,
                    .date {
                        font-size: 16px;
                        color: white;
                        padding-top: 10px;
                    }

                    .date {
                        font-weight: 200;
                    }
                }

                .content {
                    font-size: 24px;
                    text-align: center;
                    margin-top: 10px;
                    margin: auto;
                    color: white;
                    width: 75%;
                }
            }


    </style>
