@extends('layouts.app')

@section('content')
    <div class="container">
        

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            @auth
            @if (Auth::user()->id === $profile->user_id)

                <h1>Modifica il tuo Profilo: </h1>

                    <form 
                    action="{{ route('profile.update', $profile->id) }}"
                    enctype="multipart/form-data"
                    method="POST" 
                    id="updateProfileForm"
                    >

                        @csrf
                        @method('PUT')

                        <div class="shadow-sm card w-50 mx-auto mt-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label"><strong>Numero di Telefono</strong></label>
                                    <input required type="text" class="form-control" name="phone_number" id="phone_number"
                                        value="{{ $profile->phone_number }}">
                                </div>

                                <div class="mb-3">
                                    <label for="photo" class="form-label"><strong>Foto</strong></label>
                                    <input type="file" class="form-control" name="photo" id="photo"
                                        value="{{ $profile->photo }}" accept="image/*">
                                </div>
                                <div class="img">
                                @if(file_exists(storage_path('app/public/' . $profile->photo)))
                                    <img src="{{ asset('storage/' . $profile->photo) }}" class="card-img-top w-50 mx-auto" alt="Profile Photo">
                                @else
                                    <img src="{{ asset('img/' . $profile->photo) }}" class="card-img-top w-50 mx-auto" alt="Profile Photo 2">
                                @endif   
                                </div>

                                <div class="mb-3">
                                    <label for="curriculum" class="form-label"><strong>Curriculum</strong></label>
                                    <input type="file" class="form-control" name="curriculum" id="curriculum"
                                        accept=".pdf, .png, .jpg, .jpeg" value="{{ $profile->curriculum }}">

                                        <!-- GESTIONE FORMATI DIVERSI PER CURRICULUM -->
                                        @if(file_exists(storage_path('app/public/' . $profile->curriculum)))
                                            @if (Str::endsWith($profile->curriculum, '.pdf'))
                                                <embed src="{{ asset('storage/' . $profile->curriculum) }}" type="application/pdf" width="100%" height="450px"/>
                                            @elseif (Str::endsWith($profile->curriculum, ['.png', '.jpg', '.jpeg']))
                                                <img src="{{ asset('storage/' . $profile->curriculum) }}" alt="Curriculum" width="100%"  />
                                            @else
                                                <p>Formato del file non supportato</p>
                                            @endif
                                        @else
                                            @if (Str::endsWith($profile->curriculum, '.pdf'))
                                                <embed src="{{ asset('img/' . $profile->curriculum) }}" type="application/pdf" width="100%" height="450px"/>
                                            @elseif (Str::endsWith($profile->curriculum, ['.png', '.jpg', '.jpeg']))
                                                <img src="{{ asset('img/' . $profile->curriculum) }}" alt="Curriculum" width="100%"  />
                                            @else
                                                <p>Formato del file non supportato</p>
                                            @endif  
                                        @endif        
                                    
                                </div>

                                <div class="mb-3">
                                    <label for="plan_program" class="form-label"><strong>Programma</strong></label>
                                    <textarea required class="form-control" name="plan_program" id="plan_program">{{ $profile->plan_program }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="work_address" class="form-label"><strong>Indirizzo</strong></label>
                                    <input required type="text" class="form-control" name="work_address" id="work_address"
                                        value="{{ $profile->work_address }}">
                                </div>

                                <div class="techno mb-3">
                                    <h5>Specializzazioni:</h5>
                                    <div class="row">
                                        @foreach ($specializations as $specialization)
                                            <div class="col-md-6">
                                                <input 
                                                    type="checkbox" 
                                                    name="specialization_id[]"
                                                    value="{{ $specialization->id }}"
                                                    id="{{ 'specialization-' . $specialization -> id }}"
                                                    @foreach ($profile->specializations as $profile_specialization)
                                                    
                                                    @if ($specialization->id == $profile_specialization->id)
                                                    checked                                                
                                                    @endif 

                                                    @endforeach>
                                                
                                                <label 
                                                    for="{{ 'specialization-' . $specialization -> id }}"
                                                    class="checkbox-inline" 
                                                    id="spec-white">
                                                    {{ $specialization->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <p id="specializationError" style="color: red; display: none;">Seleziona almeno una specializzazione.</p>
                                </div>
                                <input class="my-1 btn mt-4 mx-auto" type="submit" value="Update" id="yellow">
                            </div>
                        </div>

                    </form>
            @else
                <h1>Ops! Si é verificato un errore!</h1>
            @endif
            @endauth
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#updateProfileForm').submit(function(e){

                if ($('input[name="specialization_id[]"]:checked').length === 0) {
                    $('#specializationError').show();
                    e.preventDefault();
                }
            });
        });
</script>


<style lang=scss scoped>
    .form-label strong {
        color: white;
        margin: auto;
    }

    .card-body {
        .mb-3 {
            margin: auto;
        }
    }

    .techno {
        h5 {
            color: white;
        }
    }

    #spec-white {
        color: white;
    }

    .container h1 {
        color: white;
        font-size: 30px;
    }

    .card-body {
        margin: auto;

        input {
            margin: auto;
        }

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
        background-color: black;
        border: none;
        padding: 0;


            ul {
                padding:0;
                list-style:none;
                background-color:black;

                li {
                    background-color: white;
                    font-size: 25px;
                    color: black;
                }
            }
    }
</style>
