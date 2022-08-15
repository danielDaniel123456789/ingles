<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="{{ asset('js/portada.js') }}" defer></script>
  <script src="{{ asset('js/rutas.js') }}" defer></script>
  <script src="{{ asset('js/table.js') }}" defer></script>

  
  <link href="{{ asset('css/portada.css') }}" rel="stylesheet">
  <link href="{{ asset('css/vista.css') }}" rel="stylesheet">
  <link href="{{ asset('css/canva.css') }}" rel="stylesheet">
  <script src="{{ asset('js/rutas.js') }}" defer></script>

  <script src="{{ asset('js/pronunciarTexto.js') }}" defer></script>
  <script type="text/javascript" src="{{ asset('js/deletrearPalabra.js') }}" defer></script>
     

     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  

   <!-- animate-->
   <link     rel="stylesheet"     href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"   />
  

   <!-- convertir texto a voz-->
   <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
 

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- OCULTAR DIV-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <title>Plus Ingles</title>
  <link rel="icon" href="/img/logo.png" />
  <link rel="icon" href="/favicon.ico?v=2" type="image/x-icon" />

</head>

<style>
  canvas{
    z-index: -9 !important;
  }
</style>

<body>
    <div id="app">
      <canvas id="canv"></canvas>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
