@extends('layouts.app')
@section('content')
<div class="container p-4 ">

 @if(session("exito"))
    <x-exito/>
@endif

@if(session("error"))
<x-error/>
@endif


    <div class="" >
        <h5>Insertar Vervo</h5>
           <form  method="post" action="{{ route('insertarVervo') }}"  >
              @csrf
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

              <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        
    </div>
   


</div>
<script>
 

</script>
@endsection



