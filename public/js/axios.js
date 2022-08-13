
function post_axios (myurl, array, vistaDireccionar){
    // alert(array);
 
     axios({
         method: 'post',
         url: myurl,
         data: {
             array: array
         }
         })
         .then(function (res) {
          // manejar respuesta exitosa
          Swal.fire('Saved!', '', 'success');
            setTimeout(function(){ direccionarVista(vistaDireccionar) }, 1500);
         // alert(res.data.message);
         })
         .catch(function (error) {
          // manejar error
          Swal.fire('Changes are not saved', '', 'info')
         //alert(error);
         })
         .then(function () {
          // siempre sera executado
         });
 
 }