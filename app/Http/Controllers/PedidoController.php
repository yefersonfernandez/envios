<?php

namespace App\Http\Controllers;

use App\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $pedidos = Pedido::all();
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
            'fechaPedido' => 'required',
            'DireccionEnvio_id' => 'required'
        ];
        $this->validate($request,$rules);
        
        $campos = $request->all();
        //dd($campos);
        $Pedido = Pedido::create($campos);
        return $this->successResponse($Pedido);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $Pedido
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Pedido = Pedido::findOrFail($id);
        return $Pedido;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $Pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $Pedido)
    {
        $rules = [
            'fechaPedido' => 'fechaPedido',
        ];
        $this->validate($request,$rules);
        $Pedido->fill($request->all());

        if($Pedido->isClean()){
            return $this->errorResponse("No se hicieron cambios",422);
        }

        //dd($request);

        $Pedido->save();
        
        return $this->successResponse($Pedido);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $Pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $Pedido)
    {
        $Pedido->delete();
        return $this->successResponse($Pedido);
    }
}
