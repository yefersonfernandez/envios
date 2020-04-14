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
    public function update(Request $request, Cliente $cliente)
    {
        $rules = [
            'email' => 'email',
        ];
        $this->validate($request,$rules);
        $cliente->fill($request->all());

        if( $cliente->isClean()){
            return $this->errorResponse("No se hicieron cambios",422);
        }

        //dd($request);

        $cliente->save();
        
        return $this->successResponse($cliente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return $this->successResponse($cliente);
    }
}
