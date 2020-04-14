<?php

namespace App\Http\Controllers;

use App\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Articulo::all();
        return $this->successResponse($articulos);
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
            'valorUnitario' => 'required',
            'imagen' => 'required'
        ];
        $this->validate($request,$rules);
        
        $campos = $request->all();
        //dd($campos);
        $Articulo = Articulo::create($campos);
        return $this->successResponse($Articulo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articulo  $Articulo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Articulo = Articulo::findOrFail($id);
        return $Articulo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulo  $Articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $Articulo)
    {
        $rules = [
            'valorUnitario' => 'valorUnitario',
        ];
        $this->validate($request,$rules);
        $Articulo->fill($request->all());

        if($Articulo->isClean()){
            return $this->errorResponse("No se hicieron cambios",422);
        }

        //dd($request);

        $Articulo->save();
        
        return $this->successResponse($Articulo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulo  $Articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $Articulo)
    {
        $Articulo->delete();
        return $this->successResponse($Articulo);
    }
}
