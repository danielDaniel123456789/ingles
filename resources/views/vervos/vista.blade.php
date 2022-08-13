
@extends('layouts.appVista')

@section('content')





<style>

.efectoSombra1{  text-shadow: red 1px 0 10px !important;}
.efectoSombra2{ text-shadow: #7D3C98 1px 0 10px !important;}
.mostrarPalabra{ font-size: 16px !important; }
.recordatorio {     
    position: absolute; top: 0px;   
    width: 100%;   
    z-index: 16 !important;
  }
</style>
@php
   
    $animaciones = array(
      "animate__bounce", "animate__flash",
     "animate__shakeX", "animate__shakeX",
     "animate__tada", "animate__tada", "animate__jello", "animate__heartBeat",
     "animate__bounceIn", "animate__bounceInDown", "animate__fadeInDown",
     "animate__fadeInUp", "animate__fadeInUp", "animate__flipInY",
      "animate__rotateIn", "animate__rotateInDownLeft", "animate__rotateInUpLeft",
      "animate__rotateInUpRight"  );

      $imagenesTitulos = array(
      "https://asepyme.com/wp-content/uploads/2019/05/preguntas-correctas.png",
      "https://cdn-icons-png.flaticon.com/512/2353/2353677.png",
      "https://www.matchbox.io/content/images/2020/05/QOTD-logo.png",
      "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMp4QMt_vPQZKsXl_Q1XRXcxqcaNG1MOxJ5etDymUfn8x1tS7UGkvz5Yaoeae3_Vo1Wuw&usqp=CAU",
      "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRNP90vq48riULjyTv7lW9xQ2FjYtNTh_no9mvctowQdzutbn09DHt7lf5VjDCHly-i9_c&usqp=CAU",
      "https://elrincondetrabajoliterario.files.wordpress.com/2014/09/inter-2.png",
      "https://gesvin.files.wordpress.com/2018/04/comoformularpreguntasefectivas4tc3a9cnicasaula-artc3adculo-bloggesvin.jpg",
      "https://img.freepik.com/vector-gratis/ilustracion-concepto-preguntas_114360-1513.jpg"

    );

     $colores = array(
      "#B71C1C","#880E4F","#4A148C","#311B92", "#0D47A1","#01579B", "#006064",
      "#1B5E20", "#827717", "#F57F17", "#BF360C"
     );

     $coloresBrillantes= array(
      "#F4D03F", "#2ECC71","#E91E63","#E53935","#66FF66"
     );

      $animacion=  $animaciones[array_rand($animaciones)] ;
      $color=  $colores[array_rand($colores)] ;
      $colorBrillante= $coloresBrillantes[array_rand($coloresBrillantes)];
      $imagenesTitulo=$imagenesTitulos[array_rand($imagenesTitulos)];

@endphp
@foreach ($data as $item)   
<?php   

$id=$item->id;  $palabraIngles=$item->ingles;  
$palabraEspayol=$item->espayol; 
$idActual= $item->id; 
$imagen=$item->imagen; 
$tamayoImagen=strlen($imagen);
$ancho=$item->ancho; 
if(isset($item->prioridad)){
 $prioridad= $item->prioridad;
}
else {
 $prioridad='falso';
}

?>   
@endforeach





<div id="x" class="moverCursor" style="color:{{$color}}; " onclick="direccionarGoogle()">

  <div id="cursorLetra" class="">
    <span class="cursorLetra " >
      {{$palabraIngles}}  
    </span>
  </div>
</div>


  <div class="container text-center ">
  <div id="titulo" class="tituloPrincipal animate__animated wave {{$animacion}}">
  {{$palabraIngles}}
  </div>

   <div class="contenedor animate__animated {{$animacion}}">
   <img class="imagenFondo wave" onclick="direccionarGoogle()" src="{{$imagenesTitulo}}"  alt="">
 

  <div class="centrado subTitulo wave">
  <span class="" style="color:{{$color}}">
    ...{{$palabraIngles}}??
    </span>
  </div>
</div>

</div>


<div id="escucharClick" class="escucharClick" onclick="direccionarGoogle()" onmouseover="eventoDireccionar()">
</div>
<div id="recordatorio" class="container d-flex recordatorio " onmouseover="eventoDireccionar()" 
onclick="direccionarGoogle()" >

</div>


<div id="cuerpo"  onclick="direccionarGoogle()">
  
<div id="pantalla">
  <div class="configuracion">
    <a   onclick="direccionarVista('configuracion')">  <i style="color:{{$color}};  " class="configuracionHover fa fa-cogs fa-2x" aria-hidden="true"></i> </a>
  <br>  <br>
    <a  href="javascript:direccionarVista('historial')"><i style="color:{{$color}};" class="configuracionHover fa fa-book fa-2x" aria-hidden="true"></i></a>
  <br><br>
 
  <a href="javascript:direccionarVista('evaluacion')"><i class="fa fa-gavel fa-2x configuracionHover" style="color:{{$color}};" aria-hidden="true"></i></a>
  <br><br> <br><br>
  <a href="#" onclick="copiarLink()"><i style="color:{{$color}};" class="fa fa-clone fa-2x configuracionHover" aria-hidden="true"></i></a>
  
</div>

 
  
  </div>

  
  
  <div class="container p-5 ">

    <div class="d-flex justify-content-center" id="mostrarPalabra">



    </div>

  <form id="myForm02" style="display: none" method="post" action="{{ route('formAprendida') }}"  >
    @csrf
    <input type="text" name="soyPrioridad" value="{{$prioridad}}">
    <input type="text" name="id_vervo" value="{{$id}}">
    <input type="text" name="nivel"  value="1">
    <button type="submit" class="btn btn-primary">Listo</button>
  </form>
  
  <div class="footer animate__animated animate__fadeInUp" id="palabraAprendida">
    <div   class="aprendidaPosicion "  >
      <div id="textoAprendidaEfecto" onclick="aprendidaEvento()">
        
         <i style="color:{{$color}}"   class=" fa fa-check-square-o fa-2x " aria-hidden="true"></i>
      </div> 
    </div>
    <div class="container">
  
      <ul class="nav justify-content-center ">
      <li class="nav-item">
        <h5>    <a class="nav-link text-secondary" style="color:{{$color}}" href="#">Palabras aprendidas: {{$cantidad}}</a>
        </h5>
     </li>
     
 
  
    </div>
  </div>
</div>


<div id="mensajeAprendida" class="mensajeAprendida " style="display: none">


  <div class="d-flex justify-content-center">
    <div class="centrar animate__animated animate__backInDown">
      <div class="card bg-dark">
        <div class="container text-center p-4">
    
          <h5 class="text-warning">Palabra Aprendida</h5>
         <h1 class="text-warning"><i class="fa fa-check" aria-hidden="true"></i></h1>
        </div>
        </div>
    </div>
  </div>
</div>

</div>

<div id="moverPalabra" class="moverPalabra">
  <h1>  {{$palabraEspayol}} {{$palabraIngles}}  </h1>
</div>

<input id="myInput" type="text" value="yyy" hidden>
<script>
        var index = 0;
        var contador=0;
        var text = "{{$palabraIngles}}";
        var tiempoDeEspera = 80;

 
  //setTimeout(function(){  document.getElementById("x").style.display = "block";; }, 1000);
  
  cambiarColor();
  cambiarPalabraTitulo();
function cambiarPalabraTitulo(){
  if(contador==0){

    document.getElementById("titulo").innerHTML = `
    <span class="" style="color:{{$color}}">
      {{$palabraEspayol}}    {{$palabraEspayol}}    {{$palabraEspayol}}  {{$palabraEspayol}}    {{$palabraEspayol}}    {{$palabraEspayol}}
    </span>
   `;
   contador++;   
     setTimeout(function(){  cambiarPalabraTitulo(); }, 1000);
  }

  else{

    document.getElementById("titulo").innerHTML = `
    <span class="" style="color:#FF1493">
      {{$palabraIngles}}   {{$palabraIngles}}   {{$palabraIngles}}   {{$palabraIngles}}   {{$palabraIngles}}   {{$palabraIngles}}
    </span>
   `;
   contador=0;
   setTimeout(function(){  cambiarPalabraTitulo(); }, 1000);
  }

}

function mostrarPalabra(){
  document.getElementById("mostrarPalabra").innerHTML = `
    <span class="fa-2x wave  animate__animated {{$animacion}} efectoSombra2" style="color:{{$color}}">
      {{$palabraIngles}}
    </span>
   `
   ;
 
  setTimeout(function(){ 
    document.getElementById("mostrarPalabra").innerHTML = `
    <span class="fa-2x wave  animate__animated {{$animacion}} efectoSombra1" style="color:{{$color}}">
      {{$palabraEspayol}}
    </span>
   
    `;
   }, 500);
  
 setTimeout(function(){ mostrarPalabra(); }, 1000);

}

function cambiarColor(){
  document.getElementById("cursorLetra").innerHTML = `
    <span class="" style="color:{{$color}}">
      {{$palabraIngles}}
    </span>
   `
   ;
 
  setTimeout(function(){ 
    document.getElementById("cursorLetra").innerHTML = `
    <span class="" style="color:{{$color}}">
      {{$palabraEspayol}}
    </span>    `;
   }, 500);
  
      setTimeout(function(){ cambiarColor(); }, 1000);
}

function cambiarColor2(){
  document.getElementById("cursorLetra").innerHTML = `
    <span class="efectoSombra2" style="color:{{$color}}">
      {{$palabraIngles}}
    </span>
   `
   ;
 
  setTimeout(function(){ 
    document.getElementById("cursorLetra").innerHTML = `
    <span class="efectoSombra1" style="color:{{$color}}">
      {{$palabraEspayol}}
    </span>    `;
   }, 500);
  
      setTimeout(function(){ cambiarColor(); }, 1000);
}
  function copiarLink(){
 /* Get the text field */
 var copyText = document.getElementById("myInput");
    
    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
  
    /* Copy the text inside the text field */
    navigator.clipboard.writeText(copyText.value);
    
    /* Alert the copied text */

    Swal.fire({
  title: 'Link Copiado',
  timer: 1500,
  showConfirmButton: false,
  backdrop: `
    rgba(27,38,49,0.8)
    url("/images/nyan-cat.gif")
    left top
    no-repeat
  `,
  showClass: {
    popup: 'animate__animated animate__fadeInDown'
  },
  hideClass: {
    popup: 'animate__animated animate__fadeOutUp'
  }
})


}
function eventoDireccionarxxxxMetodoDesaptivado(){
  pronunciarIngles('{{$palabraIngles}}','{{$velocidad}}');
  pronunciarEspayol('{{$palabraEspayol}}');
    
  //document.getElementById("avisoRecordatorio").style.display = "block";
 

   setTimeout(function(){ window.location.href = "https://www.google.com/"; }, 2500);
  
}



function direccionarGoogle() {
  pronunciarIngles('{{$palabraIngles}}','{{$velocidad}}');
  pronunciarEspayol('{{$palabraEspayol}}');
  setTimeout(function(){ window.location.href = "https://www.google.com/"; }, 1500);
  
}
function cambiarPalabraIngles(){
  document.getElementById("cambiarPalabra").innerHTML = "{{ucwords($palabraIngles)}}";
}
function cambiarPalabraEspayol(){
  document.getElementById("cambiarPalabra").innerHTML = "{{ucwords($palabraEspayol)}}";
}

function aprendidaEvento(){
 // alert('ss');
  document.getElementById("palabraAprendida").style.visibility = "hidden";
document.getElementById("pantalla").style.visibility = "hidden";
document.getElementById("mensajeAprendida").style.display = "block";
setTimeout(function(){  document.getElementById("myForm").submit(); },2500);
 document.getElementById("myForm02").submit();
}



let ball = document.getElementById("moverPalabra");
  
var myVar = setInterval(spostaDiv, 90);
var margin = 0;

let l = window.screen.width;
let w =  screen.width;

function spostaDiv() {
  console.log(w);
  if (margin == w) {
    margin = 0 + "px";
  } else {
    ball.style.marginLeft = margin + "px";
  }
  margin += 10;

  if(margin>screen.width){
     margin=0;
      spostaDiv();
  }
}


  </script>




@endsection
