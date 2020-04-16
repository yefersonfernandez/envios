<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locacion extends Model
{
    protected $fillable = [
        'id',
        'longitud',
        'latitud',
        'direccionEnvio_id'
    ];

    public function rela_DireccionEnvio()
    {

        return $this->belongsTo(DireccionEnvio::class);
    }

}
