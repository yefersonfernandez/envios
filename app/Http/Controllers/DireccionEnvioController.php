<?php

namespace App\Http\Controllers;

use App\DireccionEnvio;
use Illuminate\Http\Request;

class DireccionEnvioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $direccionEnvios = DireccionEnvio::all();
        return $this->successResponse( $direccionEnvios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'descripcion' => 'required',
            'Ciudad_id' => 'required',
            'Cliente_id' => 'required'
        ];
        $this->validate($request,$rules);
        
        $campos = $request->all();
        //dd($campos);
        $DireccionEnvio = DireccionEnvio::create($campos);
        return $this->successResponse($DireccionEnvio);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DireccionEnvio  $DireccionEnvio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $DireccionEnvio = DireccionEnvio::findOrFail($id);
        return $DireccionEnvio;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DireccionEnvio  $DireccionEnvio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DireccionEnvio $DireccionEnvio)
    {
        $rules = [
            'descripcion' => 'descripcion',
        ];
        $this->validate($request,$rules);
        $DireccionEnvio->fill($request->all());

        if($DireccionEnvio->isClean()){
            return $this->errorResponse("No se hicieron cambios",422);
        }

        //dd($request);

        $DireccionEnvio->save();
        
        return $this->successResponse($DireccionEnvio);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DireccionEnvio  $DireccionEnvio
     * @return \Illuminate\Http\Response
     */
    public function destroy(DireccionEnvio $DireccionEnvio)
    {
        $DireccionEnvio->delete();
        return $this->successResponse($DireccionEnvio);
    }
}
