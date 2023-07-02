<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosModelo extends Model
{
    use HasFactory;

    // tabla a la que se va a conectar el modelo
    protected $table = 'tablaproductos';

    //
    protected $fillable = ['columnaproductos'];

}
