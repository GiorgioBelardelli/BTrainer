@extends('layouts.app')

@section('content')
<div class="container">
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
                        {{-- <button type="submit" class="btn btn-danger ">Cancella Profilo</button> --}}
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

    .container h1 {
        color:white;
    }
    .list-group {
        .list-group-item {
        background-color: #5a5a5a;
        padding-bottom: 0;
    }
    }
    .container {
        margin-bottom: 50px;
    }
    .container .btn {
            color:black;
            background-color: yellow;
            margin-top: 25px;
        }

    .container .btn:hover {
        transform:scale(1.1);
        color:black;
        background-color: yellow;
    }
    ul li div a {
        color: yellow;
    }

    .button-cont {
        display:flex;
        justify-content: flex-end;
        align-items: center;



            #yellow-button {
            color:black;
            background-color: yellow;
            text-decoration: none;
            padding: 6px;
            margin: 0;
            border-radius: 5px;
        }

        #yellow-button:hover {
            transform: scale(1.1);
        }
    }


</style>
