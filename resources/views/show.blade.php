@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                        @if(file_exists(public_path('/img/' . $profile->photo)))
                            <img src="/img/{{ $profile->photo }}" class="card-img-top w-50 mx-auto" alt="Profile Photo">
                        @else
                            <img src="{{ asset('storage/app/public/images' . $profile->photo) }}" class="card-img-top w-50 mx-auto" alt="Profile Photo">
                        @endif
                        <div class="card-body col-6 mx-auto">
                        <h1 class="card-title">
                            {{ $profile->user->name }}
                            {{ $profile->user->surname }}
                        </h1>
                        <div class="phone my-3">
                            <p class="card-text">Numero Cellulare: {{ $profile->phone_number }}</p>
                        </div>
                        <div class="mail my-3">
                            <p class="card-text">Email: {{ $profile->user->email }}</p>
                        </div>
                        <div class="address my-3">
                            <p class="card-text">Indirizzo di lavoro: {{ $profile->work_address }}</p>
                        </div>
                        <div class="specialization my-3">
                            <p class="card-text mb-0">Specialization:</p>
                            @foreach ($profile->specializations as $specialization)
                                <span class="badge bg-secondary my-0">{{ $specialization->name }}</span>
                            @endforeach
                        </div>
                        <div class="plan my-3">
                            <p class="card-text mb-0">Il mio programma:</p>
                            <p> {{ $profile->plan_program }}</p>
                        </div>
                        {{-- <div class="cv">
                            <h5 class="card-title">CV</h5>
                            <p>{{ $profile->curriculum }}.pdf</p>
                        </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
