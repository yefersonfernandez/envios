<?php

namespace App\Http\Controllers;

use App\Ciudad;
use Illuminate\Http\Request;

class CiudadController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudad = Ciudad::all();
        return $this->successResponse($ciudad);
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
    public function update(Request $request, $id)
    {
        $rules = [
            'nombre' => 'string',
        ];
        //dd($request);
        $this->validate($request,$rules);
        $ciudad = Ciudad::findOrFail($id);
        $ciudad->fill($request->all());
        

        //dd($request);
        if($ciudad->isClean()){
            return response()->json("No se hicieron cambios",422);
        }

        $ciudad->save();
        
        return $this->successResponse($ciudad);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ciudad  $ciudad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ciudad = Ciudad::findOrFail($id);
        $ciudad->delete();
        return $this->successResponse($ciudad);
    }
}
