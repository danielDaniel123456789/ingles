@extends('layouts.appInforme')
@section('content')
<div class="container p-4">
    <h5>Insertar Categoria</h5>
<div class="d-flex justify-content-center text-center">

        <div class="card">
            <div class="container p-4">
                <form  method="post" action="{{ route('nuevaCategoria') }}"  >
                    @csrf
                    <div class="mb-3">
                      <label class="form-label text-primary">NUEVA CATEGORIA </label>
                      <input type="text" class="form-control" name="name" placeholder="Nombre"  required>
                   </div>
                    <button type="submit" class="btn btn-primary">GUARDAR</button>
                  </form>
            </div>
    
        </div>
 


  
</div>


   
</div>
<script>
 function data(){
 }

</script>
@endsection



