<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVervoRequest;
use App\Http\Requests\UpdateVervoRequest;
use App\Models\Vervo;
use App\Models\Historial_vervo;
use App\Models\Prioridad;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Nette\Utils\Random;
use Redirect;
class VervoController extends Controller
{
    

public function subirNivelVervo(Request $request){
    $subirNivel= $request->nivel+1;
    Historial_vervo::where('id_historial', $request->id)
    ->where('id_user', $this->idUser())
               ->update(['nivelAprendizaje' => $subirNivel]);
               return redirect('mostrarVervo');
      //  return $subirNivel;
    }
    
public function bajarNivelVervo(Request $request){
    $bajarNivel= $request->nivel-1;
    if($bajarNivel==0){
      Historial_vervo::where('id_historial',$request->id)
            ->where('id_user',$this->idUser())
             ->delete();
    }
    else{
        Historial_vervo::where('id_historial', $request->id)
        ->where('id_user', $this->idUser())
                   ->update(['nivelAprendizaje' => $bajarNivel]);
    }
  
               return redirect('mostrarVervo');
    //return $request;
}

 public function reiniciarVervosDesde0(Request $request){
     //   return  $request;

         $data=Historial_vervo::where('id_user',$this->idUser())
                     ->delete();
         try {
                        Prioridad::where('id_user',$this->idUser())
                        ->delete();
                     } catch (\Throwable $th) {
                         //throw $th;
                     }
      
          return redirect('mostrarVervo')->with('exito', 'exito');

    }
public function insertarVervo(Request $request){
 //return $request;

try {
    Vervo::create([
        'espayol'=>strtolower($request->espayol),
        'ingles' => strtolower($request->ingles),
        'imagen' => strtolower($request->imagen),
        'ancho' => strtolower($request->ancho),
        
    ]);

    return back()->with('exito','exito');
} catch (\Throwable $th) {
    return back()->with('error','error');
}
    
}



    public function index()
    {
      //  return 'ss';
        $data = Vervo::all();

   $data = DB::table('vervos')
                ->orderBy('vervos.revisada','asc')
                ->get();


        return view('vervos/index', compact('data'));
    }


public function informe(){

  $data = DB::table('vervos')
                    ->join('historial_vervos', 'vervos.id', '=', 'historial_vervos.id_vervo')
                    ->where('historial_vervos.id_user','=',$this->idUser())
                    ->select('vervos.*')
            
                    ->get();
  return view('vervos/vistaCliente/informe', compact('data')); 

}

public function historial(){

    $data = DB::table('vervos')
                      ->join('historial_vervos', 'vervos.id', '=', 'historial_vervos.id_vervo')
                      ->where('historial_vervos.id_user','=',$this->idUser())
                      ->select('vervos.*')
                      ->get();
    return view('vervos/historial', compact('data')); 
  
  }

public function historialVacio() {
    $data = Historial_vervo::all();
    if(count($data)==0){
             return 1;
    }
    else     return 0;
}

public function idHistorial(){
   
try {
    $data = DB::table('guia_vervos')
    ->where('guia_vervos.user_id', $this->idUser())
    ->orderby('id','desc')
    ->limit(1)->get();
    $id_buscar=  $data[0]->id_proximaPalabra;

} catch (\Throwable $th) {
    $id_buscar=1;
}
 return $id_buscar;
}

public function mostrarExamen(){

    if( $this->idUser()>0){

           $data = DB::table('vervos')
                ->join('historial_vervos', 'vervos.id', '=', 'historial_vervos.id_historial')
                ->where('historial_vervos.id_user','=',$this->idUser())
                ->orderBy('nivelAprendizaje','asc')
                ->select('vervos.*','historial_vervos.nivelAprendizaje')
                ->limit(1)
                ->get();
//return count($data);
                if(count($data)<=0){
               
                    return redirect('mostrarVervo');
                }
//return $data;

        return view('vervos/examen/index', compact('data'));
      }
      else{
        return redirect('login');
      }
 
}

public function demoVervo(Request $request){
   // return $request->id;
    $data = DB::table('vervos')
    ->where('vervos.id','=',$request->id)
   ->get();
  // return $data;
  // return view('plantilla1', compact('data'));

    return view('vervos/demoVervo', compact('data'));
}
public function mostrarVervo(){  
 
  $numero= rand(1,7);
  
      if( $this->idUser()>0){

        if($numero==7){
            return $this->mostrarExamen();
        }

        if($this->historialVacio()==true){
             $data = DB::table('vervos')->limit(1)
            ->orderBy('id', 'asc')
             ->get();
             //return view('plantilla1', compact('data'));
             return view('vervos/mostrarVervo', compact('data'));
         }
 
       if($this->existePrioridades()==true) {
             return $this->mostrarPrioridades();
       }

       if( $this->existeEseID()==true){
        $data = DB::table('vervos')
        ->where('vervos.id','=',$this->idHistorial())
       ->get();
      // return view('plantilla1', compact('data'));

        return view('vervos/mostrarVervo', compact('data'));
       }
       else

       return view('vervos/listaVervosTerminada');
             return 'No hay vervos';
      }
      else{
        return redirect('login');
      }
}

        
        
public function existeEseID(){
    $cantidad = count(DB::table('vervos')
    ->where('vervos.id','=',$this->idHistorial())
   ->get());

   if($cantidad>0){
        return 1;
   }
   else return 0;


}    
    

 public function mostrarPrioridades(){


       $data = DB::table('vervos')
                    ->join('prioridads', 'vervos.id', '=', 'prioridads.id_vervo')
                    ->select('vervos.*', 'prioridads.id as prioridad')
                 ->get();
                 return view('vervos/mostrarVervo', compact('data'));   
 }


    public function existePrioridades(){
        
        $data = DB::table('prioridads')
                        ->where('prioridads.id_user','=',$this->idUser())
                         ->get();
        if(count($data)>0)         return 1;
        else     return 0;
    }


    public function store(Request $request)
    {
 
        //return $request;
        Vervo::where('id', $request->id)
                ->update([
                    'espayol' => $request->espayol,
                    'ingles' => $request->ingles,
                    'imagen' => $request->imagen.'',
                    'ancho' => $request->ancho
                
                ]);
             return redirect('vervo')->with('exito', 'exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vervo  $vervo
     * @return \Illuminate\Http\Response
     */
    public function show(Vervo $vervo)
    {
        //
    }

    public function vervoRevisada(Request $request)
    {
 
        Vervo::where('id', $request->id)
                ->update(['revisada' => 1]);
            
                 return redirect('vervo')->with('exito', 'exito');
  
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVervoRequest  $request
     * @param  \App\Models\Vervo  $vervo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vervo $vervo)
    {
        //
    }

  
    public function destroy(Vervo $vervo)
    {
        //
    }
}
