@extends('layouts.appInforme')
@section('content')
<div class="container p-4 ">

 @if(session("exito"))
    <x-exito/>
@endif

@if(session("error"))
<x-error/>
@endif

    <div class="d-flex justify-content-center text-center" >
   
           <form  method="post" action="{{ route('insertarVervo') }}"  >
              @csrf
              <div>
               <h5 class="text-primary">Insertar Vervo</h5>
              </div>
              <div class="mb-3">
                <label class="form-label">Español</label>
                <input type="text" class="form-control" name="espayol" placeholder="Español"  required>
             </div>

             <div class="mb-3">
                <label class="form-label">Ingles</label>
                <input type="text" class="form-control" name="ingles" placeholder="Ingles"  required>
             </div>

             <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input type="text" class="form-control" name="imagen" placeholder="Imagen"  required>
             </div>

             <div class="mb-3">
               <label class="form-label">Ancho </label>
               <input type="number" min="5" class="form-control" name="ancho" placeholder="Ancho"  required>
            </div>


              <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        
    </div>
   


</div>
<script>
 

</script>
@endsection



