@extends('layouts.appVista')

@section('content')
<div class="salir">
  <a href="javascript:direccionarVista('vista')" ><i class="fa-2x fa fa-arrow-left" aria-hidden="true"></i></a>
</div>




<div class="container p-4 text-center">

  <div class="d-flex justify-content-center p-2">
    <h4 class="text-primary deletrearPalabra " id="deletrearPalabra"></h4>
  </div>

<div class="container">
  <div class="d-flex justify-content-center">
    <div class=" p-4">
      <table id="myTable" class="table animate__animated animate__bounce">
        <tr class="header">
            <th ><input style="border: 0; font-style:italic;" class="form-control" type="search" id="myInput" onkeyup="filterTable()" placeholder="Buscar palabra" title="Type in a name">
            </th>
            <th>INGLES</th>
            <th>REPASAR</th>
        </tr>
        
        @foreach ($data as $item)
          <tr>
            <td>{{ ucfirst($item->espayol)}}{{ $item->id}}</td>
             <td>{{ucfirst($item->ingles)}}</td>
             <td> <y  onclick="reparar('{{$item->id}}','{{$item->espayol}}','{{$item->ingles}}')">
              <i class="fa fa-check-circle" aria-hidden="true"></i></y>
             </td>
          </tr>
        @endforeach
       
      </tr>
    </table>
    </div>
  </div>
  <img class="imagenesPortadaFondo animate__animated animate__bounce" src="{{$imagenFondo}}" alt="">
</div>
   

<div class="m-4 footer d-flex">
  <a class="text-secondary" href="https://chrome.google.com/webstore/detail/new-tab-redirect/icpgjfneehieebagbmdbhnlpiopdcmna"> Desinstalar plus </a>
   
</div>
    
</div>
<canvas id="canv" class="canva"></canvas>


<script>
  $(document).ready(function () {
    deletrearPalabra('deletrearPalabra','HISTORIAL.','APRENDIZAJE.');
    });

 

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
