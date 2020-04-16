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
         return $this->successResponse($direccionEnvios);
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
            'ciudad_id' => 'required',
            'cliente_id' => 'required'
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
    public function update(Request $request, $id)
    {
        $rules = [
            'descripcion' => 'string',
        ];
        //dd($request);
        $this->validate($request,$rules);
        $direccionEnvio = DireccionEnvio::findOrFail($id);
        $direccionEnvio->fill($request->all());
        

        //dd($request);
        if($direccionEnvio->isClean()){
            return response()->json("No se hicieron cambios",422);
        }

        $direccionEnvio->save();
        
        return $this->successResponse($direccionEnvio);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DireccionEnvio  $DireccionEnvio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $direccionEnvio = DireccionEnvio::findOrFail($id);
        $direccionEnvio->delete();
        return $this->successResponse($direccionEnvio);
    }
}
