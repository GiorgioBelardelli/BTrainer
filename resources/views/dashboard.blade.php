@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('La Tua Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('La tua Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Ora sei loggato!!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style lang=scss scoped>

    .card-header {
        color: white;
    }
    .card {
        .card-body {
        color:white;
    }
    }

    
    

</style>
