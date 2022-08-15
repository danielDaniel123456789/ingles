
@extends('layouts.appVista')

@section('content')






@php
   
    $animaciones = array(
      "animate__bounce", "animate__flash","animate__pulse",
      "animate__rubberBand","animate__shakeX","animate__shakeY","animate__swing",
      "animate__tada", "animate__wobble", "animate__jello", "animate__heartBeat",
      "animate__zoomIn", "animate__slideInUp"
      
       );



     $colores = array(
      "#B71C1C","#880E4F","#4A148C","#311B92", "#0D47A1","#01579B", "#006064",
      "#1B5E20", "#827717", "#F57F17", "#BF360C"
     );

     $coloresBrillantes= array(
      "#F4D03F", "#2ECC71","#E91E63","#E53935","#66FF66"
     );

      $animacion=  $animaciones[array_rand($animaciones)] ;
      $color=  $colores[array_rand($colores)] ;
      $colorBrillante= $coloresBrillantes[array_rand($coloresBrillantes)];
   

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
 $prioridad='falso';
}

?>   
@endforeach





<div id="x" class="moverCursor" style="color:{{$color}}; " >

  <div id="cursorLetra" class="">
    <span class="cursorLetra " >
      {{$palabraIngles}}  
    </span>
  </div>
</div>


  <div class="container text-center ">
  <div id="titulo" class="tituloPrincipal animate__animated wave {{$animacion}}">
  {{$palabraIngles}}
  </div>

</div>


<div id="escucharClick" class="escucharClick" onclick="direccionarGoogle()" onmouseover="eventoDireccionar()">
</div>
<div id="recordatorio" class="container d-flex recordatorio " onmouseover="eventoDireccionar()" 
onclick="direccionarGoogle()" >

</div>


<div id="cuerpo"  onclick="direccionarGoogle()">
  


 
  
  </div>

  
  
  <div class="container p-5 ">

    <div class="d-flex justify-content-center" id="mostrarPalabra">



    </div>


  
  <div class="footer animate__animated animate__fadeInUp" id="palabraAprendida">
    <div   class=" "  >
      <div id="textoAprendidaEfecto" >
      <a href="#" style="color:{{$color}}" onclick="aprendidaEvento()" >
      APRENDIDA
         <i   class=" fa fa-check-square-o fa-2x " aria-hidden="true"></i>
      </a>

      
      <div class="container " id="microfono">
        <div class="d-flex justify-content-center p-4">

        <div class="card p-2 bg-dark" style="width: 18rem;">
        
        <h3 class="text-white">Segundos </h3>

     
        <input  type="number" min="2"  id="idSonido" value="60" class="form-control" >
       


      <br>
      <a href="#" onclick="sonido()"> <i class="text-white fa-2x fa fa-microphone" aria-hidden="true"></i></a>

</div>

    

        </div>
    
      </div>
    
      </div> 
    </div>
    <div class="container">
  
      <ul class="nav justify-content-center ">
      <li class="nav-item">
        <h5>    <a class="nav-link text-secondary" style="color:{{$color}}" href="#">Palabras aprendidas: {{$cantidad}}</a>
        </h5>
     </li>
     
 
  
    </div>
  </div>
</div>


<div id="mensajeAprendida" class="mensajeAprendida " style="display: none">


  <div class="d-flex justify-content-center">
    <div class="centrar animate__animated animate__backInDown">
      <div class="card bg-dark">
        <div class="container text-center p-4">
    
          <h5 class="text-warning">Palabra Aprendida</h5>
         <h1 class="text-warning"><i class="fa fa-check" aria-hidden="true"></i></h1>
        </div>
        </div>
    </div>
  </div>
</div>

</div>


<script>
        var index = 0;
        var contador=0;
        var text = "{{$palabraIngles}}";
        var tiempoDeEspera = 80;

 
  //setTimeout(function(){  document.getElementById("x").style.display = "block";; }, 1000);
  
  cambiarColor();
  cambiarPalabraTitulo();
function sonido(){

      tiempoSegundos=  document.getElementById("idSonido").value;
      tiempoSegundos= parseInt(tiempoSegundos)*1000;
      if(tiempoSegundos>=4000){
        pronunciarIngles('{{$palabraIngles}}','{{$velocidad}}');
  pronunciarEspayol('{{$palabraEspayol}}');;
  //alert(tiempoSegundos);
    setTimeout(function(){sonido(); }, tiempoSegundos);
    document.getElementById("microfono").style.display = "none";
      }
      else{
        alert("El tiempo debe ser mayor a 4 segundos");

      }
      
       


}


function cambiarPalabraTitulo(){
  if(contador==0){

    document.getElementById("titulo").innerHTML = `
    <span class="" style="color:{{$color}}">
      {{$palabraEspayol}}    
    </span>
   `;
   contador++;   
     setTimeout(function(){  cambiarPalabraTitulo(); }, 500);
  }

  else{

    document.getElementById("titulo").innerHTML = `
    <span class="" style="color:#FF1493">
      {{$palabraIngles}}   
    </span>
   `;
   contador=0;
   setTimeout(function(){  cambiarPalabraTitulo(); }, 500);
  }

}



function cambiarColor(){
  document.getElementById("cursorLetra").innerHTML = `
    <span class="" style="color:{{$color}}">
      {{$palabraIngles}}
    </span>
   `
   ;
 
  setTimeout(function(){ 
    document.getElementById("cursorLetra").innerHTML = `
    <span class="" style="color:{{$color}}">
      {{$palabraEspayol}}
    </span>    `;
   }, 500);
  
      setTimeout(function(){ cambiarColor(); }, 1000);
}








function aprendidaEvento(){
 document.getElementById("myForm02").submit();
}




  </script>




@endsection
