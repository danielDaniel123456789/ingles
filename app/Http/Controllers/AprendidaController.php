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
        $data=Prioridad::where('id',$id_prioridad)->delete();
          return redirect('curso');
    }

    public function noHaSidoRegistrada($id_vervo, $idUser){
        $data = DB::table('historial_vervos')            
                        ->where('historial_vervos.id_user','=',$idUser)
                        ->where('historial_vervos.id_vervo','=',$id_vervo)
                         ->get();
        $cantidad =count($data);
        if( $cantidad>0){   return 1;  }
        else   return 0;
    }

    public function insertar_al_Historial($id_vervo,$idUser){
        if($this->estaPalabraEstaAgregadaAlHistorial($id_vervo,$idUser)==0){
            Historial_vervo::create([
                'id_user'=>$idUser,
                'id_vervo' => $id_vervo,
                'id_historial' => $id_vervo,
                'nivelAprendizaje'=>1
            ]);
        }
      
    }
    public function actualizarGuia($id_vervo,$idUser){
        $aumentaID=$id_vervo+1;
        GuiaVervo::updateOrCreate(
            [ 'user_id'=> $idUser ],
            [ 'id_ultimaPalabra'=> $id_vervo,
            'id_proximaPalabra'=> $aumentaID, 
        ]
      );
    }

    public function formAprendidaRecordatorio(Request $request){

        //return $request;

      if(!isset($_COOKIE["cursoIngles"])){   return redirect('login'); }
  
        $user = User::where('email', $_COOKIE["cursoIngles"])->get();
        $idUser=$user[0]->id;

        if( $request->soyPrioridad =='falso'){
            if($this->estaPalabraEstaAgregadaAlHistorial($request->id_vervo,$idUser)==0){
                // return $request;
             $this->insertar_al_Historial($request->id_vervo,$idUser);
             $this->actualizarGuia($request->id_vervo,$idUser);
             return redirect('recordatorio')->with('exito', 'exito');
              }

        }
        else{

           // return $request->soyPrioridad;
            $this->insertar_al_Historial($request->id_vervo,$idUser);
            return $this->quitarPrioridad($request->soyPrioridad);
        

        }
     return redirect('recordatorio')->with('exito', 'exito');
    }


 
    public function formAprendida(Request $request){

        //return $request;

      if(!isset($_COOKIE["cursoIngles"])){   return redirect('login'); }
  
        $user = User::where('email', $_COOKIE["cursoIngles"])->get();
        $idUser=$user[0]->id;

        if( $request->soyPrioridad =='falso'){
            if($this->estaPalabraEstaAgregadaAlHistorial($request->id_vervo,$idUser)==0){
                // return $request;
             $this->insertar_al_Historial($request->id_vervo,$idUser);
             $this->actualizarGuia($request->id_vervo,$idUser);
             return redirect('curso')->with('exito', 'exito');
              }

        }
        else{

           // return $request->soyPrioridad;
            $this->insertar_al_Historial($request->id_vervo,$idUser);
            return $this->quitarPrioridad($request->soyPrioridad);
        

        }
     return redirect('curso')->with('exito', 'exito');
    }

  
    public function estaPalabraEstaEntreLasPrioridades($id_vervo, $idUser){
        $cantidad =count($data = DB::table('prioridads')
                    ->where('prioridads.id_user','=',$idUser)
                    ->where('prioridads.id_vervo','=',$id_vervo)
                    ->get());
   if($cantidad>0){
       return 1;
   }
   else return 0;
        

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
   
   // return $this->idUser(); 
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
