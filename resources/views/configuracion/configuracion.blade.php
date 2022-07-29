@extends('layouts.appVista')
@section('content')

<style>
  .canv{
    z-index: -2;
  }
  body{
    background-color: black !important;
  }
 
  .imageFondo{
position: absolute;

justify-content: center;
text-align: center;
bottom: 180px;
opacity: 0.63;
z-index: -8 !important;

  }
</style>
@php
$id=0;
    foreach ($data as $item) {
      $id=$item->id;
}

@endphp
<canvas id="canv" class="canva"></canvas>

<div class="salir">
  <a href="javascript:rutaPublica()" class="" >
    <i  class=" fa fa-arrow-left fa-2x" aria-hidden="true"></i>
  </a>
</div>
  
<div class="container p-4 text-center ">
  <div class="d-flex justify-content-center">
   
   <form  method="post" action="{{ route('actualizarVoz') }}"  >
      @csrf
   
      <h4 class="text-primary deletrearPalabra "  id="confugurar1" >CONFIGURAR VELOCIDAD </h4>
      <h6 class="text-primary" id="confugurar2"> VELOCIDAD DEL LECTOR DE VOZ</h6>
      <input type="hidden" id="id" name="id_voz">
      <div id="rate-control " class="text-white">
        <h6 id="text">It was a dark and stormy night.</h6>
        <label for="rate">Rate:</label>
        <input type="range" min="0.5" max="2" value="1" step="0.1" name="velocidad" id="rate">
      </div>
      
      <div class="p-4">
        <button id="play" type="button" class="btn btn-primary">Play</button>
        <button type="submit" class="btn btn-primary">GUARDAR</button>
      </div>

      <div class="p-4">
        <h6 class="text-white">
          Si al presionar Play no suena,
        </h6>
        <h6 class="text-white">
        es porque tienes mala conexión a internet
        </h6>
    
       
      </div>
     
    </form>

    


  </div>
  
</div>

<div class="d-flex justify-content-center">
  <img class="imageFondo" width="255px" src="https://www.jmcprl.net/gif%20ani3/VOZ%20SONIDO.GIF" alt="">

</div>



<script>
  $(document).ready(function () {
    deletrearPalabra('confugurar1','CONFIGURAR VELOCIDAD','CONFIGURAR VELOCIDAD.');
  //  deletrearPalabra('confugurar2','DEL LECTOR DE VOZ','DEL LECTOR DE VOZ.');
    });

      document.getElementById("id").value = '{{$id}}';


  const synth = window.speechSynthesis;

const text ='It was a dark and stormy night';
const play = document.querySelector('#play');
const rate = document.querySelector('#rate');


function speak() {
  if (synth.speaking) {
    synth.cancel();
  }
  const utterThis = new SpeechSynthesisUtterance(text);
  utterThis.addEventListener('error', () => {
    console.error('SpeechSynthesisUtterance error');
  });
  utterThis.lang = 'en-US'
  utterThis.rate = rate.value;

  synth.speak(utterThis);
}

play.addEventListener('click', speak);
</script>


@endsection



