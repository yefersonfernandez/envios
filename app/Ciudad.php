<?php

namespace App;
use App\DireccionEnvio;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $fillable = [
        'id',
        'nombre'
    ];
    
    public function rela_DireccionEnvio()
    {

        return $this->hasMany(DireccionEnvio::class);
    }
}
