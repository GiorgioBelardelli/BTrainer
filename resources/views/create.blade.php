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

<form action="{{ route('profile.store') }}" method="POST" class="container-fluid text-center" enctype="multipart/form-data" id="createProfileForm">

    @csrf
    @method('POST')

    <div id="form-create" class="shadow-sm card w-50 mx-auto">
        <div class="card-body">
            <div class="mb-3">
                <label for="phone_number" class="form-label">Numero di Telefono</label>
                <input required type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Aggiungi numero di telefono">
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Foto</label>
                <input required type="file" class="form-control" name="photo" id="photo" placeholder="Aggiungi foto" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="curriculum" class="form-label">Curriculum</label>
                <input required type="file" class="form-control" name="curriculum" id="curriculum" placeholder="Aggiungi curriculum">
            </div>

            <div class="mb-3">
                <label for="plan_program" class="form-label">Programma</label>
                <textarea required class="form-control" name="plan_program" id="plan_program" placeholder="Aggiungi programma"></textarea>
            </div>

            <div class="mb-3">
                <label for="work_address" class="form-label">Indirizzo</label>
                <input required type="text" class="form-control" name="work_address" id="work_address" placeholder="Aggiungi indirizzo">
            </div>

            <div class="specializations mb-3">
                <b style="color: white;">Specializzazioni:</b>
                <div class="row">
                    @foreach ($specializations as $specialization)
                    <div class="col-md-6 text-start">
                        <input type="checkbox" name="specialization_id[]" value="{{ $specialization->id }}">
                        <label class="checkbox-inline"> {{ $specialization->name }}</label>
                    </div>
                    @endforeach
                </div>
                <p id="specializationError" style="color: red; display: none;">Seleziona almeno una specializzazione.</p>
            </div>
            <input required class="my-1 btn mt-4 mx-auto" type="submit" value="Crea" id="yellow">
        </div>
    </div>

</form>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#createProfileForm').submit(function(e) {

            if ($('input[name="specialization_id[]"]:checked').length === 0) {
                $('#specializationError').show();
                e.preventDefault();
            }
        });
    });
</script>

<style lang=scss scoped>
    #form-create {}

    #createProfileForm {
        background-color: #FFCC00;
        padding-top: 50px;
        padding-bottom: 50px;
        height: auto;
    }

    #spec-white {
        color: white;
    }

    .card-body {
        #yellow {
            color: black;
            background-color: #FFCC00;
        }

        #yellow:hover {
            transform: scale(1.1);
            transition: 0.5s;
        }

        #yellow:not(:hover) {
            transform: scale(1);
            transition: 0.5s;
        }

    }

    .alert-danger {
        margin: auto;
        width: 30%;
        background-color: #5a5a5a;
        border: none;
        padding: 0;


        ul {
            padding: 0;
            margin: 0;
            list-style: none;
            background-color: #5a5a5a;

            li {
                padding: 0;
                margin: 0;
                background-color: white;
                font-size: 15px;
                color: black;
            }
        }
    }
</style>