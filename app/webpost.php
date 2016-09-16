<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class webpost extends Model
{
           
protected $fillable = [
        	'id',
        	'titulo',
          'descripcioncorta',
          'descripcionlarga',
          'user_id',
           'web_post_categoria_id',
            
    ];

public function user()
    {
        //un post tiene un user
       return $this->belongsTo(User::class);
    } 


}

