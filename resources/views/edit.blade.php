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
    <form method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="shadow-sm card w-50 mx-auto mt-4">
            <div class="card-body">
                <div class="mb-3">
                    <label for="phone_number" class="form-label"><strong>Numero di Telefono Number</strong></label>
                    <input required type="text" class="form-control" name="phone_number" id="phone_number" value="{{$profile->phone_number}}">
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label"><strong>Foto</strong></label>
                    <input required type="file" class="form-control" name="photo" id="photo" value="{{ $profile->photo }}" accept="image/*">
                </div>

                <div class="mb-3">
                    <label for="curriculum" class="form-label"><strong>Curriculum</strong></label>
                    <input required type="file" class="form-control" name="curriculum" id="curriculum" accept=".pdf, .png, .jpg, .jpeg" value="{{ $profile->curriculum }}">
                </div>

                <div class="mb-3">
                    <label for="plan_program" class="form-label"><strong>Programma</strong></label>
                    <textarea class="form-control" name="plan_program" id="plan_program">{{ $profile->plan_program }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="work_address" class="form-label"><strong>Indirizzo</strong></label>
                    <input required type="text" class="form-control" name="work_address" id="work_address" value="{{ $profile->work_address }}">
                </div>

                <div class="techno mb-3">
                    <h5>Specializzazioni:</h5>
                    <div class="row">
                        @foreach ($specializations as $specialization)
                        <div class="col-md-6">
                            <input required type="checkbox" name="specialization_id[]" value="{{ $specialization->id }}" @foreach ($profile->specializations as $profile_specialization)
                            @if ($specialization->id == $profile_specialization->id)
                            checked
                            @endif
                            @endforeach
                            >
                            <label class="checkbox-inline"> {{ $specialization->name }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <input class="my-1 btn btn-success mt-4 mx-auto" type="submit" value="Update">
            </div>
        </div>

    </form>
</div>
@endsection