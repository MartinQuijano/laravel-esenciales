<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha',
        'estado',
        'cliente_id',
    ];

    public function productos(){
        return $this->belongsToMany('App\Models\Producto', 'lista_pedidos')->withPivot('cantidad');
    }

    public function precioTotal() {
        $precio_total = 0;
        foreach($this->productos as $producto)
            $precio_total = $precio_total + ($producto->precio * $producto->pivot->cantidad);
        return $precio_total;
      }
}
