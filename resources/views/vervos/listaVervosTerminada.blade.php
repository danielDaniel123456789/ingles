@extends('layouts.appUsuario')
@section('content')
<div class="container p-4">
 <h4>Lista de vervos termina</h4> 
 <a href="#" onclick="repasarVervos()">repasarVervos</a>


   
 

</div>
<script>
    function repasarVervos(){
           Swal.fire({
          title: '¿Deseas repasar los vervos nuevamente?',
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



