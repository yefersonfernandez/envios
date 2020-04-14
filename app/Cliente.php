<?php

namespace App;
use App\DireccionEnvio;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'id',
        'nombre',
        'email',
        'telefono'
    ];

    public function rela_DireccionEnvio()
    {

        return $this->hasMany(DireccionEnvio::class);
    }
}
