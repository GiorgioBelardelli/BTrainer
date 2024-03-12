@extends('layouts.app')

@section('content')
    <form action="{{ route('user.store') }}" method="POST" class="container text-center">

        @csrf
        @method('POST')

        <div class="shadow-sm card w-50 mx-auto mt-4">
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label"><strong>Nome Utente</strong></label>
                    <input type="text" class="form-control" name="name" id="name"
                        placeholder="Inserisci Nome User">
                </div>

                <div class="mb-3">
                    <label for="surname" class="form-label"><strong>Cognome Utente</strong></label>
                    <input type="text" class="form-control" name="surname" id="surname"
                        placeholder="Inserisci Cognome User">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label"><strong>Email Utente</strong></label>
                    <input type="text" class="form-control" name="email" id="email"
                        placeholder="Inserisci email User">
                </div>

                <div class="mb-3">
                    <label for="work_address" class="form-label"><strong>Work Address Utente</strong></label>
                    <input type="text" class="form-control" name="work_address" id="work_address"
                        placeholder="Inserisci Work Address User">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label"><strong>Password Utente</strong></label>
                    <input type="text" class="form-control" name="password" id="password"
                        placeholder="Inserisci password User">
                </div>
            </div>
        </div>

        <input class="my-1 btn btn-success mt-4" type="submit" value="Crea">
    </form>
@endsection
