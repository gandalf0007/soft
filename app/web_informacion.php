<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class web_informacion extends Model
{    
            protected $fillable = [
            'id', 
        	'direccion1',
			'direccion2',
			'direccion3',
			'telefono1',
			'telefono2',
			'telefono3',
			'correo1',
			'correo2',
			'correo3',   
			'formasdepago',
            'garantia',
            'avisolegal',
            'envios',
            'preguntas',
    ];
}
