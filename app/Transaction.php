<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	 protected $fillable = [
        	'id',
        	'venta_id',
            'product_id',
            'user',
            'qty',
            'total_price',
           
        
    ];
 

 public function producto()
    {
      //una transaccion corresponde a un producto
        return $this->belongsTo(producto::class);
    }

public function venta()
    {
      //una transaccion corresponde a una venta
        return $this->belongsTo(venta::class);
    }

}
