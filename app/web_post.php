<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class web_post extends Model
{
           

             protected $fillable = [
        	'id',
        	'titulo',
          	'descripcioncorta',
          	'descripcionlarga',
           	'user_id',
           	'web_post_categoria_id',
            
    ];
}

