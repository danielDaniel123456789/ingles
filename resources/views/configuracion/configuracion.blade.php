@extends('layouts.appVista')
@section('content')

<style>
  .canv{
    z-index: -2;
  }
 
  .imageFondo{
position: absolute;
justify-content: center;
text-align: center;
bottom: 0px;
opacity: 0.3;

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
  <a href="javascript:direccionarVista('vista')" class="" >
    <i  class=" fa fa-arrow-left fa-2x" aria-hidden="true"></i>
  </a>
</div>
  
<div class="container p-4 text-center animate__animated animate__bounce">
  <div class="d-flex justify-content-center">
   <form  method="post" action="{{ route('actualizarVoz') }}"  >
      @csrf
   
      <h4 class="text-primary deletrearPalabra "  id="confugurar1" >CONFIGURAR VELOCIDAD </h4>
      <h5 class="text-dark" id="confugurar2"> LECTOR DE VOZ</h5>
      <input type="hidden" id="id" name="id_voz">
      <div id="rate-control p-4">
        <h6 id="text">It was a dark and stormy night.</h6>
        <label for="rate">Rate:</label>
        <input type="range" min="0.5" max="2" value="1" step="0.1" name="velocidad" id="rate">
      </div>
      
      <div class="p-4">
        <button id="play" type="button" class="btn btn-primary">Play</button>
        <button type="submit" class="btn btn-primary">GUARDAR</button>
      </div>
    
    </form>



  </div>
  
</div>

<div class="d-flex justify-content-center">
  <img class="imageFondo" src="https://media.istockphoto.com/vectors/crowdfunding-composition-concept-of-fundraising-us-coins-money-light-vector-id1221982950?k=20&m=1221982950&s=170667a&w=0&h=2Rv8Saf2-WpOAsPLUl8R6lQYJ2GgmaSoYDyZnIZ5inM=" alt="">

</div>



<script>
  $(document).ready(function () {
    deletrearPalabra('confugurar1','CONFIGURAR VELOCIDAD','CONFIGURAR VELOCIDAD.');
  //  deletrearPalabra('confugurar2','DEL LECTOR DE VOZ','DEL LECTOR DE VOZ.');
    });

      document.getElementById("id").value = '{{$id}}';


  const synth = window.speechSynthesis;

const text = document.querySelector('#text');
const play = document.querySelector('#play');
const rate = document.querySelector('#rate');


function speak() {
  if (synth.speaking) {
    synth.cancel();
  }
  const utterThis = new SpeechSynthesisUtterance(text.textContent);
  utterThis.addEventListener('error', () => {
    console.error('SpeechSynthesisUtterance error');
  });
  utterThis.rate = rate.value;

  synth.speak(utterThis);
}

play.addEventListener('click', speak);
</script>


@endsection



