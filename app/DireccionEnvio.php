<?php

namespace App;
use App\Ciudad;
use App\Cliente;
use App\Locacion;

use Illuminate\Database\Eloquent\Model;

class DireccionEnvio extends Model
{
    protected $fillable = [
        'id',
        'descripcion',
        'ciudad_id',
        'cliente_id'
    ];

    public function rela_Ciudad()
    {

        return $this->belongsTo(Ciudad::class);
    }

    public function rela_Cliente()
    {

        return $this->belongsTo(Cliente::class);
    }

    public function rela_Locacion()
    {

        return $this->hasMany(Locacion::class);
    }
    public function rela_Pedido()
    {

        return $this->hasMany(DireccionEnvio::class);
    }

}
