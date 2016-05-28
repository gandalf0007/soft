<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
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


public function user()
    {
      //una venta corresponde a un usuario
        return $this->belongsTo(user::class);
    }

public function cliente()
    {
      //una venta corresponde a un cliente
        return $this->belongsTo(Cliente::class);
    }


}
