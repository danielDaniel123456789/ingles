<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class CategoriaController extends Controller
{
    

    public function modificarCategoria(Request $request){
        $this->eresAdmistrador();
        try {
            Categoria::where('id', $request->id)
                 ->update(['name' => $request->name]);
         return redirect('categorias');
        } catch (\Throwable $th) {
            return redirect('categorias')->with('error', 'error');;
        }

       }

    public function nuevaCategoria(Request $request){
     // return $request;
        Categoria::create(['name'=>$request->name ]); 
    }

    public function categorias(){
        $this->eresAdmistrador();
       $data = Categoria::all();
    //   return $data;
        return view('categoria/index', compact('data'));
    }
}
