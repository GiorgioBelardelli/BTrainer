@extends('layouts.app')

@section('content')
<div class="container">
<h1>Name:
    {{$profile ->user -> name}}
</h1>
<p>
    Email:
    {{$profile ->user -> email}}
</p>
<p>
    Indirizzo di lavoro:
    {{$profile -> work_address}}
</p>
</div>
@endsection
