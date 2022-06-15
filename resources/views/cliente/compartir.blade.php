
@extends('layouts.appCompartir')

@section('content')
<style>
  
   .titulo2{
        position: relative;
        letter-spacing: 2pt;      /* para separar entgre letras */
  word-spacing: 5pt;        /* para separacion entre palabras */  
  line-height: 20pt;        /* para la separacion entre lineas */ 
  text-indent: 10pt; 
  font-weight: 200;
  font-size: 14px !important;
color: #FFCA28;
  z-index: 5;
  
    }





 

</style>
   
<div class="container p-2">
  <div class="d-flex justify-content-center ">
    <h4 class=" titulo2   text-warnign"  id="confugurar1" >PLUS INGLES   </h4>
  </div>
</div>

<div class="container p4
 text-center  animate__animated animate__heartBeat p-4" id="copiarLink">

 <h6>
  <a href="#" onclick="portapapeles()" class="text-warning">
   
    Preciona aqui, 
    <br>
 para copiar este link 
 <br>
 <i class="fa fa-clipboard fa-2x text-warning" aria-hidden="true"></i></a>
 </h6>
 
</div>
<div class="container p-2  text-center " id="div_imagen" style="display:none">
    <H6 class="text-warning fa-2x"> 
        Link Copiado!!
     </H6>
  </div>

<div class="footer p-4">
  <h1 class=" titulo2  plus"  id="confugurar1" >PLUS INGLES  </h1>
 
</div>

<canvas id="canv" class="canva"></canvas>
<script>

  function ocultarImagen()  {
    document.getElementById("div_imagen").innerHTML = "";
    document.getElementById("div_direccionar").style.display = "block";
  }
    function portapapeles() {

     // $('#borrar').remove();
document.getElementById("copiarLink").innerHTML = "";
 document.getElementById("div_imagen").style.display = "block";


      /* Get the text field */
      var copyText = document.getElementById("myInput");
    
      /* Select the text field */
      copyText.select();
      copyText.setSelectionRange(0, 99999); /* For mobile devices */
    
      /* Copy the text inside the text field */
      navigator.clipboard.writeText(copyText.value);
      
      /* Alert the copied text */
    
    }
$(document).ready(function () {
    deletrearPalabra('confugurar1','PLUS INGLES ','PLUS INGLES ');
  //  deletrearPalabra('confugurar2','DEL LECTOR DE VOZ','DEL LECTOR DE VOZ.');
    });
</script>

    



@endsection
