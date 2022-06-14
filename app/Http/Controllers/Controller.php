<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    


    public function eresAdministrador() {
      $admin = Auth::admin();
      return $admin;
 }
  
   public function idUser() {
        $id = Auth::id();
        return $id;
   }
  
   public function admin() {

    $data = Auth::user()->admin;
    return $data;
}

  public function nombreUser() {
        $user = Auth::user()->name;
        return $user;
  }

  public function categoriaUser() {
        $id = Auth::user()->categoria_id;
        return $id;
  }

      public function bloqueado() {
        $bloquear = Auth::user()->bloquear;
        return $bloquear;
      }

      public function ultima_palabra_actualizada() {
        $id = Auth::user()->id_palabra_actualizada;
        return $id;
      }

      public function fotoConversacion() {
        $foto = Auth::user()->fotoConversacion;
        return $foto;
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


  
    }
    
