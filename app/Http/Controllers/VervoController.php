<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVervoRequest;
use App\Http\Requests\UpdateVervoRequest;
use App\Models\Vervo;
use App\Models\User;
use App\Models\ImagenFondo;
use App\Models\Historial_vervo;
use App\Models\GuiaVervo;
use App\Models\Prioridad;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Nette\Utils\Random;
use PhpParser\Node\Stmt\Return_;
use PhpParser\Node\Stmt\TryCatch;
use Redirect;
class VervoController extends Controller
{


    public function actualizarPalabraVocabulario(Request $request){
          //  return $request;

            Vervo::where('id', $request->id_vervo)p
                        ->update([
                            'espayol' => $request->espayol,
                            'ingles' => $request->ingles,
                            'fraseEspayol' => $request->fraseEspayol,
                            'fraseIngles' => $request->fraseIngles,
                 ]);
                    return redirect('/')->with('exito', 'exito');; 
    }
    public function insertarNuevoVervo(){
      
        $this->eresAdmistrador();
        return view('vervos/insertarVervo');
    }

public function obtenerImagenFondo(){
    $imagenFondo = ImagenFondo::all();

    $imagenFondo = DB::table('imagen_fondos')
                 ->inRandomOrder()->limit(1)
                 ->get();
      //  $cantidad= count($imagenFondo);
        if(count($imagenFondo)==0){
            return 0;
        }
                 
        else
        {
            $image=  $imagenFondo[0]->imagen;

            return $image;
        }
   
}    
public function evaluacion(){

    if(!isset($_COOKIE["cursoIngles"])){   return redirect('login'); }
  
    $user = User::where('email', $_COOKIE["cursoIngles"])->get();


    // $this->authorize('author',1);
    $velocidad=$user[0]->velocidadVoz;
    
    //return 's';
        $data = DB::table('vervos')
             ->join('historial_vervos', 'vervos.id', '=', 'historial_vervos.id_historial')
             ->where('historial_vervos.id_user','=',$this->idUser())
             ->orderBy('nivelAprendizaje','asc')
             ->select('vervos.*','historial_vervos.nivelAprendizaje')
             ->limit(1)
             ->get();
//return count($data);
             if(count($data)<=0){   
                 return redirect('noPuedeHacerEvaluacion');
             }
//return $data;
    $imagenFondo= $this->obtenerImagenFondo();
   // return $imagenFondo;
     return view('vervos/examen/evaluacion', compact('data','imagenFondo','velocidad'));
 

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
   // return $request;


    Historial_vervo::where('id_historial',$request->id)
            ->where('id_user',$this->idUser())
             ->delete();
        
             
     Prioridad::create([
                             'id_user'=>$this->idUser(),
                             'id_vervo' => $request->id
            ]);     
    
    return redirect('evaluacion');  

 }

 public function evaluacionSubirNivelVervo(Request $request){
     //return $request;
// Unknown column 'user_id' in 'where clause' (SQL: delete from `prioridads` where `id` = 19 and `user_id` = 1)

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

    try {
        $data=Prioridad::where('id_vervo',$request->id)
        ->where('user_id',$this->idUser())
         ->delete();
    } catch (\Throwable $th) {
        //throw $th;
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
 $this->eresAdmistrador();
// return $this->carpetaServidor();
try {
    Vervo::create([
        'espayol'=>strtolower($request->espayol),
        'ingles' => strtolower($request->ingles),
       'imagen' => strtolower($request->imagen),
        'ancho' => strtolower($request->ancho),
        
    ]);

    return redirect($this->carpetaAdmin().'vervo')->with('exito','exito');
 //   return back()->with('exito','exito');
} catch (\Throwable $th) {
    return back()->with('error','error');
}
    
}

 public function empezarNuevamente(Request $request){

    setcookie("cursoIngles",$this->email(), time()+365*24*60*60);
    $data=Historial_vervo::where('id_user',$this->idUser())->delete();
    $data=GuiaVervo::where('user_id',$this->idUser())->delete();
    return redirect('curso');
 }

    public function index()
    {
        $this->eresAdmistrador();
        $data = Vervo::all();

        $data = DB::table('vervos')
                        ->orderBy('vervos.id','desc')
                        ->get();
        $ruta=$this->carpetaServidor().'vervos/index';
        return view($ruta, compact('data'));
    }


public function informe(){
 //   $this->eresAdmistrador();
  $data = DB::table('vervos')
                    ->join('historial_vervos', 'vervos.id', '=', 'historial_vervos.id_vervo')
                    ->where('historial_vervos.id_user','=',$this->idUser())
                    ->select('vervos.*')
            
                    ->get();
  return view('vervos/vistaCliente/informe', compact('data')); 

}

public function historial(){
/*
    $animales = array (
        "gato" => "Sunny",
        "perro" => "Stoichkov",
        "chimpancé" => "Muggles",
        "chinchilla" => "Herminia",
        "Charles",
        "oso" => "Tarzan"
    );
    $animales2 = array (
        "perro" => "Stoichkov",
        "gato" => "Sunny",
        "conejo" => "Tarzan",
        "Muggles"
    );
    $diferencia = array_diff($animales, $animales2);
    var_dump($diferencia);
*/
    $vervos = DB::table('vervos')
 //   ->select('vervos.id')
    ->get();

    $historial = DB::table('vervos')
    ->join('historial_vervos', 'vervos.id', '=', 'historial_vervos.id_vervo')
    ->where('historial_vervos.id_user','=',$this->idUser())
    ->select('vervos.*','historial_vervos.nivelAprendizaje')
    ->orderBy('vervos.id','ASC')
    ->get();

   //return $historial;

   //$diferencia = array_diff    ($vervos, $historial);
   //$diferencia = array_values ($vervos, $historial);
//return($diferencia);

    
    $data = DB::table('vervos')
                      ->join('historial_vervos', 'vervos.id', '=', 'historial_vervos.id_vervo')
                      ->where('historial_vervos.id_user','=',$this->idUser())
                      ->select('vervos.*','historial_vervos.nivelAprendizaje')
                      ->orderBy('vervos.id','ASC')
                      ->get();

    $prioridades = DB::table('vervos')
                      ->join('prioridads', 'vervos.id', '=', 'prioridads.id_vervo')
                      ->where('prioridads.id_user','=',$this->idUser())
                      ->select('vervos.*')
                      ->get();
    return view('vervos/historial', compact('data','prioridades','historial')); 
  
  }
/*
public function historialVacio() {
    $data = Historial_vervo::all();
    if(count($data)==0){
             return 1;
    }
    else     return 0;
}
*/

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



public function demoVervo(Request $request){
       $this->eresAdmistrador();
  
       $velocidad=$this->velocidad();

   $cantidad=count(DB::table('historial_vervos')
   ->where('historial_vervos.id_user','=',$this->idUser())
   ->get());
 
    $data = DB::table('vervos')
    ->where('vervos.id','=',$request->id)
   ->get();
  
  // return view('plantilla1', compact('data'));

    return view('/vervos/demoVervo', compact('data','velocidad','cantidad'));
}




        
/*        
public function existeEseID(){
    $cantidad = count(DB::table('vervos')
    ->where('vervos.id','=',$this->idHistorial())
   ->get());

   if($cantidad>0){
        return 1;
   }
   else return 0;


}    
    
*/
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
/*
    public function existePrioridades(){
        
        $data = DB::table('prioridads')
                        ->where('prioridads.id_user','=',$this->idUser())
                         ->get();
        if(count($data)>0)         return 1;
        else     return 0;
    }

*/
    public function store(Request $request)
    {
        //return $request;
        $this->eresAdmistrador();
        Vervo::where('id', $request->id)
                ->update([
                    'espayol' => $request->espayol,
                    'ingles' => $request->ingles,
                    'imagen' => $request->imagen.'',
                    'ancho' => $request->ancho
                
                ]);
                $ruta= $this->rutaAdmin().'vervo';
             return redirect($ruta)->with('exito', 'exito');
    }

  

    public function vervoRevisada(Request $request)
    {
        $this->eresAdmistrador();
        Vervo::where('id', $request->id)
                ->update(['revisada' => 1]);
                $ruta= $this->rutaAdmin().'vervo';
                 return redirect($ruta)->with('exito', 'exito');
  
    }



 
}
