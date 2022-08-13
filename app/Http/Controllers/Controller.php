<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\ImagenFondo;
use App\Models\User;
use App\Models\Historial_vervo;
use Illuminate\Support\Facades\DB;
use App\Models\Prioridad;
use PhpParser\Node\Stmt\TryCatch;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    
    public function carpetaAdmin() {
      return "admin/";
    }

    public function carpetaServidor() {
      return "/";
    }

 public function rutaAdmin() {
  return "admin/";
}


    public function eresAdministrador() {
      $admin = Auth::admin();
      return $admin;
 }

   
   public function idUser() {
    $user = User::where('email', $_COOKIE["cursoIngles"])->get();
    $userID=$user[0]->id;
        return $userID;
   }

   public function email() {
    $user = User::where('email', $_COOKIE["cursoIngles"])->get();
    $email=$user[0]->email;
        return $email;
   }
  
   public function eresAdmistrador() {
    
    $user = User::where('email', $_COOKIE["cursoIngles"])->get();
    $admin=$user[0]->admin;

    if( $admin=='0'){
      $this->authorize('errorPermisos');
    }


}

  public function nombreUser() {
       
        $user = User::where('email', $_COOKIE["cursoIngles"])->get();
        $admin=$user[0]->name;

        return $user;
  }
  public function velocidad() {
       
    $user = User::where('email', $_COOKIE["cursoIngles"])->get();
    $velocidadVoz=$user[0]->velocidadVoz;

    return $velocidadVoz;
}

public function cantidadVervosAprendidos(){
  $cantidad=count(DB::table('historial_vervos')
  ->where('historial_vervos.id_user','=',$this->idUser())
  ->get());
  return $cantidad;
}

  public function categoriaUser() {
      //  $id = Auth::user()->categoria_id;
        return 'iiiiiiiiiiiiiii';
  }

      public function bloqueado() {
        $bloquear = Auth::user()->bloquear;
        return 'oooooooooooooo';
      }


      public function primeraLetraMayuscula($txt) {
        $lower = strtolower($txt); 
        $upper = ucwords($lower); 
        return $upper;
      }

      public function reducirFecha($txt) {
        echo  $txt;
        exit; 
        $createDate = new DateTime($txt);
        $fechaAgregado = $createDate->format('d-M');
        return $fechaAgregado;
      }

      function cadenaAleatoria ($len_of_gen_str){
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $var_size = strlen($chars);
        $random_str='';
        for( $x = 0; $x < $len_of_gen_str; $x++ ) {  
            $random_str= $random_str.$chars[ rand( 0, $var_size - 1 ) ];  
           
        }
          return $random_str;
    }
    public function estaPalabraEstaAgregadaAlHistorial($id_vervo, $idUser) {
          
      $data = DB::table('historial_vervos')
                  
                   ->where('historial_vervos.id_user',$idUser)
                   ->where('historial_vervos.id_vervo',$id_vervo)
                   ->get();     
   if(count($data)==0){
            return 0;
   }
   else     return 1;
}

    public function historialVacio($id_vervo, $idUser) {
          
         $data = DB::table('historial_vervos')
                     
                      ->where('historial_vervos.id_user',$idUser)
                      ->where('historial_vervos.id_vervo',$id_vervo)
                      ->get();     
      if(count($data)==0){
               return 1;
      }
      else     return 0;
  }


  public function cantidadPalabrasAprendidas($id){
    $cantidad=count(DB::table('historial_vervos')
    ->where('historial_vervos.id_user','=',$id)
    ->get());
  }
  public function existePrioridades($id){
        
    $data = DB::table('prioridads')
                    ->where('prioridads.id_user','=',$id)
                     ->get();
    if(count($data)>0)         return 1;
    else     return 0;
}

public function existeEseID($id){
  $cantidad = count(DB::table('vervos')
  ->where('vervos.id','=',$id)
 ->get());

 if($cantidad>0){
      return 1;
 }
 else return 0;


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


  
    }
    
