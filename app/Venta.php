<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;
use Soft\Transaction;
use Soft\Producto;
use Soft\User;
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
        return $this->belongsTo(User::class);
    }

public function cliente()
    {
      //una venta corresponde a un cliente
        return $this->belongsTo(Cliente::class);
    }

public function transaction()
    {
      //una venta corresponde a muchas transacciones
         return $this->hasMany(Transaction::class);
    }

}
