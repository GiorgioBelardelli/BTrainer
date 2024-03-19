@extends('layouts.app')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('profile.store') }}" method="POST" class="container text-center" enctype="multipart/form-data">

    @csrf
    @method('POST')

    <div class="shadow-sm card w-50 mx-auto mt-4">
        <div class="card-body">
            <div class="mb-3">
                <label for="phone_number" class="form-label"><strong>Numero di Telefono</strong></label>
                <input required type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Aggiungi numero di telefono">
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label"><strong>Foto</strong></label>
                <input required type="file" class="form-control" name="photo" id="photo" placeholder="Aggiungi foto" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="curriculum" class="form-label"><strong>Curriculum</strong></label>
                <input required type="file" class="form-control" name="curriculum" id="curriculum" placeholder="Aggiungi curriculum">
            </div>

            <div class="mb-3">
                <label for="plan_program" class="form-label"><strong>Programma</strong></label>
                <textarea required class="form-control" name="plan_program" id="plan_program" placeholder="Aggiungi programma"></textarea>
            </div>

            <div class="mb-3">
                <label for="work_address" class="form-label"><strong>Indirizzo</strong></label>
                <input required type="text" class="form-control" name="work_address" id="work_address" placeholder="Aggiungi indirizzo">
            </div>

            <div class="specializations mb-3">
                <b>Specializzazioni:</b>
                <div class="row">
                    @foreach ($specializations as $specialization)
                    <div class="col-md-6 text-start">
                        <input type="checkbox" name="specialization_id[]" value="{{ $specialization->id }}">
                        <label class="checkbox-inline"> {{ $specialization->name }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
            <input required class="my-1 btn mt-4 mx-auto" type="submit" value="Create" id="yellow">
        </div>
    </div>

</form>
@endsection

<style lang=scss scoped>
    .form-label strong {
        color: white;
    }

    .checkbox-inline {
        color: white;
    }

    #spec-white {
        color: white;
    }

    .card-body {
        #yellow {
            color: black;
            background-color: yellow;
        }

        #yellow:hover {
            transform: scale(1.1);
        }

    }

    .alert-danger  {
        margin: auto;
        width: 50%;
        background-color: #5a5a5a;
        border: none;
        padding: 0;


            ul {
                padding:0;
                list-style:none;
                background-color:#5a5a5a;

                li {
                    background-color: white;
                    font-size: 25px;
                    color: black;
                }
            }
    }
</style>