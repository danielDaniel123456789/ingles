
@extends('layouts.appInstalar')

@section('content')

<style>
  .colorAviso{
    color: #FFCA28;
  }
 

  .plus{
      position: absolute !important;
     
  }

    .empezar{
       z-index: 18 !important;
    }
   
    .titulo2{
        position: relative;
        letter-spacing: 2pt;      /* para separar entgre letras */
  word-spacing: 5pt;        /* para separacion entre palabras */  
  line-height: 20pt;        /* para la separacion entre lineas */ 
  text-indent: 10pt; 
  font-weight: 200;
  font-size: 18px !important;
color: #FFCA28;
  z-index: 5;
  
    }





 

</style>
   
<div class="container p-2">
  <div class="d-flex justify-content-center animate__animated animate__bounceIn">
    <h4 class=" titulo2  plus"  id="confugurar1" >PLUS INGLES   </h4>
  </div>
</div>

<div class="container p4
 text-center  animate__animated animate__heartBeat p-4" id="copiarLink">

 <h4>
  <a href="#" onclick="portapapeles()">
   
    Preciona aqui, 
    <br>
 para copiar este link 
 <br>
 <i class="fa fa-clipboard fa-2x" aria-hidden="true"></i></a>
 </h4>
  
   
 

</div>
<div class="container p-2 text-center animate__animated animate__bounceIn" id="div_imagen" style="display:none">
 

    <img  src="./img/option2.png"  width="60%" alt="...">
<br>
<div class="p-4">

  <div class="d-flex justify-content-center text-dark">
    <div>
      <h6 class="colorAviso"> El link que copiaste lo pegaras </h6>
    
      <h6 class="colorAviso">sobre el campo <strong class="text-danger">Redirect URL</strong>   </h6>
      <h6 class="colorAviso">y presionas el boton  <span class="text-danger"><strong> Save</strong> </span>  </h6>

 
    
   
    </div>

  </div>


  <a class="btn btn-warning" href="https://chrome.google.com/webstore/detail/new-tab-redirect/icpgjfneehieebagbmdbhnlpiopdcmna"> Entendido</a>
   
</div>
    
  </div>

<div class="container text-center" id="div_direccionar" style="display:none">
        <H5>Recuerda</H5>
        <a class="btn btn-primary" href="https://chrome.google.com/webstore/detail/new-tab-redirect/icpgjfneehieebagbmdbhnlpiopdcmna">Instalar Extencion</a>
    
  <h6>Copiar</h6>
    
    <input type="text" value="https://usuarios.click/curso/curso" id="myInput" hidden>
    
    <button onclick="portapapeles()">Copiar</button>


    </div>


    
<div class="footer p-4">
  <h1 class=" titulo2  plus"  id="confugurar1" >PLUS INGLES  </h1>

</div>


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
