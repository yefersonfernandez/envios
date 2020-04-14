<?php

namespace App\Http\Controllers;

use App\Locacion;
use Illuminate\Http\Request;

class LocacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $locacions = Locacion::all();
        return $this->successResponse( $locacions);
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
            'longitud' => 'required',
            'latitud' => 'required',
            'DireccionEnvio_id' => 'required'
        ];
        $this->validate($request,$rules);
        
        $campos = $request->all();
        //dd($campos);
        $Locacion = Locacion::create($campos);
        return $this->successResponse($Locacion);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Locacion  $Locacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Locacion = Locacion::findOrFail($id);
        return $Locacion;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Locacion  $Locacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Locacion $Locacion)
    {
        $rules = [
            'longitud' => 'longitud',
        ];
        $this->validate($request,$rules);
        $Locacion->fill($request->all());

        if($Locacion->isClean()){
            return $this->errorResponse("No se hicieron cambios",422);
        }

        //dd($request);

        $Locacion->save();
        
        return $this->successResponse($Locacion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Locacion  $Locacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Locacion $Locacion)
    {
        $Locacion->delete();
        return $this->successResponse($Locacion);
    }
}
