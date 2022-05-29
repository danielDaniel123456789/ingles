
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


      $animacion=  $animaciones[array_rand($animaciones)] ;
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






<div class=" container p-5 ">
 

  <div class="d-flex justify-content-center ">
    <div class="wave animate__animated {{$animacion}}" onmouseover="cambiarPalabraEspayol()" onmouseout="cambiarPalabraIngles()">
      <a  href="#" onclick="direccionarGoogle()">
       <span   id="cambiarPalabra" class="cambiarColor text-primary ">¿{{ucwords($palabraIngles)}}?</span>
      </a>
    </div>

    
  </div>


  <div class="d-flex justify-content-center">
    @if ($tamayoImagen>0)
    <img class="wave animate__animated {{$animacion}}" onclick="direccionarGoogle()" src="{{$imagen}}" width="{{$ancho}}px"  />     
    @endif

  
  </div>

  <div class="d-flex justify-content-center ">
    <div class="wave animate__animated {{$animacion}} " onmouseover="cambiarPalabraEspayol()" onmouseout="cambiarPalabraIngles()">
      <a  href="#" onclick="direccionarGoogle()">
       <h4   class="cambiarColorEspayol ">{{ucwords($palabraEspayol)}}</h4>
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

    <ul class="nav justify-content-center">
    

    <li class="nav-item">
      <a class="nav-link text-secondary" href="#">Palabras aprendidas: {{$cantidad}}</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="javascript:direccionarVista('voz')">Voz</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="javascript:direccionarVista('evaluacion')">Evaluación</a>
    </li>

      <li class="nav-item">
        <a class="nav-link" href="javascript:direccionarVista('historial')">Historial</a>
      </li>

      <li class="nav-item">
        <a class="nav-link"    href="#" onclick="aprendida()">Palabra Aprendida <i class="fa fa-check-square " aria-hidden="true"></i> </a>
      </li>

   

    
  </div>
  
</div>



</div>


     <script>
     var index = 0;
var text = "{{$palabraIngles}}";
var tiempoDeEspera = 80;


function direccionarGoogle() {
  
  pronunciarIngles('{{$palabraIngles}}');
  pronunciarEspayol('{{$palabraEspayol}}');
    setTimeout(function(){ window.location.href = "https://www.google.com/"; }, 1500);
  
}
function cambiarPalabraIngles(){
  document.getElementById("cambiarPalabra").innerHTML = "¿{{ucwords($palabraIngles)}}?";

}
function cambiarPalabraEspayol(){

  document.getElementById("cambiarPalabra").innerHTML = "{{ucwords($palabraEspayol)}}";

}
function aprendida(){
  document.getElementById("myForm").submit();
}


  </script>




@endsection
