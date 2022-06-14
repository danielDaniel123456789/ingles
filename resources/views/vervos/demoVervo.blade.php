
@extends('layouts.appVista')

@section('content')

<!--
@if(session("exito"))
<x-exito/>
@endif


@if(session("error"))
<x-error/>
@endif
-->
<canvas id="canv"></canvas>
@php
    
    $animaciones = array(
      "animate__bounce", "animate__flash",
     "animate__shakeX", "animate__shakeX",
     "animate__tada", "animate__tada", "animate__jello", "animate__heartBeat",
     "animate__bounceIn", "animate__bounceInDown", "animate__fadeInDown",
     "animate__fadeInUp", "animate__fadeInUp", "animate__flipInY",
      "animate__rotateIn", "animate__rotateInDownLeft", "animate__rotateInUpLeft",
      "animate__rotateInUpRight"
     );

     $colores = array(
      "#B71C1C","#880E4F","#4A148C","#311B92", "#0D47A1","#01579B", "#006064",
      "#1B5E20", "#827717", "#F57F17", "#BF360C"
     );

      $animacion=  $animaciones[array_rand($animaciones)] ;
      $color=  $colores[array_rand($colores)] ;
@endphp
@foreach ($data as $item)   
<?php   
$id=$item->id;  $palabraIngles=$item->ingles;  
$palabraEspayol=$item->espayol; 
$idActual= $item->id; 
$imagen=$item->imagen; 
$tamayoImagen=strlen($imagen);
$ancho=$item->ancho; 
if(isset($item->prioridad)){
 $prioridad= $item->prioridad;
}
else {
 $prioridad='000';
}

?>   
@endforeach



<div id="pantalla">
  <div class="configuracion">
    <a   onclick="direccionarVista('configuracion')">  <i style="color:{{$color}};  " class="configuracionHover fa fa-cogs fa-2x" aria-hidden="true"></i> </a>
  <br>  <br>
    <a  href="javascript:direccionarVista('historial')"><i style="color:{{$color}};" class="configuracionHover fa fa-check-square-o fa-2x" aria-hidden="true"></i></a>
  </div>

  <div onclick="aprendidaEvento()"  class="aprendidaPosicion"  >
    <div id="textoAprendidaEfecto" >
       <i style="color:{{$color}}"   class=" fa fa-check-square-o fa-2x" aria-hidden="true"></i>
    </div> 
  
  </div>
  
  <div class=" container p-5 ">

     <div class="d-flex justify-content-center ">
      <div class="wave animate__animated {{$animacion}}" onmouseover="cambiarPalabraEspayol()" onmouseout="cambiarPalabraIngles()">
        <a  href="#" onclick="direccionarGoogle()">
         <h1  class="tituloPrincipal" id="cambiarPalabra" style="color:{{$color}}">¿{{ucwords($palabraIngles)}}?</h1>
        </a>
      </div>
  </div>
  
    <div class="d-flex justify-content-center">
      @if ($tamayoImagen>0)
      <div  >
        <img 
        class="wave  animate__animated {{$animacion}} colorImagenVista" 
        onclick="direccionarGoogle()" src="{{$imagen}}" width="{{$ancho}}px"  />     
     
      </div>
     @endif
  
    
    </div>
  
    <div class="d-flex justify-content-center ">
      <div class="wave animate__animated {{$animacion}} " onmouseover="cambiarPalabraEspayol()" onmouseout="cambiarPalabraIngles()">
        <a  href="#" onclick="direccionarGoogle()">
         <h4   style="color:{{$color}}">{{ucwords($palabraEspayol)}}</h4>
        </a>
      </div>
  
      
    </div>
  
  </div>
  <form id="myForm" style="display: none" method="post" action="{{ route('formAprendida') }}"  >
    @csrf
    <input type="text" name="id_prioridad" value="{{$prioridad}}">
    <input type="text" name="id_vervo" value="{{$id}}">
    <input type="text" name="nivel"  value="1">
    <button type="submit" class="btn btn-primary">Listo</button>
  </form>
  
  

  <div class="footer">
    <div class="container">
  
      <ul class="nav justify-content-center ">
      <li class="nav-item">
        <a class="nav-link fa-1x text-secondary" style="color:{{$color}}" href="#">Palabras aprendidas: {{$cantidad}}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color:{{$color}} " href="javascript:direccionarVista('evaluacion')">Evaluación</a>
      </li>
 
    
    </div>
  </div>
</div>



<div id="mensajeAprendida" class="mensajeAprendida " style="display: none">
  <div class="d-flex justify-content-center">
    <div class="centrar animate__animated animate__backInDown">
      <div class="card bg-dark">
        <div class="container text-center p-4">
    
          <h3 class="text-warning">Palabra Aprendida</h3>
         <h1 class="text-warning"><i class="fa fa-check" aria-hidden="true"></i></h1>
        </div>
        </div>
    </div>

  </div>

</div>

     <script>
     var index = 0;
var text = "{{$palabraIngles}}";
var tiempoDeEspera = 80;






function direccionarGoogle() {
  
  pronunciarIngles('{{$palabraIngles}}','{{$velocidad}}');
  pronunciarEspayol('{{$palabraEspayol}}');
  setTimeout(function(){ window.location.href = "https://www.google.com/"; }, 1500);
  
}
function cambiarPalabraIngles(){
  document.getElementById("cambiarPalabra").innerHTML = "¿{{ucwords($palabraIngles)}}?";
}
function cambiarPalabraEspayol(){
  
  document.getElementById("cambiarPalabra").innerHTML = "{{ucwords($palabraEspayol)}}";

}

function aprendidaEvento(){
document.getElementById("pantalla").style.visibility = "hidden";
document.getElementById("mensajeAprendida").style.display = "block";
setTimeout(function(){  document.getElementById("myForm").submit(); },2000);
//  document.getElementById("myForm").submit();
}

  </script>




@endsection
