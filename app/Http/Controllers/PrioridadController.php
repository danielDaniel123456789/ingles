<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrioridadRequest;
use App\Http\Requests\UpdatePrioridadRequest;
use App\Models\Prioridad;
use App\Models\User;
use App\Models\GuiaVervo;

class PrioridadController extends Controller
{
  
 function limpiarPrioridades(){
   
  
     try {
          $prioridad=GuiaVervo::where('user_id',$this->idUser())->delete();
          $prioridad=Prioridad::where('id_user',$this->idUser())->delete();
         
          return redirect('historial')->with('exito', 'exito');
     } catch (\Throwable $th) {
          return redirect('historial')->with('exito', 'exito');
     }
     

   
 }
  
}
