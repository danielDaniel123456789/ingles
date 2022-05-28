<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ingles') }}</title>

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
      <script src="{{ asset('js/canvas.js') }}" defer></script>

  
      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
    
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('css/vista.css') }}" rel="stylesheet">
      <link href="{{ asset('css/efectosVista.css') }}" rel="stylesheet">
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


</head>
<body>
    <div id="app">
    
        <main class="">
            @yield('content')
        </main>
    </div>
</body>
</html>
