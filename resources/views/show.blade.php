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
            {{ $profile->photo }}
        </p>
        <p>
            Indirizzo di lavoro:
            {{ $profile->work_address }}
        </p>

        <p>
            CV:
            {{ $profile->curriculum }}
        </p>
    </div>
@endsection
