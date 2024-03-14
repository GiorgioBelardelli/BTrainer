@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Name:
            {{ $profile->user->name }}

            {{ $profile->user->surname }}
        </h1>
        <p>
            Numero Cellulare:
            {{ $profile->phone_number }}
        </p>
        <p>
            Email:
            {{ $profile->user->email }}
        </p>
        <p>
            Foto:
            <img src="/img/{{ $profile->photo }}" alt="" width="200px">
        </p>
        <p>
            Indirizzo di lavoro:
            {{ $profile->work_address }}
        </p>

        <p>
            CV:
            <img src="{{ $profile->curriculum }}" alt="" width="200px">
        </p>
    </div>
@endsection
