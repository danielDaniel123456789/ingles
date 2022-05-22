function si_o_no(mytitle) {
  return new Promise(yaTeRespondo_return => {
   
    Swal.fire({
  title: mytitle,
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: 'SI',
  denyButtonText: `NO`,
  cancelButtonText: "CANCELAR",
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    yaTeRespondo_return('si');
    
  } else if (result.isDenied) {
    yaTeRespondo_return('no');
  }
})

  });
}