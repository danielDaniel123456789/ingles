@extends('layouts.appHistorial')
@section('content')
@foreach ($data as $item )
@php
              $espayol=  $item->espayol;
              $ingles= $item->ingles;
              $id= $item->id;
              $imagen=  $item->imagen;
              $nivelAprendizaje=$item->nivelAprendizaje;
                @endphp
             {{$item->espayol}}    {{$item->nivelAprendizaje}}
@endforeach

   <form  method="post" action="{{ route('bajarNivelVervo') }}"  >
      @csrf
      <input type="text" name="id" value="{{$id}}">
      <input type="text" name="nivel" value="{{$nivelAprendizaje}}">
      <button type="submit" >bajar</button>
    </form>

    <form  method="post" action="{{ route('subirNivelVervo') }}"  >
        @csrf
        <input type="text" name="id" value="{{$id}}">
        <input type="text" name="nivel" value="{{$nivelAprendizaje}}">
        
        <button type="submit">subir</button>
      </form>


<div class="container p-4">
    <div class="d-flex justify-content-center">
        <div class="card text-center " >
          <div class="container p-4 ">
            <h2 class="text-primary">EVALUACIÓN </h2>
            <div class="p-4">
                <h6 class="text-primary">TRADUCE: {{$espayol}}</h6>
                <input id="palabraIngles" type="text" class="form-control" placeholder="Significado">
            </div>

            <div >
                <button class="btn btn-primary" onclick="revisar()">REVISAR</button>
            </div>
         
          </div>
        </div>
    </div>


    

</div>

<script>

    function revisar(){
    respuestaIngles= $('#palabraIngles').val();
    espayol= '{{$espayol}}';
    ingles= '{{$ingles}}';
 
    if(palabraIngles.length>1){
        if(respuestaIngles.equals(ingles)){
                alert('si');
        }
        else
        {
            alert('no');
        }
        
    }

    }
</script>

@endsection



