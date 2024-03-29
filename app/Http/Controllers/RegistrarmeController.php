<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class RegistrarmeController extends Controller
{

  public function login(Request $request){   
    return view('auth/login');
}



public function contraseyaLogin(Request $request){
    

   //  $user = User::where('email', $request->email)->get();
     $user = DB::table('users')
     ->where('users.email','=', $request->email)
     ->where('users.contraseya', $request->password)
     ->get();
   
    if(count($user)>0){
        //  return 'mayor';
          $password = $request->email;
          setcookie("cursoIngles", $request->email, time()+30*24*60*60);
          return redirect('vista');
    }
    else{
      return redirect('vista')->with('error','error');
    }

   
  return $user;

}


    public function entrar(Request $request){
    
        return $request;
         //  $user = User::where('email', $request->email)->get();
           $user = DB::table('users')
           ->where('users.email','=', $request->email)
           ->where('users.contraseya', $request->password)
           ->get();
;
          if(count($user)>0){
              //  return 'mayor';
                $password = $request->email;
                setcookie("cursoIngles", $request->email, time()+30*24*60*60);
                return redirect('curso');
          }
          else{
            return redirect('vista')->with('error','error');
          }

         
        return $user;

    }
    public function registrarme(Request $request){


      //  return $request;
       if ($request->password==$request->password_confirmation) {
      //recivir variable
      try {
        $password = $request->email;
        setcookie("cursoIngles", $request->email, time()+365*24*60*60);
        

        //encriptarla
        $hashedPassword = Hash::make($request->password);
        $password=$request->email;
                
        User::create([
                    'name'=>$request->name,
                    'email' => $request->email,
                    'password' => $hashedPassword,
                    'contraseya' => $request->password 
                 ]);
        return redirect('vista');
        
      } catch (\Throwable $th) {
        return redirect('register')->with('error','error');
      }
               
       } else {
                return redirect('register')->with('error','error');
       }
     
   
    }

    public function cerrarSesion(){
    

      setcookie("cursoIngles", "", time() - 3600);
 

      return view('auth/login');
     
   
    }

}
