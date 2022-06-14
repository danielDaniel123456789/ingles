@extends('layouts.appVista')

@section('content')

<div class="container text-center">

  <div class="container">
     
    <h6>Copiar</h6>
    
    <input type="text" value="xxxxxx" id="myInput" hidden>
    
    <button onclick="portapapeles()">Copiar</button>
  </div>
 
</div>
 

<script>
function portapapeles() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);
  
  /* Alert the copied text */

}
</script>

@endsection