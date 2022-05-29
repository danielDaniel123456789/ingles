@extends('layouts.appVista')
@section('content')
<canvas id="canv"></canvas>
@foreach ($data as $item )
@php
              $espayol=  $item->espayol;
              $ingles= $item->ingles;
              $id= $item->id;
              $imagen=  $item->imagen;
              $nivelAprendizaje=$item->nivelAprendizaje;
                @endphp

@endforeach


@if(session("exito"))
<x-exito/>
@endif

@if(session("error"))
<x-error/>
@endif

   <form id="bajarNivel" style="display: none" method="post" action="{{ route('bajarNivelVervo') }}"  >
      @csrf
      <input type="text" name="id" value="{{$id}}">
      <input type="text" name="nivel" value="{{$nivelAprendizaje}}">
      <button type="submit" >bajar</button>
    </form>

    <form id="subirNivel" style="display: none" method="post" action="{{ route('subirNivelVervo') }}"  >
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
                <input id="palabraIngles02" type="text" class="form-control" placeholder="Significado">
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
        
    //respuestaIngles= $('#palabraIngles02').val();
    respuestaIngles=  document.getElementById('palabraIngles02').value;
    //convertir a miscula
    respuestaIngles= respuestaIngles.toLowerCase();
    espayol= '{{$espayol}}';  
    ingles= '{{$ingles}}';


    //convertir a miscula
    ingles=ingles.toLowerCase();

    if(respuestaIngles.length>1){
        if(respuestaIngles.localeCompare(ingles)){
            //falso
            document.getElementById('bajarNivel').submit();
        }
        else
        {
            //Correcto
            document.getElementById('subirNivel').submit();
        }
        }
    
        
    

    }
</script>

@endsection



