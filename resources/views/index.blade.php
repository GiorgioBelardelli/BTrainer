@extends('layouts.app')

@section('content')
    <a href="{{ route('profile.create') }}">CREA PROFILE</a>

    <div class="container">
        <h1>Profiles:</h1>
        <ul>
            @foreach ($profiles as $profile)
                <li>
                    <a href="{{ route('profile.show', $profile->id) }}">
                        {{ $profile->user->name }}
                    </a>
                    <a href="{{ route('profile.edit', $profile->id) }}">Edit</a>

                    <form action="{{ route('profile.destroy', $profile->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="DELETE">
                    </form>

                </li>
            @endforeach
        </ul>
    </div>
@endsection
