@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('profile.create') }}" class="btn btn-primary mb-3">CREATE PROFILE</a>

    <h1>Profiles:</h1>
    <ul class="list-group">
        @foreach ($profiles as $profile)
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('profile.show', $profile->id) }}">
                    {{ $profile->user->name }} {{ $profile->user->surname }}
                </a>
                @auth
                @if (Auth::user()->id === $profile->user_id)
                <div class="btn-group" role="group">
                    <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-warning me-3">Modifica Profilo</a>
                    <form action="{{ route('profile.destroy', $profile->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ">Cancella Profilo</button>
                    </form>
                </div>
                @endif
                @endauth
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection
