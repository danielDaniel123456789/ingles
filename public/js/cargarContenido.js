function cargarContenido(txt){
    var elements = document.getElementsByClassName("contenido");
    for(var i=0;i<elements.length;i++)
    {
      elements[i].innerHTML = txt;
    }
  }