<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content= "{{ csrf_token() }}"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <title>Document</title>
<script>
    /*window.Laravel = {!! json_encode (['csrfToken' => csrf_token() ])!!};*/
</script>

</head>
<body>

<header>
    <div class="header-container">
        <div class="logo-container">
            <img class="logo img-responsive" src="https://genesis-buc.udes.edu.co/dist/img/logo_udes.png" alt="UDES Logo">
        </div>
        <div class="text-container">
            <h1 class="hidden-xs artemisa">Artemisa</h1>
            <h3 class="msl_lema hidden-xs">Sistema de formulario dinamico</h3>
            <h4 class="msl_lema hidden-xs ng-binding">Bucaramanga</h4>
        </div>
    </div>
</header>

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    Inicio
                </a>
                <a class="navbar-brand" href="{{ url('/pqrs') }}">
                    PQR
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest

                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

<main>
    @yield('content')
</main>  

<footer>
    <div class="footer-content">
        <p>
            Universidad de Santander - Sistemas de información
            <br>
            Todos los derechos reservados © 2016
            <br>
            Institución de Educación Superior sujeta a la inspección y vigilancia del Ministerio de Educación Nacional
        </p>
        <p style="display: none">
            Autores: <br>Alex Gutiérrez, Jorge Galvis, Carlos Rincón, Fabiola Martinez, Jorge Castañeda.
        </p>
        <span id="siteseal">
            <script async="" type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=5KFODfiXDXf97r2O9kN3V3IdFWmCixuTpafU29Iw9q1PtMuE7j1HuWqySL92"></script>
        </span>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src ="{{ asset('js/custom.js') }}" ></script>

</body>
</html>