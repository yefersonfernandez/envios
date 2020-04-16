<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudad;


class CiudadDireccionEnvioController extends Controller
{
    public function index($id)
    {
        $ciudad=Ciudad::findOrfail($id);
        $direccionEnvio = $ciudad->rela_DireccionEnvio();
        return $this->successResponse($direccionEnvio);
    }
}
