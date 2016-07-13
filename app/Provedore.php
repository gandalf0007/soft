<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Provedore extends Model
{

	protected $fillable = [
        	'id',
        	'razonsocial',
            'contacto',
            'email',
            'skype',
            'direccion',
            'telefono',
            'dia_visita',
            'cuit',
            'observacion',
            'habilitado',
        
    ];
      
            
         
}
