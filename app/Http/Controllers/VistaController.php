<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vervo;
use App\Models\User;
use App\Models\ImagenFondo;
use App\Models\Historial_vervo;
use App\Models\Prioridad;
use Illuminate\Cache\RateLimiting\Limit;
use PhpParser\Node\Stmt\TryCatch;

class VistaController extends Controller
{
  
  

  public function recordatorioFrases(){
      
    // return $_COOKIE["cursoIngles"];
    if(!isset($_COOKIE["cursoIngles"])){   return redirect('login'); }


    
     $user = User::where('email', $_COOKIE["cursoIngles"])->get();
     $userID=$user[0]->id;

   //$this->existePrioridades($userID.'yuuu');
   if($this->existePrioridades($this->idUser())==1) {
   
    return $this->mostrarPrioridadesFrases();
  }


   $velocidad=$this->velocidad();
   
   $cantidad=$this->cantidadVervosAprendidos();
 
   //return $this->proximo_id_a_buscar();
   
   $data = $this->buscarProximoVervo();
   //return $data;
   if(count($data)>0){

     $imagenFondo= $this->obtenerImagenFondo();
    
     return view('vervos/recordatorioFrases', compact('data','cantidad','imagenFondo','velocidad'));

   }
   else{
     return view('cliente/comprarPalabras');
   }

 }


  public function recordatorio(){
      
    // return $_COOKIE["cursoIngles"];
    if(!isset($_COOKIE["cursoIngles"])){   return redirect('login'); }

//return 'ss';
    
     $user = User::where('email', $_COOKIE["cursoIngles"])->get();
     $userID=$user[0]->id;

   //$this->existePrioridades($userID.'yuuu');
   if($this->existePrioridades($this->idUser())==1) {
    return $this->mostrarPrioridadesRecordatorio();
  }


   $velocidad=$this->velocidad();
   
   $cantidad=$this->cantidadVervosAprendidos();
 
   //return $this->proximo_id_a_buscar();
   
   $data = $this->buscarProximoVervo();
   //return $data;
   if(count($data)>0){
     $imagenFondo= $this->obtenerImagenFondo();
     return view('vervos/recordatorio', compact('data','cantidad','imagenFondo','velocidad'));
   }
   else{
     return view('cliente/comprarPalabras');
   }

 }


    public function curso(){

   /*   $animales = array (
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
     // return $_COOKIE["cursoIngles"];
     if(!isset($_COOKIE["cursoIngles"])){ 
          return redirect('login');
     }

     
      $user = User::where('email', $_COOKIE["cursoIngles"])->get();
      $userID=$user[0]->id;

      //$this->existePrioridades($userID.'yuuu');

 
    if($this->existePrioridades($this->idUser())==1) {
      return $this->mostrarPrioridades();
    }

    $velocidad=$this->velocidad();
    
    $cantidad=$this->cantidadVervosAprendidos();
  
 
    //return $this->proximo_id_a_buscar();
    
    $data = $this->buscarProximoVervo();
    //return $data;
    if(count($data)>0){
      $imagenFondo= $this->obtenerImagenFondo();
      return view('vervos/vista', compact('data','cantidad','imagenFondo','velocidad'));
    }
    else{
      return view('cliente/comprarPalabras');
    }

  }

  public function buscarProximoVervo(){
    $data = DB::table('vervos')
    ->where('vervos.id','=', $this->proximo_id_a_buscar())
    ->get();
    return $data;
   

  }
  

  public function mostrarPrioridadesFrases(){
     $user = User::where('email', $_COOKIE["cursoIngles"])->get();
    $userID=$user[0]->id;
  
    $velocidad=$this->velocidad();
    $cantidad=$this->cantidadPalabrasAprendidas($userID);
  
    $data = DB::table('vervos')
                    ->join('prioridads', 'vervos.id', '=', 'prioridads.id_vervo')
                    ->select('vervos.*', 'prioridads.id as prioridad')
                    ->limit(1)
                     ->get();          
    //return $data;
    $imagenFondo= $this->obtenerImagenFondo();
                 return view('vervos/recordatorioFrases', compact('data', 'cantidad','imagenFondo','velocidad'));   
  }
  


  public function mostrarPrioridadesRecordatorio(){
    //return 99;
    $user = User::where('email', $_COOKIE["cursoIngles"])->get();
    $userID=$user[0]->id;
  
    $velocidad=$this->velocidad();
    $cantidad=$this->cantidadPalabrasAprendidas($userID);
  
    $data = DB::table('vervos')
                    ->join('prioridads', 'vervos.id', '=', 'prioridads.id_vervo')
                    ->select('vervos.*', 'prioridads.id as prioridad')
                    ->limit(1)
                     ->get();          
    //return $data;
    $imagenFondo= $this->obtenerImagenFondo();
                 return view('vervos/recordatorio', compact('data', 'cantidad','imagenFondo','velocidad'));   
  }
  


public function mostrarPrioridades(){
  //return 99;
  $user = User::where('email', $_COOKIE["cursoIngles"])->get();
  $userID=$user[0]->id;

  $velocidad=$this->velocidad();
  $cantidad=$this->cantidadPalabrasAprendidas($userID);

  $data = DB::table('vervos')
                  ->join('prioridads', 'vervos.id', '=', 'prioridads.id_vervo')
                  ->select('vervos.*', 'prioridads.id as prioridad')
                  ->limit(1)
                   ->get();          
  //return $data;
  $imagenFondo= $this->obtenerImagenFondo();
               return view('vervos/vista', compact('data', 'cantidad','imagenFondo','velocidad'));   
}


     

public function proximo_id_a_buscar(){
   
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

}
