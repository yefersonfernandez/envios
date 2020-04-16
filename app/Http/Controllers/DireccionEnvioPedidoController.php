<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DireccionEnvio;

class DireccionEnvioPedidoController extends Controller
{
    public function index(DireccionEnvio $direccionEnvio)
    {
        $pedido = $direccionEnvio->rela_Pedido();
        return $this->successResponse($pedido);
    }
}
