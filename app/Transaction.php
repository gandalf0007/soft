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
          
}
