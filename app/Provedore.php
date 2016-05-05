<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Provedore extends Model
{

	protected $fillable = [
        	'id',
        	'prov_razsoc',
            'prov_contacto',
            'prov_mail',
            'prov_skype',
            'prov_direccion',
            'prov_tel',
            'prov_diasvisita',
            'prov_cuit',
            'prov_observacion',
            'prov_habilitado',
        
    ];
      
            
         
}
