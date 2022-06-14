
@extends('layouts.appInstalar')

@section('content')
<style>
      .imagenesPortadaFondo{
      position: absolute;
      bottom: 0px;
    z-index: -7 !important;
    opacity: 0.2 !important;
  }

  .plus{
      position: absolute !important;
     
  }

    .empezar{
       z-index: 18 !important;
    }
     .titulo1{
        letter-spacing: 2pt;      /* para separar entgre letras */
  word-spacing: 5pt;        /* para separacion entre palabras */  
  line-height: 20pt;        /* para la separacion entre lineas */ 
  text-indent: 10pt; 
  font-weight: 300;
  font-size: 40px !important;
  
  color: #17A589;
    }
    .titulo2{
        position: relative;
        letter-spacing: 2pt;      /* para separar entgre letras */
  word-spacing: 5pt;        /* para separacion entre palabras */  
  line-height: 20pt;        /* para la separacion entre lineas */ 
  text-indent: 10pt; 
  font-weight: 200;
  font-size: 18px !important;
color: blue;
  z-index: 5;
  
    }

    .subTitulo{
        letter-spacing: 2pt;      /* para separar entgre letras */
  word-spacing: 5pt;        /* para separacion entre palabras */  
  line-height: 20pt;        /* para la separacion entre lineas */ 
  text-indent: 10pt; 
  font-weight: 300;
  font-size: 34px !important;
  opacity: 0.5 !important;
    }

  
  .imagenFooter{
    z-index: -7 !important;
    opacity: 0.1 !important;   
  }
  .carousel-control-prev-icon{
    background-color: blue;

    border-radius: 50%;
  }
  .carousel-control-next-icon{
    background-color: blue;

    border-radius: 50%;
  }

  .imgEfectos{
     border-radius: 25px;
    -webkit-box-shadow: 8px 8px 24px 0px rgba(66, 68, 90, 1);
    -moz-box-shadow: 8px 8px 24px 0px rgba(66, 68, 90, 1);
     box-shadow: 8px 8px 24px 0px rgba(66, 68, 90, 1);
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
 

    <img  src="/img/option2.png"  width="60%" alt="...">
<br>
<div class="p-4">

  <div class="d-flex justify-content-center text-dark">
    <div>
      <h6 class="text-primary"> El link que copiaste lo pegaras </h6>
    
      <h6 class="text-primary">sobre el campo <strong class="text-danger">Redirect URL</strong>   </h6>
      <h6 class="text-primary">y presionas el botón  <span class="text-danger"><strong> Save</strong> </span>  </h6>

  
      <h6 class="text-secondary">**Despues de presionar Save, Cierra todas la pestañas**</h6>


    
   
    </div>

  </div>


  <a class="btn btn-primary" href="https://chrome.google.com/webstore/detail/new-tab-redirect/icpgjfneehieebagbmdbhnlpiopdcmna"> Entendido</a>
   
</div>
    
  </div>

<div class="container text-center" id="div_direccionar" style="display:none">
        <H5>Recuerda</H5>
        <a class="btn btn-primary" href="https://chrome.google.com/webstore/detail/new-tab-redirect/icpgjfneehieebagbmdbhnlpiopdcmna">Instalar Extencion</a>
    
  <h6>Copiar</h6>
    
    <input type="text" value="https://usuarios.click/ingles/home" id="myInput" hidden>
    
    <button onclick="portapapeles()">Copiar</button>


    </div>


    
<div class="footer p-4">
  <h1 class=" titulo2  plus"  id="confugurar1" >PLUS INGLES  </h1>
  <div class="d-flex justify-content-center animate__animated animate__bounceIn">
    <img class="imagenesPortadaFondo animate__animated animate__bounceIn" src="https://static.preply.com/static/ssr/_next/static/images/choose_tutor-ce5a3d44c76764b9a533e8a8dadc2a57.svg" alt="">
  
</div>
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
