<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class web_venta extends Model
{
    
protected $fillable = [
        	  'id',
            'cliente_id',
            'user_id',
           	'pago_tipo',
            'transporte',
           	'total',
           	'comentario',
           	'status',
    ];


public function webtransaction()
    {
      //una venta corresponde a muchas transacciones
         return $this->hasMany(web_Transacsione::class);
    }

}
