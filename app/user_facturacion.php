<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class user_facturacion extends Model
{
   
           
    protected $fillable = [
        'id',
        'user_id',
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'telefono2',
        'cuit',
        'cp',
        'provincia',
        'ciudad',
        'nacimiento',
        'empresa',
        'transporte',

    ];
}
