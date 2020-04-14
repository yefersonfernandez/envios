<?php

namespace App;
use App\Pedido;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $fillable = [
        'id',
        'descripcion',
        'valorUnitario',
        'imagen'
    ];
    public function rela_Pedido()
    {

        return $this->belongsToMany(Pedido::class);
    }
}
