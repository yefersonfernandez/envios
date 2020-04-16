<?php

namespace App;
use App\DireccionEnvio;
use App\Articulo;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'id',
        'fechaPedido',
        'direccionEnvio_id'
    ];

    public function rela_DireccionEnvio()
    {

        return $this->belongsTo(DireccionEnvio::class);
    }
    public function rela_Articulo()
    {

        return $this->belongsToMany(Articulo::class);
    }
}
