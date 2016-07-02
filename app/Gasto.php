<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
          
    protected $fillable = [
        	'id',
        	'fecha',
            'tipo_gasto',
            'descripcion',
            'justificante',
            'cliente_vinc',
            'importe',
            'tipo_pago',
    ];
}
