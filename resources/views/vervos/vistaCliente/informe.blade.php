@extends('layouts.appVista')

@section('content')
<div class="container p-4 text-center">
    <h6 class="text-primary">HISTORIAL</h6>
    <table id="myTable" class="table">
        <tr class="header">
            <th ><input class="form-control" type="text" id="myInput" onkeyup="filterTable()" placeholder="Search for names.." title="Type in a name">
            </th>
            <th>INGLES</th>
            <th>REPASAR</th>
        </tr>
        
        @foreach ($data as $item)
        <tr>
            <td>{{ucfirst($item->espayol)}}</td>
             <td>{{ucfirst($item->ingles)}}</td>
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
