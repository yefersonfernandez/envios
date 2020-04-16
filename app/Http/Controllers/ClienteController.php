<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return $this->successResponse($clientes);
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
            'email' => 'required|email',
            'telefono' => 'required' 
        ];
        $this->validate($request,$rules);
        
        $campos = $request->all();
        //dd($campos);
        $cliente = Cliente::create($campos);
        return $this->successResponse($cliente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return $cliente;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
      public function update(Request $request, $id)
    {
        $rules = [
            'email' => 'email',
        ];
        //dd($request);
        $this->validate($request,$rules);
        $cliente = Cliente::findOrFail($id);
        $cliente->fill($request->all());
        

        //dd($request);
        if($cliente->isClean()){
            return response()->json("No se hicieron cambios",422);
        }

        $cliente->save();
        
        return $this->successResponse($cliente);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return $this->successResponse($cliente);
    }
}
