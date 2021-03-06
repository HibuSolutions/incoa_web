<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('../public/favicon.ico')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>INCOA</title>


    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
  <link href="{{asset('panel/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  
</head>
<body>
    <div id="app">
        @section('nav')
        <nav class="navbar navbar-expand-md navbar-dark color shadow-sm cel" >
            <div class="container">
                <a class="navbar-brand" href="{{route('inicio')}}">
                    INCOA
                </a>


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
            
                        <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Acceder </a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Registro <i class="fas fa-user"></i></a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item">
                    <a class="nav-link active" href="{{route('inicio')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link " href="{{ route('miperfil') }}">Perfil</a>
                    </li>
                    <li class="nav-item">
                   
                    </li>
                    <li class="nav-item">
                    <a class="nav-link " href="{{route('verNotas')}}">Notas</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link " href="{{url('desarrolladores')}}">info</a>
                    </li>
                    </li>
                    @can('panel')
                    <li class="nav-item">
                    <a class="nav-link " href="{{ route('panelAdministrativo') }}"><i class="text-light fas fa-laptop-code"></i> Panel Administrativo</a>
                    </li>
                    @endcan
                    <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><img width="10" src="{{asset('img/ui/online.png')}}">
                    {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('miperfil')}}">
                    <i class="fas fa-user"></i> Mi perfil
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Cerrar Session
                    </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
                    </div>
                    </li>
                    @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <nav class="navbar navbar-expand-md navbar-dark color shadow-sm pc " >
            <div class="container" >
                <a class="navbar-brand" href="{{route('inicio')}}">
                    INCOA-WEB
                </a>
                @guest

                @else
                <a class="navbar-brand" href="{{ url('/') }}"><i class="fas fa-globe-americas"></i></a>
                <a class="navbar-brand" href="{{ route('miperfil') }}"><i class="fas fa-user"></i></a>

                <a class="navbar-brand " href="{{ url('verNotas') }}"><i class="fas fa-clipboard"></i></a>

                @endguest
                    
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
            
                        <!-- Authentication Links -->
                    @guest
            
                    @else
                   
                    @can('panel')
                    <li class="nav-item">
                    <a class="nav-link " href="{{ route('panelAdministrativo') }}"><i class="text-light fas fa-laptop-code"></i> Panel Administrativo</a>
                    </li>
                    @endcan

                    <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><img width="10" src="{{asset('img/ui/online.png')}}">
                    {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('miperfil')}}">
                    <i class="fas fa-user"></i> Mi perfil
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Cerrar Session
                    </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
                    </div>
                    </li>
                    @endguest
                    </ul>
                </div>
            </div>
        </nav>




        @show
        <main class="py-4 ">
            @yield('content')
        </main>
    </div>
  <link rel="stylesheet" type="text/javascript" href="{{asset('js/codigo.js')}}">

  <script src="{{asset('vendor/jquery/jquery.slim.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
