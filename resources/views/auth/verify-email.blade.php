@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica il tuo indirizzo e-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Un nuovo link di verifica è stato inviato al tuo indirizzo e-mail.') }}
                    </div>
                    @endif

                    {{ __('Prima di procedere, controlla la tua e-mail per un link di verifica.') }}
                    {{ __('Non hai ricevuto la mail?') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('clicca qui per richiedere un nuovo invio') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
