@extends('layouts.appInforme')
@section('content')


@if(session("exito"))
<x-exito/>
@endif

@if(session("error"))
<h5>ddddddddd</h5>
<x-error/>
@endif
 

<div class="container">
    <div class="d-flex">
        <h4 class="text-primary">CATEGORIAS</h4>
        <a href="#" onclick="direccionarVista('nuevaCategoria')" >  <span class="">  <i class="fa fa-plus-circle" aria-hidden="true"></i></span> </a>
    </div>

<table id="myTable" class="table">
  <tr class="header">

    <th >Categoria</th>
    <th >Modificar</th>

  </tr>
  @foreach ($data as $item)
  <tr>
       <td>{{$item->name}}</td>
  
       <td>
           <span onclick="modificar('{{{$item->id}}}','{{$item->name}}')">SI</span>
       </td>
     </td>
   </tr> 
  @endforeach
</table>



</div>
<script>

    function modificar(id, name){

           Swal.fire({
          title: 'MODIFICAR',
          html:
          `
          
          <form  method="post" action="{{ route('modificarCategoria') }}"  >
              @csrf
              <input id="id" type="hidden"  name="id"   required>
            <H5 class="text-primary" id="nombreActual"> </H5>
              <div class="container p-4">
                <div class="mb-3 ">
                <label class="form-label">NUEVO NOMBRE</label>
                <input type="text" class="form-control" name="name" placeholder="Nombre"  required>
             </div>
              <button type="submit" class="btn btn-primary">MODIFICAR</button>

</div>

              
            </form>`,
           // confirmButtonText: 'Save',
          showCancelButton: true,
          showConfirmButton:false,
          cancelButtonText: 'Cancelar',
         
        })
        $('#id').val(id);
      document.getElementById("nombreActual").innerHTML = "Nombre actual: "+name;
    }

</script>
@endsection



