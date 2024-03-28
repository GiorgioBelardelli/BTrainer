@extends('layouts.app')

@section('content')
<div class="container-fluid ms-container-5">
    <h4>Le tue recensioni: </h4>
    <div>
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
                    @php
                    $sortedReviews = $userProfile->reviews->sortByDesc('date');
                    @endphp
                    @foreach ($sortedReviews as $review)

                    {{-- Box della recensione singola  --}}

                    <div class="single-review">
                        <div class="details">

                            <div class="date-name">
                                <div class="name"><i class="fa-regular fa-user"></i> {{ $review->name }} {{ $review->surname }}</div>
                                <div class="date"><i class="fa-solid fa-calendar-days"></i> {{ \Carbon\Carbon::parse($review->date)->format('d/m/Y') }}</div>
                            </div>

                        </div>

                        <div class="content"><i class="fa-solid fa-pen-nib"></i> {{ $review->content }}</div>
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
    @endsection


    <style lang=scss scoped>
        .date-name {
            display: flex;
            justify-content: space-between;
        }

        .ms-container-5 {
            background-color: #FFCC00;
            padding: 5vh;
            height: 100vh;

            h4 {
                font-size: 2rem;
            }
        }

        .card-body {
            background-color: #5A5A5A;
        }

        .reviews {
            margin: auto;
            color: black;


            p {
                color: white;
            }

            .single-review {
                padding: 3vh 3vw 3vh 1vw;
                border: #FFCC00 1px solid;
                border-radius: 15px;
                margin-bottom: 2vh;

            }


            .details {
                margin-bottom: 5px;
                margin: auto;

                .name,
                .date {
                    font-size: 16px;
                    color: white;
                }

                .date {
                    font-weight: 200;
                }
            }

            .content {
                margin: auto;
                color: white;
            }
        }
    </style>