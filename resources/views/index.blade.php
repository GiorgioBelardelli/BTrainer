@extends('layouts.app')

@section('content')
<div class="container my-2-container">
    {{-- <a href="{{ route('profile.create') }}" class="btn mb-3">CREA PROFILO</a> --}}

    <h1>I nostri profili:</h1>
    <ul class="list-group">
        @foreach ($profiles as $profile)
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('profile.show', $profile->id) }}">
                    {{ $profile->user->name }} {{ $profile->user->surname }}
                </a>
                @auth
                @if (Auth::user()->id === $profile->user_id)
                <div class="button-cont" role="group">
                    <a href="{{ route('profile.edit', $profile->id) }}" class="me-3" id="yellow-button">Modifica</a>
                    <form action="{{ route('profile.destroy', $profile->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        {{-- <button type="submit" class="btn btn-danger ">Cancella Profilo</button>  --}}
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

<style lang=scss scoped>
    .d-flex {
        padding-bottom: 8px;

    }

    .my-2-container {

        background-color: #FFCC00;
        padding: 5vh 10vw;
    }

    .container h1 {
        color: white;
    }

    .list-group {
        .list-group-item {
            background-color: #5A5A5A;
            padding-bottom: 0;
        }
    }

    .container {
        margin-bottom: 50px;
    }

    .container .btn {
        color: black;
        background-color: #FFCC00;
        margin-top: 25px;
    }

    .container .btn:hover {
        transform: scale(1.1);
        color: black;
        background-color: #FFCC00;
    }

    ul li div a {
        color: white;
    }

    ul li div a:hover {
        color: #FFCC00;
        transition-duration: 0.5s;
    }

    .button-cont {
        display: flex;
        justify-content: flex-end;
        align-items: center;



        #yellow-button {
            color: black;
            background-color: #FFCC00;
            text-decoration: none;
            padding: 6px;
            margin: 0;
            border-radius: 5px;
        }

        #yellow-button:hover {
            transform: scale(1.1);
            transition-duration: 0.5s;
        }
    }
</style>