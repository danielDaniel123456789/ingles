@extends('layouts.appVista')

@section('content')

<style>
  body{
    background-color: black !important;
  }

  table {
  display: block;
  overflow-x: auto;
  white-space: nowrap;
}

table tbody {
  height: 150px;
    display: inline-block;
    width: 100%;
    overflow: auto;
}

</style>
<div class="salir">
  <a href="javascript:rutaPublica()" ><i class="text-primary fa-2x fa fa-arrow-left" aria-hidden="true"></i></a>
</div>




<div class="container p-4 text-center">

  <div class="d-flex justify-content-center p-2">
    <h4 class="text-white deletrearPalabra " id="deletrearPalabra"></h4>
  </div>

<div class="container">

<div class="container">
  <div class="row">
    <div class="col">
     

    <h4 class="text-white animate__animated animate__bounce">PALABRAS APRENDIDAS</h4>
  <div class="d-flex justify-content-center">
    <div class=" p-4">
      <table id="myTable" class="text-white table animate__animated animate__bounce">
        <tr class="header text-white">
            <th ><input style="border: 0; font-style:italic;" class="  form-control" type="search" id="myInput" onkeyup="filterTable()" placeholder="Buscar palabra" title="Type in a name">
            </th>
            <th>INGLES</th>
            <th>REPASAR</th>
            <th>NIVEL</th>
        </tr>
        
        @foreach ($data as $item)
          <tr>
            <td>{{ ucfirst($item->espayol)}}</td>
             <td>{{ucfirst($item->ingles)}}</td>
             <td> <y  onclick="reparar('{{$item->id}}','{{$item->espayol}}','{{$item->ingles}}')">
              <i class="fa fa-check-circle" aria-hidden="true"></i></y>
             </td>
             <td>
             {{$item->nivelAprendizaje}}
             </td>
          </tr>
        @endforeach
       
      </tr>
    </table>
    </div>
  </div>

    </div>
    <div class="col">
    <h4 class="text-white animate__animated animate__bounce">PALABRAS CON PRIORIDAD</h4>

    <div class="d-flex justify-content-center">
    <div class=" p-4">
      <table id="myTableDiccionario" class="text-white table animate__animated animate__bounce">
        <tr class="header text-white">
            <th ><input style="border: 0; font-style:italic;" class="  form-control" type="search" id="myInputDiccionario" onkeyup="filterTableDiccionario()" placeholder="Buscar palabra" title="Type in a name">
            </th>
            <th>INGLES</th>

        </tr>
        
        @foreach ($prioridades as $item)
          <tr>
            <td>{{ ucfirst($item->espayol)}}</td>
             <td>{{ucfirst($item->ingles)}}</td>
          
          </tr>
        @endforeach
       
      </tr>
    </table>
    </div>



  

    

  </div>
</div>


  

</div>
   


    
</div>

<div class="d-flex justify-content-center">

<div class="container">
  <div class="row">
    <div class="col">
    <div class=" p-4 text-white">
    <h3>DICCIONARIO</h3>
      <table id="myTablePrioridad" class="text-white table animate__animated animate__bounce">
        <tr class="header text-white">
            <th ><input style="border: 0; font-style:italic;" class="  form-control" type="search" id="myInputPrioridad" onkeyup="filterTablePrioridad()" placeholder="Buscar palabra" title="Type in a name">
            </th>
            <th>INGLES</th>

        </tr>
        
        @foreach ($historial as $item)
          <tr>
            <td>{{ ucfirst($item->espayol)}}</td>
             <td>{{ucfirst($item->ingles)}}</td>
          
          </tr>
        @endforeach
       
      </tr>
    </table>
    </div>
    </div>
    <div class="col">
     
    <button class="btn btn-primary" onclick="limpiarPrioridades()">limpiar prioridades</button>
    </div>
   
  </div>
</div>


    




<script>
  $(document).ready(function () {
    deletrearPalabra('deletrearPalabra','HISTORIAL.','APRENDIZAJE.');
    });

 function limpiarPrioridades(){
  Swal.fire({
          title: '¿DESEAS LIMPIAR PRIORIDADES?',
          html:
          `
          
          <form  method="post" action="{{ route('limpiarPrioridades') }}"  >
              @csrf
              <div class="mb-3">
             
             </div>
             <div class="mb-3">
                <button type="submit" class="btn btn-primary">SI</button>
             </div>
  </form>   
            `,
           // confirmButtonText: 'Save',
          showCancelButton: true,
          showConfirmButton:false,
          cancelButtonText: 'CANCELAR',
         
        })
 }

 function reparar(txt, espayol, ingles){

           Swal.fire({
          title: '¿DESEAS REPASAR ESTA PALABRA?',
          html:
          `
          
          <form  method="post" action="{{ route('repasarPalabra') }}"  >
              @csrf
              <div class="mb-3">
                <h3>${espayol.toUpperCase()}</h3>
                <h3>${ingles.toUpperCase()}</h3>
                <input type="hidden"  name="id_vervo" value="${txt}" required>
             </div>
             <div class="mb-3">
                <button type="submit" class="btn btn-primary">SI</button>
             </div>
  </form>   
            `,
           // confirmButtonText: 'Save',
          showCancelButton: true,
          showConfirmButton:false,
          cancelButtonText: 'CANCELAR',
         
        })

    }



</script>


@endsection
