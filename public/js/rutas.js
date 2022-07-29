function carpetaPrincipal(){
    return 'http://127.0.0.1:8000/';
    }
    
    
    
    function direccionarVista(txt){
    
        window.location.href = carpetaPrincipal()+txt;
        }
    
        function urlDireccionar(txt){
            window.location.href = txt;
            }
            function rutaPublica(){
                window.location.href = carpetaPrincipal();
                }
            