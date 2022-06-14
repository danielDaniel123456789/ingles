
@extends('layouts.appInstalar')

@section('content')
<style>
  .paso{
    position: absolute;
    margin: 0 auto;
    right: 20px;
  }
  .plus{
      position: absolute !important;
      top: 20px;
     
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
  font-weight: 300;
  font-size: 28px !important;
color: blue;
  z-index: 5;
  
    }

    .subTitulo{
        letter-spacing: 2pt;      /* para separar entgre letras */
  word-spacing: 5pt;        /* para separacion entre palabras */  
  line-height: 20pt;        /* para la separacion entre lineas */ 
  text-indent: 10pt; 
  font-weight: 300;
  font-size: 24px !important;
  opacity: 0.5 !important;
    }

    .imagenesPortadaFondo{
      position: absolute;
      bottom: 0px;
    z-index: -7 !important;
    opacity: 0.2 !important;
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
    -webkit-box-shadow: inset -1px 3px 8px 5px #1F87FF, 2px 5px 16px 0px #0B325E, 5px 5px 15px 5px rgba(0,0,0,0); 
box-shadow: inset -1px 3px 8px 5px #1F87FF, 2px 5px 16px 0px #0B325E, 5px 5px 15px 5px rgba(0,0,0,0);
  }

</style>
    
<div class="container p-4">
  <div class="d-flex justify-content-center animate__animated animate__bounceIn">
    <h1 class=" titulo2  plus"  id="confugurar1" >INDICACIONES   </h1>
    https://diarioinforme.com/como-hacer-que-chrome-sea-tu-navegador-predeterminado/
  </div>
</div>

    <div class="container p-4 text-center">

       <h6>Configure Google Chrome como el navegador predeterminado en Windows</h6>
    
    <div>
      <a   href="https://www.google.com/intl/es/chrome/?brand=CHBD&gclid=Cj0KCQjwqPGUBhDwARIsANNwjV4SNy804_cmEYSY887n4H_61UJ2BLFLyiAA4volHY8H05E_nrWG6tYaAoMSEALw_wcB&gclsrc=aw.ds">
        <i class="fa fa-location-arrow" aria-hidden="true"></i>
         1- Configure Google Chrome como el navegador predeterminado</a>
    </div>


<div class="footer p-4">
  <h1 class=" titulo2 "  id="confugurar1" >PLUS INGLES  </h1>
   
  <div class="d-flex justify-content-center animate__animated animate__bounceIn">
    
    <img class="imagenesPortadaFondo animate__animated animate__bounceIn" src="https://static.preply.com/static/ssr/_next/static/images/choose_tutor-ce5a3d44c76764b9a533e8a8dadc2a57.svg" alt="">
   
    
</div>
</div>

<canvas id="canv" class="canva"></canvas>

<script>
$(document).ready(function () {
    deletrearPalabra('confugurar1','INDICACIONES','INDICACIONES');
  //  deletrearPalabra('confugurar2','DEL LECTOR DE VOZ','DEL LECTOR DE VOZ.');
    });
</script>
   
@endsection
