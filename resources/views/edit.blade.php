@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit: </h1>
        @if ($errors->any())
            <div class="alert alert-danger">    
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST">

            @csrf
            @method('PUT')



            <label for="phone_number" class="form-label"><strong>Phone Number</strong></label>
            <input type="text" class="form-control" name="phone_number" id="phone_number" value="{{$profile->phone_number}}">
            <br>

            <label for="photo">photo</label>
            <input type="text" name="photo" id="photo" value="{{ $profile->photo }}">
            <br>

            <label for="curriculum">curriculum</label>
            <input type="text" name="curriculum" id="curriculum" value="{{ $profile->curriculum }}">
            <br>

            <label for="plan_program">plan_program</label>
            <input type="text" name="plan_program" id="plan_program" value="{{ $profile->plan_program }}">
            <br>

            <label for="work_address">Work Address</label>
            <input type="text" name="work_address" id="work_address" value="{{ $profile->work_address }}">
            <br>

            <input type="submit" value="Update">
        </form>
    </div>
@endsection
