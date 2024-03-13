@extends('layouts.app')

@section('content')
    <form action="{{ route('profile.store') }}" method="POST" class="container text-center">

        @csrf
        @method('POST')

        <div class="shadow-sm card w-50 mx-auto mt-4">
            <div class="card-body">
                <div class="mb-3">
                    <label for="phone_number" class="form-label"><strong>Phone Number</strong></label>
                    <input type="text" class="form-control" name="phone_number" id="phone_number"
                        placeholder="Inserisci phone_number">
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label"><strong>Photo</strong></label>
                    <input type="text" class="form-control" name="photo" id="photo"
                        placeholder="Inserisci photo">
                </div>

                <div class="mb-3">
                    <label for="curriculum" class="form-label"><strong>curriculum Utente</strong></label>
                    <input type="text" class="form-control" name="curriculum" id="curriculum"
                        placeholder="Inserisci curriculum">
                </div>

                <div class="mb-3">
                    <label for="plan_program" class="form-label"><strong>plan_program</strong></label>
                    <input type="text" class="form-control" name="plan_program" id="plan_program"
                        placeholder="Inserisci plan_program User">
                </div>

                <div class="mb-3">
                    <label for="work_address" class="form-label"><strong>Work Address Utente</strong></label>
                    <input type="text" class="form-control" name="work_address" id="work_address"
                        placeholder="Inserisci Work Address User">
                </div>

            </div>
        </div>

        <input class="my-1 btn btn-success mt-4" type="submit" value="Crea">
    </form>
@endsection
