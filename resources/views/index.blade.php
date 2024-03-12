@extends('layouts.app')

@section('content')

<a href="{{route('user.create')}}">CREA USER</a>

<ul>
        @foreach ($users as $user)
            <li>
                <a href="">
                    {{ $user -> name}}
                </a>
                {{ $user -> surname}}
                {{ $user -> email}}
                {{ $user -> work_address}}
                {{ $user -> password}}
            </li>
        @endforeach
    </ul>
@endsection
