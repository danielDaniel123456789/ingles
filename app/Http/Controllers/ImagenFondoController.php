<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImagenFondoRequest;
use App\Http\Requests\UpdateImagenFondoRequest;
use App\Models\ImagenFondo;
use Illuminate\Http\Request;
use Redirect;
class ImagenFondoController extends Controller
{

public function eliminarImagenFondo(Request $request){

                $flight = ImagenFondo::find($request->id_imagen);
                $flight->delete();
 
    return redirect('imagenFondo')->with('exito', 'exito');
}

public function insertarImagenFondo(Request $request){

   
       ImagenFondo::create([
                    'imagen'=>$request->imagen
                ]);
                return redirect('imagenFondo')->with('exito', 'exito');
}

 public function imagenFondo(){

     $data = ImagenFondo::all();

        return view('imagenFondo/index', compact('data'));
  

 }
}
