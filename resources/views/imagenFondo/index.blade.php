@extends('layouts.appInforme')
@section('content')
<div class="">
    <div class="container">
        <form  method="post" action="{{ route('insertarImagenFondo') }}"  >
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="imagen" placeholder="AGREGAR IMAGEN" required>
       
                    <button type="submit" class="input-group-text">INSERTAR</button>
         
              </div>
              
          
          </form>
    </div>
    <div class="text-center" >
        @foreach ($data as $item)
                <div class=" p-2">
                    <div class=" p-4">
                        <div class="">
                            <img src="{{$item->imagen}}" alt="">
                    
                            <span  onclick="eliminar('{{$item->id}}')"><i class="text-primary fa-4x fa fa-trash" aria-hidden="true"></i></span>
                        </div>
                    
                    </div>
                
                </div>
  
        @endforeach
    </div>




     
 </div>

   <form style="display: none" id="formImagenEliminar" method="post" action="{{ route('eliminarImagenFondo') }}"  >
      @csrf
      <div class="mb-3">
       <input type="text" name="id_imagen" id="id_imagen">
      <button type="submit" class="btn btn-primary">Listo</button>
      </div>
    </form>



<script>

  function eliminar(txt){
      document.getElementById("id_imagen").value = txt;
        document.getElementById('formImagenEliminar').submit();
  }  
  
  


</script>
@endsection



