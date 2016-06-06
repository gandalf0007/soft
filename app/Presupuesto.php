<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
   	protected $fillable = [
        	'id',
            'cliente_id',
            'user_id',
           	'pago_tipo',
           	'total',
           	'comentario',
           	'status',
    ];
}
