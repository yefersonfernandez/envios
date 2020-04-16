<?php

namespace App\Http\Controllers;
use App\DireccionEnvio;

use Illuminate\Http\Request;

class DireccionEnvioLocacionController extends Controller
{
    public function index(DireccionEnvio $direccionEnvio)
    {
        $locacion = $direccionEnvio->rela_Locacion();
        return $this->successResponse($locacion);
    }
}
