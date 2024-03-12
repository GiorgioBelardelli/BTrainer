@extends('layouts.app')

@section('content')
<div class="container">
<h1>Name: 
    {{$user -> name}}
</h1>
<p>
    Email: 
    {{$user -> email}}
</p>
<p>
    Indirizzo di lavoro: 
    {{$user -> work_address}}
</p>
</div>
@endsection
