<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
      <script src="{{ asset('js/table.js') }}" defer></script>
      <script src="{{ asset('js/cargarContenido.js') }}" defer></script>
      <script src="{{ asset('js/mensajes.js') }}" defer></script>
      <script src="{{ asset('js/axios.js') }}" defer></script>
      <script src="{{ asset('js/pronunciarTexto.js') }}" defer></script>
      <script src="{{ asset('js/rutas.js') }}" defer></script>
  
  
  
      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
    
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('css/vista.css') }}" rel="stylesheet">
  
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
    
   <!-- animate-->
      <link     rel="stylesheet"     href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"   />
  
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  
    <!-- convertir texto a voz-->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<style>
    body{
        background-color: #212121 !important;
    }
</style>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md text-white ">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    PLUS INGLES
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
         
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto  ">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">LOGIN</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">REGISTER</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-link"  >
                                <a id="navbarDropdown"  href="#" role="button" >
                                    {{ Auth::user()->name }}
                                </a>

                            </li>
                            
                         <li class="nav-link" >
                                <a  href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 Cerrar Sesion
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>

                            </li>

                          
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
