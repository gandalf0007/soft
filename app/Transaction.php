<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	 protected $fillable = [
        	'id',
            'product_id',
            'form_id',
            'qty',
            'total_price',
            'status',
        
    ];
          
}
