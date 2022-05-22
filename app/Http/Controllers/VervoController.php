<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVervoRequest;
use App\Http\Requests\UpdateVervoRequest;
use App\Models\Vervo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;
class VervoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $data = Vervo::all();
        return view('vervos/index', compact('data'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVervoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request;
        
        Vervo::where('id', $request->id)
                ->update([
                    'espayol' => $request->espayol,
                    'ingles' => $request->ingles,
                    'imagen' => $request->imagen
                
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vervo  $vervo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vervo $vervo)
    {
        //
    }
}
