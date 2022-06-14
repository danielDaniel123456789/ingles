@extends('layouts.appUsuario')

@section('content')

<div class="cuerpo">


  <div class="configuracion">
    <i class="fa fa-cogs" aria-hidden="true"></i>
    ss
  </div>
  <div class="">
    <h1> <a href="javascript:direccionarVista('informe')"><i class="fa fa-cogs color" aria-hidden="true"></i></a> </h1>
    
    <a href="javascript:direccionarVista('historial')">Historial</a> <br>
    <a href="#" onclick="aprendida()">aprendida</a> <br>
    <a href="javascript:direccionarVista('Propiedades')">Propiedades</a>
    <br>
     <a href="#" onclick="aprendida()">Sonido</a> 
 
   
     <div id="uno"></div>

  </div>
  
  @foreach ($data as $item)   
   <?php   
   $id=$item->id;  $palabraIngles=$item->ingles;  
   $palabraEspayol=$item->espayol; 
   $idActual= $item->id; 
   $imagen=$item->imagen; 
   if(isset($item->prioridad)){
    $prioridad= $item->prioridad;
   }
   else {
    $prioridad='000';
   }
  
   ?>   
   @endforeach
  
  <form id="myForm" class="ocultar" method="post" action="{{ route('formAprendida') }}"  >
      @csrf
      <input type="text" name="id_prioridad" value="{{$prioridad}}">
      <input type="text" name="id_vervo" value="{{$id}}">
      <input type="text" name="nivel"  value="1">
      <button type="submit" class="btn btn-primary">Listo</button>
  </form>
  

  <div class="d-flex justify-content-center" >
    <div class="wave" onmouseover="cambiarPalabraEspayol()" onmouseout="cambiarPalabraIngles()">
      <a   class=" fa-4x" href="//www.google.com">
       <span   id="cambiarPalabra" class="cambiarColor text-primary ">¿{{ucwords($palabraIngles)}}?</span>
      </a>
      </div>
  </div>
 

  
    <img class="imagen" src="{{$imagen}}" />

</div>

<canvas id="canvas" class="canvas"></canvas>
<!-- partial -->
  <script>
     var index = 0;
var text = "{{$palabraIngles}}";
var tiempoDeEspera = 80;




function cambiarPalabraIngles(){
  document.getElementById("cambiarPalabra").innerHTML = "¿{{$palabraIngles}}?";

}
function cambiarPalabraEspayol(){
  document.getElementById("cambiarPalabra").innerHTML = "{{$palabraEspayol}}";

}
function aprendida(){
  document.getElementById("myForm").submit();
}

function efecto(ingles, espayol){
  pronunciarIngles(ingles);
  pronunciarEspayol(espayol);
  crearEfecto();

}

function crearEfecto() {
  if(index==0){
    document.getElementById("effect").innerHTML= '<p>{{$palabraEspayol}}</p>';
  }
    if (index < text.length) {
        document.getElementById("effect")
                .innerHTML += text.charAt(index);
        index++;
        setTimeout(crearEfecto, tiempoDeEspera);
    }
}

  </script>






@endsection
