<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVervoRequest;
use App\Http\Requests\UpdateVervoRequest;
use App\Models\Vervo;
use App\Models\ImagenFondo;
use App\Models\Historial_vervo;
use App\Models\Prioridad;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Nette\Utils\Random;
use PhpParser\Node\Stmt\Return_;
use PhpParser\Node\Stmt\TryCatch;
use Redirect;
class VervoController extends Controller
{


public function obtenerImagenFondo(){
    $imagenFondo = ImagenFondo::all();

    $imagenFondo = DB::table('imagen_fondos')
                 ->inRandomOrder()->limit(1)
                 ->get();
   $image=  $imagenFondo[0]->imagen;

   return $image;
}    
public function evaluacion(){
    if( $this->idUser()>0){
       
    


        $velocidad=$this->velocidad();
        $data = DB::table('vervos')
             ->join('historial_vervos', 'vervos.id', '=', 'historial_vervos.id_historial')
             ->where('historial_vervos.id_user','=',$this->idUser())
             ->orderBy('nivelAprendizaje','asc')
             ->select('vervos.*','historial_vervos.nivelAprendizaje')
             ->limit(1)
             ->get();
//return count($data);
             if(count($data)<=0){
            
                 return redirect('vista');
             }
//return $data;
    $imagenFondo= $this->obtenerImagenFondo();
     return view('vervos/examen/evaluacion', compact('data','imagenFondo','velocidad'));
   }
   else{
     return redirect('login');
   }

}

public function subirNivelVervo(Request $request){
    $subirNivel= $request->nivel+1;
    Historial_vervo::where('id_historial', $request->id)
    ->where('id_user', $this->idUser())
               ->update(['nivelAprendizaje' => $subirNivel]);
               return redirect('vista');
      //  return $subirNivel;
    }
    
 public function   evaluacionBajarNivelVervo(Request $request){
    //return $request;
    $bajarNivel= $request->nivel-1;
    if($bajarNivel<0){
      Historial_vervo::where('id_historial',$request->id)
            ->where('id_user',$this->idUser())
             ->delete();
    }
    else{
        Historial_vervo::where('id_historial', $request->id)
        ->where('id_user', $this->idUser())
                   ->update(['nivelAprendizaje' => $bajarNivel]);
    }
  
               return redirect('evaluacion');
 }

 public function evaluacionSubirNivelVervo(Request $request){
     //return $request;
    $subirNivel= $request->nivel+1;
    if($subirNivel <0){
      Historial_vervo::where('id_historial',$request->id)
            ->where('id_user',$this->idUser())
             ->delete();
    }
    else{
        Historial_vervo::where('id_historial', $request->id)
        ->where('id_user', $this->idUser())
                   ->update(['nivelAprendizaje' => $subirNivel]);
    }
  
               return redirect('evaluacion');
 }

public function bajarNivelVervo(Request $request){
    $bajarNivel= $request->nivel-1;
    if($bajarNivel <0){
      Historial_vervo::where('id_historial',$request->id)
            ->where('id_user',$this->idUser())
             ->delete();
    }
    else{
        Historial_vervo::where('id_historial', $request->id)
        ->where('id_user', $this->idUser())
                   ->update(['nivelAprendizaje' => $bajarNivel]);
    }
  
               return redirect('vista');
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
      
          return redirect('vista')->with('exito', 'exito');

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

    $imagenFondo= $this->obtenerImagenFondo();
    $data = DB::table('vervos')
                      ->join('historial_vervos', 'vervos.id', '=', 'historial_vervos.id_vervo')
                      ->where('historial_vervos.id_user','=',$this->idUser())
                      ->select('vervos.*')
                      ->get();
    return view('vervos/historial', compact('data','imagenFondo')); 
  
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
/*
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
               
                    return redirect('vista');
                }
//return $data;

        return view('vervos/examen/index', compact('data'));
      }
      else{
        return redirect('login');
      }
 
}
*/
public function demoVervo(Request $request){
   // return $request->id;
   $velocidad=$this->velocidad();

   $cantidad=count(DB::table('historial_vervos')
   ->where('historial_vervos.id_user','=',$this->idUser())
   ->get());
 
    $data = DB::table('vervos')
    ->where('vervos.id','=',$request->id)
   ->get();
  // return $data;
  // return view('plantilla1', compact('data'));

    return view('vervos/demoVervo', compact('data','velocidad','cantidad'));
}

public function velocidad(){
    try {
        $velocidad=DB::table('vozs')
        ->where('vozs.user_id','=',$this->idUser())
        ->get();
        $velocidad= $velocidad[0]->velocidad;
    } catch (\Throwable $th) {
        $velocidad=1;
    }
    return $velocidad;
}
public function vista(){  
 
  
   $velocidad=$this->velocidad();

  $cantidad=count(DB::table('historial_vervos')
  ->where('historial_vervos.id_user','=',$this->idUser())
  ->get());




  
      if( $this->idUser()>0){
        
        
        if($this->historialVacio()==true){
             $data = DB::table('vervos')->limit(1)
            ->orderBy('id', 'asc')
             ->get();
             //return view('plantilla1', compact('data'));
             $imagenFondo= $this->obtenerImagenFondo();

             return view('vervos/vista', compact('data','cantidad','imagenFondo','velocidad'));
         }
 
       if($this->existePrioridades()==true) {
             return $this->mostrarPrioridades();
       }

       if( $this->existeEseID()==true){

       $data = DB::table('vervos')
        ->where('vervos.id','=',$this->idHistorial())
       ->get();
      // return view('plantilla1', compact('data'));
      $imagenFondo= $this->obtenerImagenFondo();
        return view('vervos/vista', compact('data','cantidad','imagenFondo','velocidad'));
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
    $velocidad=$this->velocidad();
    $cantidad=count(DB::table('historial_vervos')
    ->where('historial_vervos.id_user','=',$this->idUser())
    ->get());

       $data = DB::table('vervos')
                    ->join('prioridads', 'vervos.id', '=', 'prioridads.id_vervo')
                    ->select('vervos.*', 'prioridads.id as prioridad')
                 ->get();
                 $imagenFondo= $this->obtenerImagenFondo();
                 return view('vervos/vista', compact('data', 'cantidad','imagenFondo','velocidad'));   
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
