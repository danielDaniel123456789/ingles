
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
    opacity: 0.1 !important;
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
    


  <div id="mostrarCarrocel" >
  
    <div class="container p-4">
      <div class="d-flex justify-content-center animate__animated animate__bounceIn">
        <h1 class=" titulo2  plus"  id="confugurar1" >INDICACIONES   </h1>
    
      </div>

    </div>

    <div class="container p-4 text-center">

       
   
    
      <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
       <div class="carousel-inner">


       
         <div class="carousel-item active">
           <h3 class="text-primary paso">PASO 1</h3>
           <div class="container p-4">
             <img class="imgEfectos" src="/img/a.png" width="60%" alt="...">
           </div>
        
       
         </div>
         <div class="carousel-item">
           <h3  class="text-primary paso">PASO 2</h3>
           <div class="container p-4">
             <img class="imgEfectos" src="/img/imagen2.png" width="70%"  alt="...">
           </div>
          
          
         </div>
         <div class="carousel-item">
           <h3  class="text-primary paso">PASO 3</h3>
           <div class="container p-4">
             <img class="imgEfectos" src="/img/c.png" width="50%" alt="...">
           </div>
           
 
         </div>
         <!--
         <div class="carousel-item">
           <h1 class="text-danger">PASO 4</h1>
           <div class="container">
             <img class="imgEfectos" src="/img/d.png"  width="50%" alt="...">
           </div>
 
          <br>
         </div>
       -->
         <div class="carousel-item p-4">

         
          
           <!--    <span class="text-decoration-line-through fst-italic text-secondary">Omitir este paso, en caso de tenerlo instalado</span>
           --> 
          <!-- <img src="/img/chrome.jpeg" width="5%" alt="..."> -->
        
     
          <h6 class="text-secondary">Solo dos pasos y terminamos.</h6>
         
          
         <a href="#" onclick="predeterminado()">             <i class="fa fa-location-arrow" aria-hidden="true"></i> 1- Configure Google Chrome como el navegador predeterminado</a>

         
      <!--  <span class="text-secondary">Requicito</span>-->
        <br>
           <a href="#" onclick="direccionarVista('extencion')">
             <i class="fa fa-location-arrow" aria-hidden="true"></i>
              2- Instalar Extencion</a>
         </div>
       </div>
       <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Previous</span>
       </button>
       <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Next</span>
       </button>
     </div>

     </div>



  
  </div>




<div class="footer p-4">

   
  <div class="d-flex justify-content-center animate__animated animate__bounceIn">
    
    <img class="imagenesPortadaFondo animate__animated animate__bounceIn" src="https://static.preply.com/static/ssr/_next/static/images/choose_tutor-ce5a3d44c76764b9a533e8a8dadc2a57.svg" alt="">
   
    
</div>
</div>


<canvas id="canv" class="canva"></canvas>

<div class="container text-center" id="google" style="overflow-y: scroll; height:400px; display:none;" >


  <div class="container p-4">
    <div class="card container p-4 bg-dark text-white">
      <h5>
        Configure Google Chrome como el navegador predeterminado en Windows
          <i onclick="cerrar()" class="fa fa-window-close fa-2x" aria-hidden="true"></i>
      </h5>
  </div>



  <div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingOne">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
          1- Abra la configuración del sistema presionando la tecla de Windows + I, luego haga clic en "Aplicación".
        </button>
      </h2>
      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">

          <img src="/img/google1.png" alt="">
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
          2- En el cuadro del lado izquierdo, haga clic en "Aplicaciones predeterminadas".
        </button>
      </h2>
      <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          <img src="/img/google2.png" alt="">
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
         3-Busque la sección Navegador web, haga clic en su navegador predeterminado actual, luego desplácese por la lista y seleccione "Google Chrome".
        </button>
      </h2>
      <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">
          <img src="/img/google3.png" alt="">
        </div>
      </div>
    </div>
    
  </div>

  </div>

  <div class="footer">
    <h4>
      <a   href="https://www.google.com/intl/es/chrome/?brand=CHBD&gclid=Cj0KCQjwqPGUBhDwARIsANNwjV4SNy804_cmEYSY887n4H_61UJ2BLFLyiAA4volHY8H05E_nrWG6tYaAoMSEALw_wcB&gclsrc=aw.ds">
        Descarga el navegador Chrome  </a>
        <img src="/img/chrome.jpeg" alt="" width="40">
    </h4>
  </div>


</div>

<script>
function predeterminado(){
  
  document.getElementById("nav_inicio").style.display = "none";
  document.getElementById("mostrarCarrocel").style.display = "none";
  document.getElementById("google").style.display = "inline";
//  document.getElementById("").style.display = 
//  document.getElementById("google").style.visibility = "block";
       
}

  function cerrar() {

    //document.getElementById("google").style.visibility = "hidden";

  document.getElementById("nav_inicio").style.display = "inline";
    document.getElementById("google").style.display = "none";
        document.getElementById("mostrarCarrocel").style.display = "block";
  }
$(document).ready(function () {
    deletrearPalabra('confugurar1','INDICACIONES','INDICACIONES');
  //  deletrearPalabra('confugurar2','DEL LECTOR DE VOZ','DEL LECTOR DE VOZ.');
    });
</script>
   
@endsection
