@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit: </h1>
    <form method="POST">

        @csrf
        @method("PUT")

        <label for="name">Name</label>
        <input type="text" name="name" id="name"
        value="{{ $user -> name }}">
        <br>

        <label for="name">Email</label>
        <input type="text" name="email" id="email"
        value="{{ $user -> email }}">
        <br>

        <label for="name">Work Address</label>
        <input type="text" name="work_address" id="work_address"
        value="{{ $user -> work_address }}">
        <br>

        <input type="submit" value="Update">
    </form>
</div>
@endsection
