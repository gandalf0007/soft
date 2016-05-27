<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

	protected $fillable = [
        	'id',
            'clie_nombres',
            'clie_direccion',
            'clie_telefono',
            'clie_mail',
            'clie_observacion',    
            'clie_localidad',
            'clie_iva',
            'clie_lista_precio',
            'clie_cuit',
            'clie_cp',
            'transp_des',
            'clie_habilitado',
            'clie_hab_cta',
    ];
    		
          
public function venta()
    {
        //un cliente puede tener muchas ventas
       return $this->hasMany('Soft\venta');
    }

}
