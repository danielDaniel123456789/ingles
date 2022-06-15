<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historial_vervo;
use App\Models\Prioridad;
use App\Models\GuiaVervo;
use App\Models\User;
use App\Models\Vervo;
use Illuminate\Support\Facades\DB;
use Redirect;
class AprendidaController extends Controller
{
       public function estaRegistrada($id_vervo){
        $vacio= count(DB::table('historial_vervos')
        ->where('historial_vervos.id_user','=',$this->idUser())
        ->get());
        if($vacio==0){
            return -1;
        }


        $data = DB::table('historial_vervos')
        ->where('historial_vervos.id_user','=',$this->idUser())
        ->where('historial_vervos.id_vervo','=',$id_vervo)
        ->get();
        if(count($data)>0){
            return 1;
        }
        else return 0;

    }
    public function quitarPrioridad($id_prioridad){
        $data=Prioridad::where('id',$id_prioridad)
                    ->where('id_user',$this->idUser())->delete();
          return redirect('vista');
    }

    public function noHaSidoRegistrada($id_vervo){
        $data = DB::table('historial_vervos')            
                        ->where('historial_vervos.id_user','=',$this->idUser())
                        ->where('historial_vervos.id_vervo','=',$id_vervo)
                         ->get();
        $cantidad =count($data);
        if( $cantidad>0){   return 1;  }
        else   return 0;
    }

    public function insertar_al_Historial($id_vervo){
        Historial_vervo::create([
            'id_user'=>$this->idUser(),
            'id_vervo' => $id_vervo,
            'id_historial' => $id_vervo,
            'nivelAprendizaje'=>1
        ]);
    }
    public function actualizarGuia($id_vervo){
        $aumentaID=$id_vervo+1;
        GuiaVervo::updateOrCreate(
            [ 'user_id'=> $this->idUser() ],
            [ 'id_ultimaPalabra'=> $id_vervo,
            'id_proximaPalabra'=> $aumentaID, 
        ],
      );
    }

    

 
    public function formAprendida(Request $request){


    if( $this->idUser()>0){
    
                if($this->historialVacio()==1){
                //    return $request;
                $this->insertar_al_Historial($request->id_vervo);
                $this->actualizarGuia($request->id_vervo);
                return redirect('vista')->with('exito', 'exito');
            }

        if($this->existePrioridad()>0){
           //return $request;
          $this->insertar_al_Historial($request->id_vervo);
        //  $this->actualizarGuia($request->id_vervo);
           return $this->quitarPrioridad($request->id_prioridad);
   
        }

    else  {
        if ($this->noHaSidoRegistrada($request->id_vervo)==0) {
            $this->insertar_al_Historial($request->id_vervo);
            $this->actualizarGuia($request->id_vervo);
        }
       return redirect('vista')->with('exito', 'exito');
    }

    }
    else{
        return 'no';
    }
    
    }

    public function historialVacio() {
        $data = Historial_vervo::all();
        if(count($data)==0){
                 return 1;
        }
        else     return 0;
    }

public function existePrioridad(){
         $cantidad =count($data = DB::table('prioridads')
                     ->where('prioridads.id_user','=',$this->idUser())
                     ->get());
    if($cantidad>0){
        return 1;
    }
    else return 0;
         

}

    public function repasarPalabra(Request $request){
     //   return $request;
    $data = DB::table('historial_vervos')
                        ->where('historial_vervos.id_user','=',$this->idUser())
                        ->where('historial_vervos.id_vervo','=',$request->id_vervo)
                        ->delete();

    Prioridad::create([
                   'id_user'=>$this->idUser(),
                   'id_vervo' => $request->id_vervo
                 ]);
        
          return redirect('historial')->with('exito', 'exito');
       //    return $data[0]->id;


    }
}
