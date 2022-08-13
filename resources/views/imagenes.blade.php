<!DOCTYPE html>
<html lang="en">
  <head>

 
  </head>
  <body>
    <div class="container">
      <div id="moverPalabra">
        <h1>Hola</h1>
      </div>
    </div>
    <script>
      let ball = document.getElementById("moverPalabra");
  
      var myVar = setInterval(spostaDiv, 90);
      var margin = 0;
  
      let l = window.screen.width;
      let w =  screen.width;
    
      function spostaDiv() {
        console.log(w);
        if (margin == w) {
          margin = 0 + "px";
        } else {
          ball.style.marginLeft = margin + "px";
        }
        margin += 10;

        if(margin>screen.width){
           margin=0;
            spostaDiv();
        }
      }
    </script>
  </body>
</html>