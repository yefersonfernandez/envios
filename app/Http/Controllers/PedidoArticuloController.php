<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;

class PedidoArticuloController extends Controller
{
    public function index(Pedido $pedido)
    {
        $articulo = $pedido->rela_Articulo();
        return $this->successResponse($articulo);
    }
}
