<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVozRequest;
use App\Http\Requests\UpdateVozRequest;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class VozController extends Controller
{

   

   public function configuracion(){

      $data = DB::table('users')
                   ->where('users.id','=',$this->idUser())
                   ->get();
      return view('configuracion/configuracion', compact('data'));
                //   if()
 
     // return count($data);
 }

public function configurarVoz(){

     $data = DB::table('vozs')
                  ->where('vozs.user_id','=',$this->idUser())
                  ->get();
     return view('configuracion/configuracion', compact('data'));
               //   if()

    // return count($data);
}


 function actualizarVoz(Request $request){
        //    return $request;
          
           if( $this->idUser()>0){
      
            User::where('id', $this->idUser())
                    ->update(['velocidadVoz' => $request->velocidad]);
                return redirect('curso');
           }
           else
           {
            return redirect('login');
           }
      
   }
}
