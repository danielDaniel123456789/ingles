
@extends('layouts.appRecordatorio')

@section('content')



<style>
  body{
    background-color: black !important;
  
 
 

  }




</style>




@php
   
    $animaciones = array(
      "animate__heartBeat"
   
      
       );



     $colores = array(
      "#BEFF33","#D7E976", "#9EE976", "#76E988", "#76E9C2"
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
 $prioridad='falso';
}

?>   
@endforeach


<div class="d-flex justify-content-center" >

        <div class="card p-2 bg-dark text-center" style="width: 18rem;"  id="microfono">
        <div class="p-2">
          
        <h3 class="text-white">Segundos    <a href="#" onclick="sonido()"> <i class="p-4 text-white fa-2x fa fa-microphone" aria-hidden="true"></i></a>
</h3> 
        <div class="btn-group" role="group" aria-label="Basic example">
  <button  onclick="sonido8segundos()" type="button" class="btn btn-primary">8</button>
  <button  onclick="sonido15segundos()" type="button" class="btn btn-primary">15</button>
  <button onclick="sonido30segundos()" type="button" class="btn btn-primary">30</button>
  <input  type="number" min="2"  id="idSonido" value="8" class="form-control" >
</div>
  </div>
 </div>

</div>



<div class="container text-center ">


    <div id="titulo" class="tituloPrincipal animate__animated wave {{$animacion}}">
    {{$palabraIngles}}
    </div>

 
</div>








<div id="divAprendida"   style="display:none">
<div class="d-flex justify-content-center text-center" >
<div class=" animate__animated animate__fadeInUp" id="palabraAprendida">

      <div id="textoAprendidaEfecto" >
      <a href="#" style="color:{{$color}}" onclick="aprendidaEvento()" >
      APRENDIDA
         <i   class=" fa fa-check-square-o fa-2x " aria-hidden="true"></i>
      </a>
</div>

<div class="p-5">
<h6 style="color:{{$color}}">Imagina la imagen</h6>
</div>

</div>

</div>



      
 



<form id="myForm"  method="post" action="{{ route('formAprendidaRecordatorio') }}"  style="display:none" >
    @csrf
    <input type="text" name="soyPrioridad" value="{{$prioridad}}">
    <input type="text" name="id_vervo" value="{{$id}}">
    <input type="text" name="nivel"  value="1">
  
  </form>


<script>
        var index = 0;
        var contador=0;
        var contadorSegundoPalabra=0;
        var text = "{{$palabraIngles}}";
        var tiempoDeEspera = 80;

 
  //setTimeout(function(){  document.getElementById("x").style.display = "block";; }, 1000);
  
  

  function sonido8segundos(){


tiempoSegundos= 8*1000;

if(tiempoSegundos>=4000){
  //alert(tiempoSegundos);
  pronunciarIngles('{{$palabraIngles}}','{{$velocidad}}');
 pronunciarEspayol('{{$palabraEspayol}}');;
//alert(tiempoSegundos);  
document.getElementById("microfono").style.display = "none";
document.getElementById("divAprendida").style.display = "block";

setTimeout(function(){sonido(); }, tiempoSegundos);
}
else{
  alert("El tiempo debe ser mayor a 4 segundos");
}
}

function sonido15segundos(){


tiempoSegundos= 15*1000;

if(tiempoSegundos>=4000){
  //alert(tiempoSegundos);
  pronunciarIngles('{{$palabraIngles}}','{{$velocidad}}');
 pronunciarEspayol('{{$palabraEspayol}}');;
//alert(tiempoSegundos);  
document.getElementById("microfono").style.display = "none";
document.getElementById("divAprendida").style.display = "block";

setTimeout(function(){sonido(); }, tiempoSegundos);
}
else{
  alert("El tiempo debe ser mayor a 4 segundos");
}
}

function sonido30segundos(){


tiempoSegundos= 30*1000;

if(tiempoSegundos>=4000){
  //alert(tiempoSegundos);
  pronunciarIngles('{{$palabraIngles}}','{{$velocidad}}');
 pronunciarEspayol('{{$palabraEspayol}}');;
//alert(tiempoSegundos);  
document.getElementById("microfono").style.display = "none";
document.getElementById("divAprendida").style.display = "block";

setTimeout(function(){sonido(); }, tiempoSegundos);
}
else{
  alert("El tiempo debe ser mayor a 4 segundos");
}
}

function sonido(){


      tiempoSegundos=  document.getElementById("idSonido").value;
      tiempoSegundos= parseInt(tiempoSegundos)*1000;
 
      if(tiempoSegundos>=4000){
        //alert(tiempoSegundos);
        pronunciarIngles('{{$palabraIngles}}','{{$velocidad}}');
       pronunciarEspayol('{{$palabraEspayol}}');;
  //alert(tiempoSegundos);  
    document.getElementById("microfono").style.display = "none";
    document.getElementById("divAprendida").style.display = "block";
    
    setTimeout(function(){sonido(); }, tiempoSegundos);
      }
      else{
        alert("El tiempo debe ser mayor a 4 segundos");
      }
}


function cambiarPalabraTitulo(){
  
  if(contadorSegundoPalabra==0){

    document.getElementById("titulo").innerHTML = `
    <span class="" style="color:{{$color}}">
      {{$palabraEspayol}}    
    </span>
   `;
   contadorSegundoPalabra++;   
     setTimeout(function(){  cambiarPalabraTitulo(); }, 500);
  }

  else{
  
    document.getElementById("titulo").innerHTML = `
    <span class="" style="color:#FF1493">
      {{$palabraIngles}}   
    </span>
   `;
   contadorSegundoPalabra=0;
   setTimeout(function(){  cambiarPalabraTitulo(); }, 500);
  }

}



function aprendidaEvento(){
 document.getElementById("myForm").submit();
}


  cambiarPalabraTitulo();

  </script>




@endsection
