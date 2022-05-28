@extends('layouts.app')
@section('content')
<div class="container p-4">
    <div class="card justify-content-center m-4 " >

        <div class="container p-4">
            <form  method="post" action="{{ route('home') }}"  >
                @csrf
                <div class="mb-3">
                  <label class="form-label">Velocidad de imagen</label>
              
                </div>
    
               <div class="mb-3">
                  <label class="form-label">Rotar colores de fondo</label>
                  <input type="text" class="form-control" name="name" placeholder="Velocidad de imagen"  required>
               </div>
    
                <button type="submit" class="btn btn-primary">Listo</button>
              </form>

        </div>
  
    </div>
           
        
</div>
<script>

</script>
@endsection



