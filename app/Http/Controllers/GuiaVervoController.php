<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGuiaVervoRequest;
use App\Http\Requests\UpdateGuiaVervoRequest;
use App\Models\GuiaVervo;

class GuiaVervoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGuiaVervoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGuiaVervoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GuiaVervo  $guiaVervo
     * @return \Illuminate\Http\Response
     */
    public function show(GuiaVervo $guiaVervo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGuiaVervoRequest  $request
     * @param  \App\Models\GuiaVervo  $guiaVervo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGuiaVervoRequest $request, GuiaVervo $guiaVervo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GuiaVervo  $guiaVervo
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuiaVervo $guiaVervo)
    {
        //
    }
}
