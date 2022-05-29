@extends('layouts.appVista')
@section('content')
<div class="container p-4">

    <canvas id="canv"></canvas>
  
    <div class="container ">

        <div class="d-flex justify-content-center p-">
 <div class="card justify-content-center">
   
     <div class="container p-4 text-center text-primary p-4">
        <h4 class="animate__animated animate__bounce">Lista de vervos terminada</h4> 
        
<div class="animate__animated animate__bounce p-4">

    <button class="btn btn-outline-primary"   onclick="repasarVervos()">INICIAR DESDE 0 </button>
</div>

     </div>
   
 </div>
        </div>

    </div>


    <div class="container p-5">

        <div class="d-flex justify-content-center p-">
 <div class="card justify-content-center">
   
     <div class="container p-4 text-center text-primary p-4">
   
            <H4 class="animate__animated animate__bounce">MAS  PALABRAS</H4>
        
        <div class="animate__animated animate__bounce p-4">
            <button class="btn btn-outline-primary"   onclick="comprar()">         <i class="fa-3x fa fa-cart-plus" aria-hidden="true"></i> </button>
        </div>

     </div>
   
 </div>
        </div>

    </div>
   
 

</div>
<script>
    function repasarVervos(){
      
           Swal.fire({
          title: '¿Deseas repasar los verbos nuevamente?',
          html:
          `
           <form  method="post" action="{{ route('reiniciarVervosDesde0') }}"  >
              @csrf
            <div class="container p-4">
                <button type="submit" class="btn btn-primary">SI</button>
                </div>
            </form>`,
           // confirmButtonText: 'Save',
          showCancelButton: true,
          showConfirmButton:false,
          cancelButtonText: 'Cancelar',
         
        })
    }
</script>
 
@endsection



