@extends('layouts.app')

@section('content')
<div class="container my-container-3">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card" id="card-black">
                @if(file_exists(storage_path('app/public/' . $profile->photo)))
                <img src="{{ asset('storage/' . $profile->photo) }}" class="card-img-top w-50 mx-auto" alt="Profile Photo">
                @else
                <img src="{{ asset('img/' . $profile->photo) }}" class="card-img-top w-50 mx-auto" alt="Profile Photo 2">
                @endif
                <div class="card-body col-10 mx-auto" id="sub-card">
                    <h1 class="card-title" id="grey">
                        {{ $profile->user->name }}
                        {{ $profile->user->surname }}
                    </h1>
                    <div class="phone my-3">
                        <p class="card-text"><i class="fa-solid fa-phone"></i> {{ $profile->phone_number }}</p>
                    </div>
                    <div class="mail my-3">
                        <p class="card-text"><i class="fa-solid fa-envelope"></i> {{ $profile->user->email }}</p>
                    </div>
                    <div class="address my-3">
                        <p class="card-text"><i class="fa-regular fa-map"></i> {{ $profile->work_address }}</p>
                    </div>
                    <div class="specialization my-3">
                        <p class="card-text mb-0">Specializzazione:</p>
                        @foreach ($profile->specializations as $specialization)
                        <span class="badge bg-secondary my-0">{{ $specialization->name }}</span>
                        @endforeach
                    </div>
                    <div class="plan my-3">
                        <p class="card-text mb-0">Il mio programma:</p>
                        <p> {{ $profile->plan_program }}</p>
                    </div>
                    <!-- GESTIONE FORMATI DIVERSI PER CURRICULUM -->
                    @if(file_exists(storage_path('app/public/' . $profile->curriculum)))
                    @if (Str::endsWith($profile->curriculum, '.pdf'))
                    <embed src="{{ asset('storage/' . $profile->curriculum) }}" type="application/pdf" width="100%" height="450px" />
                    @elseif (Str::endsWith($profile->curriculum, ['.png', '.jpg', '.jpeg']))
                    <img src="{{ asset('storage/' . $profile->curriculum) }}" alt="Curriculum" width="100%" />
                    @else
                    <p>Formato del file non supportato</p>
                    @endif
                    @else
                    @if (Str::endsWith($profile->curriculum, '.pdf'))
                    <embed src="{{ asset('img/' . $profile->curriculum) }}" type="application/pdf" width="100%" height="450px" />
                    @elseif (Str::endsWith($profile->curriculum, ['.png', '.jpg', '.jpeg']))
                    <img src="{{ asset('img/' . $profile->curriculum) }}" alt="Curriculum" width="100%" />
                    @else
                    <p>Formato del file non supportato</p>
                    @endif
                    @endif

                </div>
            </div>
        </div>
    </div>
    @endsection

    <style lang=scss scoped>
        .my-container-3 {
            background-color: #FFCC00;
            padding-top: 5vh;
        }

        #card-black {
            color: white;
            background-color: #5a5a5a;
            padding: 5vh 5vw;
        }

        #sub-card * {
            color: white;

        }
    </style>