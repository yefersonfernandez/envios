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
            'direccionEnvio_id' => 'required'
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
     public function update(Request $request, $id)
    {
        $rules = [
            'longitud' => 'number',
        ];
        //dd($request);
        $this->validate($request,$rules);
        $locacion = Locacion::findOrFail($id);
        $locacion->fill($request->all());
        

        //dd($request);
        if($locacion->isClean()){
            return response()->json("No se hicieron cambios",422);
        }

        $locacion->save();
        
        return $this->successResponse($locacion);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Locacion  $Locacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $locacion = Locacion::findOrFail($id);
        $locacion->delete();
        return $this->successResponse($locacion);
    }
}
