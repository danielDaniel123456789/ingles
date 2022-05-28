@extends('layouts.appInforme')

@section('content')
<div class="container">
    
  @php
      $contador=0;
  @endphp
    @if(session("exito"))
    <x-exito mensaje="exito" />
@endif

    <div style="height: 300px;overflow: auto;" id="caja1" >
        <table id="myTable" class="table">
            <tr class="header">
                <th ><input  class="form-control" type="text" id="myInput" onkeyup="filterTable()" placeholder="Search for names.." title="Type in a name">
                </th>
                <th >Ingles</th>
                <th >Imagen</th>
                <th >Ver</th>
                <th >Revisada</th>
                <th>Demo</th>
              </tr>   
            @foreach ($data as $item)
            <tr >
                <td>{{ $item->espayol}} </td>
                 <td>{{$item->ingles}}</td>
                 <td> <span onclick="imagen('{{ $item->imagen}}')"><i class="fa fa-search text-primary" ></i></span></td>
                 <td><span onclick="informe('{{ $item->id}}','{{ $item->espayol}}','{{ $item->ingles}}','{{ $item->imagen}}','{{ $item->ancho}}')">
                    <i class="fa fa-pencil-square-o  text-primary" ></i></span> </td>

                    
                    <td>
                

                @if ( $item->revisada==0)
                   <span onclick="revisar('{{ $item->id}}','{{ $item->espayol}}','{{ $item->ingles}}','{{ $item->imagen}}')"> No  <i class="fa fa-bell text-primary" aria-hidden="true"></i></span>
                @else
             <span ><i class="fa fa-check-circle text-danger " aria-hidden="true"></i></span>
                @endif
         </td>
                    <td> <a href="#" onclick="direccionarVista('demoVervo?id={{ $item->id}}')">DEMO</a></td>
              </tr>
            @endforeach


           
          </tr>
        </table>
  
    </div>



</div>



<script>
document.getElementById("myTable").deleteRow(0);

        function imagen(txt){
            Swal.fire({
  title: 'Imagen',
  html:
  `
  <img src="${txt}" alt="">
  `,
   // confirmButtonText: 'Save',
  showCancelButton: true,
  showConfirmButton:false,
  cancelButtonText: 'Cancelar',
 
})
}

        function revisar(id, espayol, ingles, imagen){

           Swal.fire({
          title: 'REVISADA CORRECTAMENTE',
          color: '#0033FF',
          html:
          `     
          <form class="p-4" method="post" action="{{ route('vervoRevisada') }}"   >
              @csrf
              <div class="d-flex justify-content-center">
                <input type="hidden" class="form-control" id="id" name="id" required  >
                 <div >
                  <h6 id="tituloEspayol" ></h6>
                    <div class="input-group mb-3">
                    <span class="input-group-text" >Español: </span>
                    <input type="text" class="form-control" id="espayol" name="espayol" required disabled>
                    </div>
                    
                    <div class="input-group mb-3">
                    <span class="input-group-text">Ingles: </span>
                    <input type="text" class="form-control" id="ingles" name="ingles" required disabled>
                    </div>

                    <div class="input-group mb-3">
                    <span class="input-group-text">Imagen: </span>
                    <input type="text" class="form-control" id="imagen" name="imagen" required disabled>
                    </div>
                 </div>      
                </div>
                <button type="submit" class="btn btn-primary">REVISADA</button> 
          </form>`,
           // confirmButtonText: 'Save',
          showCancelButton: true,
          showConfirmButton:false,
          cancelButtonText: 'CANCELAR',
        });
    
       // document.getElementById("tituloEspayol").value = "Español: "+espayol;
        

        
        $('#id').val(id);
        $('#espayol').val(espayol);
        $('#ingles').val(ingles);
        $('#imagen').val(imagen);
    }

 function informe(id, espayol, ingles, imagen, ancho){
           Swal.fire({
          title: 'MODIFICAR',
          html:
          `     
          <form class="p-4" method="post" action="{{ route('vervo.store') }}"  >
              @csrf
              <div class="d-flex justify-content-center">
                <input type="hidden" class="form-control" id="id" name="id" required>
                 <div >
                    <div class="input-group mb-3">
                    <span class="input-group-text" >Español: </span>
                    <input type="text" class="form-control" id="espayol" name="espayol" required>
                    </div>
                    
                    <div class="input-group mb-3">
                    <span class="input-group-text">Ingles: </span>
                    <input type="text" class="form-control" id="ingles" name="ingles" required>
                    </div>

                    <div class="input-group mb-3">
                    <span class="input-group-text">Imagen: </span>
                    <input type="text" class="form-control" id="imagen" name="imagen" >
                    </div>

                    <div class="input-group mb-3">
                    <span class="input-group-text">Ancho: </span>
                    <input type="number" min="5" class="form-control" id="ancho" name="ancho" required>
                    </div>

                 </div>      
                </div>
                <button type="submit" class="btn btn-primary">GUARDAR</button> 
          </form>`,
           // confirmButtonText: 'Save',
          showCancelButton: true,
          showConfirmButton:false,
          cancelButtonText: 'CANCELAR',
        });
        $('#id').val(id);
        $('#espayol').val(espayol);
        $('#ingles').val(ingles);
        $('#imagen').val(imagen);
        $('#ancho').val(ancho);
    }
</script>

@endsection
