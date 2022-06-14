<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVozRequest;
use App\Http\Requests\UpdateVozRequest;
use App\Models\Voz;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;

class VozController extends Controller
{

   

   public function configuracion(){

      $data = DB::table('vozs')
                   ->where('vozs.user_id','=',$this->idUser())
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


   public function actualizarVoz(Request $request){
         //   return $request;
          
           if( $this->idUser()>0){
              if($request->id_voz==0){
               Voz::create([
                  'velocidad' => $request->velocidad,
                  'user_id' => $this->idUser()  
            ]);
              }
              else{
               Voz::where('id',  $request->id_voz)
               ->update([
                  'velocidad' => $request->velocidad,
                  'user_id' => $this->idUser()  
             ]);    
              }
              return redirect('vista');

           }
           else
           {
            return redirect('login');
           }
      
   }
}
