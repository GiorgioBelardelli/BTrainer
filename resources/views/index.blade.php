@extends('layouts.app')

@section('content')
<<<<<<< HEAD

<a href="{{route('user.create')}}">CREA USER</a>

=======
<div class="container">
    <h1>Users:</h1>
>>>>>>> 08936ad44da7b200c0c4c70cd5981fafdb0be45d
<ul>
        @foreach ($users as $user)
            <li>
                <a href="{{ route('user.show', $user -> id) }}">
                {{ $user -> name}}
                </a>
                <a href="{{ route('user.edit', $user -> id) }}">Edit</a>
            </li>
        @endforeach
    </ul>
    </div>
@endsection
