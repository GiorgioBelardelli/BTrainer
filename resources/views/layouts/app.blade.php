<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>B-Trainer</title>
    <!-- Importo Font-Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Importo Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm my-container">
            <div class="container ms-container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('http://localhost:5174/') }}">
                    <div class="logo">
                        <img src="{{ asset('img/header.svg') }}" alt="">
                    </div>
                </a>
                {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
                </button> --}}

                @auth
                <div id="modified">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto" id="left-nav">

                        {{-- Visibili solo in modalità Desktop  --}}

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('http://localhost:5174/') }}">{{ __('Home') }}</a>
                        </li>

                        <li class="nav-item desktop">
                            <a class="nav-link" href="{{ url('usermessages') }}">{{ __('Messaggi') }}</a>
                        </li>
                        <li class="nav-item desktop">
                            <a class="nav-link" href="{{ url('userreviews') }}">{{ __('Recensioni') }}</a>
                        </li>
                        <li class="nav-item desktop">
                            <a class="nav-link" href="{{ url('userstatistics') }}">{{ __('Statistiche') }}</a>
                        </li>
                        <li class="nav-item desktop">
                            <a class="nav-link" href="{{ url('editprofile') }}">{{ __('Modifica profilo') }}</a>
                        </li>
                        <li class="nav-item desktop">
                            <a class="nav-link" href="{{ url('sponsorship') }}">{{ __('Sponsor') }}</a>
                        </li>

                    </ul>
                </div>
                @endauth
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Effettua il Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="pad-zero">
                            <a class="dropdown-item" href="{{ url('dashboard') }}">{{ __('Dashboard') }}</a>
                            <a class="dropdown-item" href="{{ route('editprofile') }}">{{ __('Modifica il profilo') }}</a>

                            {{-- Visibili solo in modalità smartphone --}}
                            <a class="dropdown-item smartphone" href="{{ url('usermessages') }}">{{ __('Messaggi') }}</a>
                            <a class="dropdown-item smartphone" href="{{ url('userreviews') }}">{{ __('Recensioni') }}</a>
                            <a class="dropdown-item smartphone" href="{{ url('userstatistics') }}">{{ __('Statistiche') }}</a>

                            <a class="dropdown-item" href="{{ url('sponsorship') }}">{{ __('Sponsorizzazioni') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Esci') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
        <main class="">
            @yield('content')
        </main>
    </div>
</body>

</html>
<style lang="scss" scoped>
    @import "resources/scss/app.scss";

    .dropdown-item {
        --bs-dropdown-link-active-bg: #FFCC00;
    }

    .ms-container {
        padding-bottom: 15px;
        flex-wrap: nowrap;
    }

    #modified {
        display: flex;
        justify-content: space-between;
        flex-wrap: nowrap;
        align-items: center;
        margin: auto;
        flex-basis: 50%;
    }

    #left-nav {
        justify-content: space-between;
        align-items: center;
        flex-basis: 100%;
    }

    #desktop {
        display: block;
    }

    #left-nav li {
        padding: 30px;
    }

    body {
        background-size: cover;
    }

    .logo img {
        width: 100px;
        margin-top: 20px;
    }

    .navbar,
    .card-header {
        color: white;
    }

    .my-container {
        background-color: black;
    }

    /* Stili dei link in alto nella nav-bar  */
    li .nav-link {
        color: white;
    }

    li .nav-link:hover {
        color: #FFCC00;
    }

    #navbarDropdown:hover {
        color: #FFCC00;
    }

    a {
        text-decoration: none;
        font-weight: 500;
        background: url('{{ URL::asset(' img/bg-spec.png') }}');
    }

    @media all and (max-width: 900px) {
        #modified {
            flex-basis: 40%;
        }

        .desktop {
            display: none;
        }

        .navbar-nav {
            flex-basis: 25%;
        }
    }

    @media all and (max-width: 900px) {
        #modified {
            width: 50px;

            .desktop {
                display: none;
            }

            li {
                margin: auto;
            }
        }
    }

    @media all and (max-width: 576px) {

        #modified {
            width: 1px;
            display: none;
        }

        #pad-zero {
            /* overflow: hidden; */
        }

        .desktop {
            display: none;
        }

        /* .smartphone {
        display:block;
    } */

        .navbar-nav.ml-auto .dropdown-menu {
            position: absolute;
            right: 0;
            left: auto;
            top: 100%;
        }

        #pad-zero .smartphone {
            display: block;
        }
    }
</style>