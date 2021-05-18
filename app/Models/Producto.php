<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'marca',
        'categoria',
        'cantidad',
        'precio',
        'unidad',
        'descripcion',
        'ingredientes',
        'imagen',
    ];
}
