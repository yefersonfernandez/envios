<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;


class ClienteDireccionEnvioController extends Controller
{
    public function index(Cliente $cliente)
    {
        $direccionEnvio = $cliente->rela_DireccionEnvio();
        return $this->successResponse($direccionEnvio);
    }
}
