
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
color: white;
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
    background-color: black;

    border-radius: 50%;
  }
  .carousel-control-next-icon{
    background-color:black;;

    border-radius: 50%;
  }

  .imgEfectos{
    -webkit-box-shadow: inset -1px 3px 8px 5px #1F87FF, 2px 5px 16px 0px #0B325E, 5px 5px 15px 5px rgba(0,0,0,0); 
box-shadow: inset -1px 3px 8px 5px #1F87FF, 2px 5px 16px 0px #0B325E, 5px 5px 15px 5px rgba(0,0,0,0);
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

  <div id="mostrarCarrocel" >
  
    <div class="container p-4">
      <div class="d-flex justify-content-center animate__animated animate__bounceIn">
        <h4 class=" text-white  plus"  id="confugurar1" >INDICACIONES   </h4>
    
      </div>

    </div>

    <div class="container p-4 text-center">

       
   
    
      <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
       <div class="carousel-inner">


       
         <div class="carousel-item active">
           <h5 class="text-white paso">PASO 1</h5>
           <div class="container p-4">
             <img class="imgEfectos" src="/img/a.png" width="60%" alt="...">
           </div>
        
       
         </div>
         <div class="carousel-item">
           <h5  class="text-white paso">PASO 2</h5>
           <div class="container p-4">
             <img class="imgEfectos" src="/img/imagen2.png" width="70%"  alt="...">
           </div>
          
          
         </div>
         <div class="carousel-item">
           <h5  class="text-white paso">PASO 3</h5>
           <div class="container p-4">
             <img class="imgEfectos" src="/img/c.png" width="50%" alt="...">
           </div>
           
 
         </div>
     
         <div class="carousel-item p-4">
          <h5  class="text-white paso">LISTO</h5>
          <a class="text-warning" href="  https://www.google.com/search?sxsrf=ALiCzsYOScxHkSf_x7gDzrm4gua-EKzKmw:1655310243881&q=install+Google+Chrome&sa=X&ved=2ahUKEwilldGY76_4AhUrTjABHXTvAG8Q7xYoAHoECAIQMA&biw=1279&bih=951&dpr=1       
          " 
          target="_blank">
         Debes instalar el navegador Google Chrome
          </a>

          <div class="p-4">
            <h6 class="text-secondary">Solo dos pasos y terminamos.</h6>
      

            <p>Check out <a class="text-warning" href="https://www.google.com/search?q=Configure+Google+Chrome+como+el+navegador+predeterminado&sxsrf=ALiCzsZ_ZnL_fMF1CAyojRRwKDkMt59-Dw%3A1655309861402&source=hp&ei=JQaqYvjqFrmFwbkP_emckAM&iflsig=AJiK0e8AAAAAYqoUNbCOpQls0gitk2NqkxSmnp6XR55-&ved=0ahUKEwi4kZ_i7a_4AhW5QjABHf00BzIQ4dUDCAc&uact=5&oq=Configure+Google+Chrome+como+el+navegador+predeterminado&gs_lcp=Cgdnd3Mtd2l6EAMyBAgjECcyBggAEB4QFjIGCAAQHhAWOgcIIxDqAhAnOg0ILhDHARCjAhDqAhAnUL8CWL8CYJQJaAFwAHgAgAHjAYgB4wGSAQMyLTGYAQCgAQKgAQGwAQo&sclient=gws-wiz" 
              target="_blank">    <i class="fa fa-location-arrow" aria-hidden="true"></i> 1- Configure Google Chrome como el navegador predeterminado</a>.</p>
        
          <div class="">
          <a  class="text-warning" href="#" onclick="direccionarVista('extencion')" class="text-white">
            <i class="fa fa-location-arrow" aria-hidden="true"></i>
             2- Instalar Extencion</a>
          </div>
      
       </div>
     
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
    
    <img class="imagenesPortadaFondo" src="https://static.preply.com/static/ssr/_next/static/images/choose_tutor-ce5a3d44c76764b9a533e8a8dadc2a57.svg" alt="">
   
    
</div>
</div>





<script>


  function cerrar() {

    //document.getElementById("google").style.visibility = "hidden";

  document.getElementById("nav_inicio").style.display = "inline";
    document.getElementById("google").style.display = "none";
        document.getElementById("mostrarCarrocel").style.display = "block";
  }
$(document).ready(function () {
    deletrearPalabra('confugurar1','PLUS INGLES','PLUS INGLES');
  //  deletrearPalabra('confugurar2','DEL LECTOR DE VOZ','DEL LECTOR DE VOZ.');
    });
</script>
   
@endsection
