<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Productos_slug extends Model
{
 
            protected $fillable = [
        	'id',
        	'slug',
            'producto_id',        
    ];
}
