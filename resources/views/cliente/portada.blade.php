
@extends('layouts.appVista')

@section('content')
<style>
  .plus{
      position: absolute !important;
     
  }
 h1, h2, h5, h6 {

        color: #17A589;
        opacity: 0.5 !important;
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
  opacity: 0.5 !important;
  
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
    z-index: -7 !important;
    opacity: 0.5 !important;
  }
  .imagenFooter{
    z-index: -7 !important;
    opacity: 0.1 !important;   
  }
</style>
    <div class="container p-5 text-center">
        <div class="p-4">
            <h1 class="titulo1 animate__animated animate__bounceIn" >PLUS INGLES </h1>
        </div>
        
        <div class="d-flex justify-content-center animate__animated animate__bounceIn">
             <h1 class=" titulo2  plus"  id="confugurar1" >PLUS INGLES  </h1>
        </div>
        <div class="d-flex justify-content-center">   
            <img class="imagenesPortadaFondo animate__animated animate__bounceIn" src="https://static.preply.com/static/ssr/_next/static/images/choose_tutor-ce5a3d44c76764b9a533e8a8dadc2a57.svg" alt="">
        </div>

        <div class="d-flex justify-content-center animate__animated animate__bounceIn">
            <button type="button" onclick="direccionarVista('instalar')" class="empezar btn btn-success">INSTALAR PLUS</button>
        </div>

    </div>

    <div class="footer">
        <h5>Este plus te muestra vocabulario inglés,</h5>
    <h5> junto con evaluaciones.</h5>
    <img width="150px" class="imagenFooter" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTtj4UTOXW6n_OMoldxSeeX4d7p1D9ovqZVWscgyaMqZH9IIHst2UI8cxtPJokx5qr9Zx4&usqp=CAU" alt="">
    </div>
<canvas id="canv" class="canva"></canvas>


<script>
$(document).ready(function () {
    deletrearPalabra('confugurar1','PLUS  INGLES','PLUS INGLES');
  //  deletrearPalabra('confugurar2','DEL LECTOR DE VOZ','DEL LECTOR DE VOZ.');
    });
</script>

    



@endsection
