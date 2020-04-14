<?php

namespace App\Http\Controllers;

use App\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.basic', ['only'=> ['show']] );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudads = Ciudad::all();
        return $this->successResponse($ciudads);
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
            'nombre' => 'required',
        ];
        $this->validate($request,$rules);
        
        $campos = $request->all();
        //dd($campos);
        $ciudad = Ciudad::create($campos);
        return $this->successResponse($ciudad);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ciudad = Ciudad::findOrFail($id);
        return $ciudad;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ciudad $ciudad)
    {
        $rules = [
            'nombre' => 'nombre',
        ];
        $this->validate($request,$rules);
        $ciudad->fill($request->all());

        if($ciudad->isClean()){
            return $this->errorResponse("No se hicieron cambios",422);
        }

        //dd($request);

        $ciudad->save();
        
        return $this->successResponse($ciudad);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ciudad $ciudad)
    {
        $ciudad->delete();
        return $this->successResponse($ciudad);
    }
}
