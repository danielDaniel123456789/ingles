@extends('layouts.appVista')
@section('content')

<style>
    .salir{
        position: absolute;
        z-index: 5;
    }
 
</style>

<canvas id="canv"></canvas>

<div class="salir" >
    <a class="nav-link" href="javascript:direccionarVista('mostrarVervo')" > <i class="fa fa-arrow-left" aria-hidden="true"></i>  SALIR</a>
                 

</div>

<div class="container p-4 ">
    <div class="d-flex justify-content-center p-4 text-center">
        <div class="card p-4">
            <h5>Velocidad del lector de voz</h5>
            <h6 id="text">It was a dark and stormy night.</h6>
    
            <div id="rate-control">
              <label for="rate">Rate:</label>
              <input type="range" min="0.5" max="2" value="1" step="0.1" id="rate">
            </div>
            <div class="p-4">
                <button id="play" class="btn btn-outline-primary">Play</button>
            </div>
       
        </div>
    </div>


    
    <script>
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
</div>
<script>
 function data(){
 }

</script>
@endsection



