@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Users:</h1>
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
