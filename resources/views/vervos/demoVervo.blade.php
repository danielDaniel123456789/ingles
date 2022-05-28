
@extends('layouts.appVista')

@section('content')


@if(session("exito"))
<x-exito/>
@endif

@if(session("error"))
<x-error/>
@endif
  
<canvas id="canv"></canvas>

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






<div class="container p-5 ">
 

  <div class="d-flex justify-content-center ">
    <div class="wave" onmouseover="cambiarPalabraEspayol()" onmouseout="cambiarPalabraIngles()">
      <a  href="#" onclick="direccionarGoogle()">
       <span   id="cambiarPalabra" class="cambiarColor text-primary ">¿{{ucwords($palabraIngles)}}?</span>
      </a>
     
      </div>

  </div>


  <div class="d-flex justify-content-center">
    @if ($tamayoImagen>0)
    <img class="wave " onclick="direccionarGoogle()" src="{{$imagen}}" width="{{$ancho}}px"  />     
    @endif

  
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
        <a class="nav-link" href="javascript:direccionarVista('historial')">Historial</a>
      </li>

      <li class="nav-item">
        <a class="nav-link"    href="#" onclick="aprendida()">Aprendida</a>
      </li>

   
      <li class="nav-item">
        <a href="javascript:direccionarVista('sobre')">Más</a>   </li>
    </ul>
    
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
