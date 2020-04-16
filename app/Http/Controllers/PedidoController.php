<?php

namespace App\Http\Controllers;

use App\pedido;
use Illuminate\Http\Request;

class pedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $pedidos = pedido::all();
        return $this->successResponse( $pedidos);
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
            'fechapedido' => 'required',
            'direccionEnvio_id' => 'required'
        ];
        $this->validate($request,$rules);
        
        $campos = $request->all();
        //dd($campos);
        $pedido = pedido::create($campos);
        return $this->successResponse($pedido);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = pedido::findOrFail($id);
        return $pedido;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'fechaPedido' => 'date',
        ];
        //dd($request);
        $this->validate($request,$rules);
        $pedido = Pedido::findOrFail($id);
        $pedido->fill($request->all());
        

        //dd($request);
        if($pedido->isClean()){
            return response()->json("No se hicieron cambios",422);
        }

        $pedido->save();
        
        return $this->successResponse($pedido);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();
        return $this->successResponse($pedido);
    }
}
