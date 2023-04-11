<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variacion extends Model
{
    protected $fillable = [
        'producto_id',
        'referencia',
        'descripcion',
        'precio'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
