<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Presupuestos_detalle extends Model
{
   protected $fillable = [
        	'id',
        	'presupuesto_id',
            'producto_id',
            'user',
            'cantidad',
            'total_price',
           
        
    ];
}
