@extends('layouts.appVista')
@section('content')
<canvas id="canv"></canvas>
@foreach ($data as $item )
@php
              $espayol=  $item->espayol;
              $ingles= $item->ingles;
              $id= $item->id;
              $imagen=  $item->imagen;
              $nivelAprendizaje=$item->nivelAprendizaje;
                @endphp

@endforeach

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

     $emojisAlegre = array(
      "😍", "🥰",
     "😘", "😜",
     "😇", "😎", "😁", "😱",
     "🤗", "🤠", "😺",
     "😻", "🙀", "👏",
      "🤝", "💪","😇"
     );

     $emojisTriste = array(
      "😌", "🤨",
     "🧐", 
     "😇", "😒", "😞", "😕",
     "😖", "😩", "😭",
     "😤", "😡", "😥",
      "🙄", "🥴","🤢","🤒","☠️"
     );

     $animacion=  $animaciones[array_rand($animaciones)] ;
     $emoji_Alegre=  $emojisAlegre[array_rand($emojisAlegre)] ;
     $emoji_Triste=  $emojisTriste[array_rand($emojisTriste)] ;
@endphp



<style>
    .salir{
        position: absolute;
        z-index: 5;
    }
 
</style>


 <form id="bajarNivel" style="display: none" method="post" action="{{ route('evaluacionBajarNivelVervo') }}"  >
      @csrf
      <input type="text" name="id" value="{{$id}}">
      <input type="text" name="nivel" value="{{$nivelAprendizaje}}">
      <button type="submit" >bajar</button>
    </form>

    <form id="subirNivel" style="display: none" method="post" action="{{ route('evaluacionSubirNivelVervo') }}"  >
        @csrf
        <input type="text" name="id" value="{{$id}}">
        <input type="text" name="nivel" value="{{$nivelAprendizaje}}">
        
        <button type="submit">subir</button>
      </form>


    <a class="salir" href="javascript:direccionarVista('vista')" > <i class="fa-2x fa fa-arrow-left" aria-hidden="true"></i>  </a>
                 


<div class="container p-4" id="card01">
    <div class="d-flex justify-content-center">
        <div class="card text-center bg-dark animate__animated {{$animacion}}" >
          <div class="container p-4 ">
            <h2 class="text-warning">EVALUACIÓN </h2>
            <div class="p-4">
                <h5 class="text-warning">TRADUCE: {{strtoupper($espayol)}}</h5>
                <input autofocus id="palabraIngles02" type="text" class="form-control bg-dark text-white" placeholder="Significado">
            </div>

            <div  class="p-2">
                <button class="btn btn-secondary" onclick="olvide()">LA OLVIDE</button>
                <button class="btn btn-warning " onclick="revisar()">REVISAR</button>
            </div>
         
          </div>
        </div>
    </div>
</div>

<div class="container p-4" >
    <div class="d-flex justify-content-center">
        <div class="card text-center animate__animated {{$animacion}} bg-dark" 
        id="cardError" style="display:none">
          <div class="container p-4 ">
            
            <H1 class="text-warning fa-3x">{{ucfirst($ingles)}}</H1>
            <h1>{{$emoji_Triste}}</h1>
            <H1 class="text-warning fa-3x">{{ucfirst($espayol)}}</H1>
          </div>
        </div>
    </div>
</div>

<div class="container p-4" >
    <div class="d-flex justify-content-center">
        <div class="card text-center animate__animated {{$animacion}} bg-dark" 
        id="cardExito" style="display:none">
          <div class="container p-4 ">
            <H1 class="text-warning fa-3x">{{ucfirst($ingles)}}</H1>
            <H1 class="text-warning fa-3x">{{ucfirst($espayol)}}</H1>
            <h1>{{$emoji_Alegre}}</h1>
   
          </div>
        </div>
    </div>
</div>


<div class="footer" id="mensajeError" style="display: none">
    <div class="container " style="border-radius: 5px">
        <div class="container p-3 text-center animate__animated {{$animacion}}">
            <h1>{{$emoji_Triste}}</h1>
                <h2 class="text-warning"> SE BAJO UN NIVEL </h2>
        </div>
    </div>
</div>


<div class="footer" id="mensajeExito" style="display: none">
    <div class="container " style="border-radius: 5px">
        <div class="container p-3 text-center animate__animated {{$animacion}}">
            <h1>{{$emoji_Alegre}}</h1>
                <h2 class="text-warning">  NIVEL INCREMENTADO</h2>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">
  <img class="imagenesPortadaFondo" src="{{$imagenFondo}}" alt="">
</div>

<script>

var input = document.getElementById("palabraIngles02");
input.addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    revisar();
  }
});

function olvide(){
  pronunciarIngles('{{$ingles}}','{{$velocidad}}');
    pronunciarEspayol('{{$espayol}}');


    document.getElementById("card01").innerHTML = "";
    document.getElementById("cardError").style.display = "block";
    document.getElementById("mensajeError").style.display = "block";
    
      setTimeout(function(){ 
          document.getElementById('bajarNivel').submit(); }, 2500);
   
   
}

    function revisar(){
        
    //respuestaIngles= $('#palabraIngles02').val();
    respuestaIngles=  document.getElementById('palabraIngles02').value;
    //convertir a miscula
    respuestaIngles= respuestaIngles.toLowerCase();
    espayol= '{{$espayol}}';  
    ingles= '{{$ingles}}';


    //convertir a miscula
    ingles=ingles.toLowerCase();

    if(respuestaIngles.length>1){
        if(respuestaIngles.localeCompare(ingles)){
            //falso
            pronunciarIngles('{{$ingles}}','{{$velocidad}}');
    pronunciarEspayol('{{$espayol}}');
            document.getElementById("card01").innerHTML = "";
    document.getElementById("cardError").style.display = "block";
    document.getElementById("mensajeError").style.display = "block";
      setTimeout(function(){    document.getElementById('bajarNivel').submit(); }, 2500);
            
        }
        else
        {
            //Correcto
            pronunciarIngles('{{$ingles}}','{{$velocidad}}');
                pronunciarEspayol('{{$espayol}}');
                document.getElementById("card01").innerHTML = "";
            document.getElementById("mensajeExito").style.display = "block";
            document.getElementById("cardExito").style.display = "block";
              setTimeout(function(){  document.getElementById('subirNivel').submit(); }, 2500);
           
        }
        }
    
        
    

    }
</script>

@endsection



