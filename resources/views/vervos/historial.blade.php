@extends('layouts.appUsuario')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">HISTORIAL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="direccionarVista('mostrarVervo')">  INICIO</a>
        </li>
  
      </ul>
    </div>
  </div>
</nav>
<div class="container">

  


    <table id="myTable" class="table">
        <tr class="header">
            <th ><input class="form-control" type="text" id="myInput" onkeyup="filterTable()" placeholder="Search for names.." title="Type in a name">
            </th>
            <th>Ingles</th>
            <th>Repasar</th>
        </tr>
  
        @foreach ($data as $item)
        <tr>
            <td>{{ $item->espayol}}{{ $item->id}}</td>
             <td>{{$item->ingles}}</td>
             <td> <span  onclick="reparar('{{$item->id}}','{{$item->espayol}}','{{$item->ingles}}')"><i class="fa fa-check-circle" aria-hidden="true"></i></span> </td>
          </tr>
   
        @endforeach
       
      </tr>
    </table>
    
</div>

<script>

    function reparar(txt, espayol, ingles){

           Swal.fire({
          title: '¿Deseas repasar esta palabra?',
          html:
          `
          
          <form  method="post" action="{{ route('repasarPalabra') }}"  >
              @csrf
              <div class="mb-3">
                <h3>${espayol}</h3>
                <h3>${ingles}</h3>
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
          cancelButtonText: 'Cancelar',
         
        })

    }

</script>


@endsection
