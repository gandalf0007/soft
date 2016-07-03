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
            'iva_id',
            'clie_lista_precio',
            'clie_cuit',
            'clie_cp',
            'transporte_id',
            'clie_habilitado',
            'clie_hab_cta',
    ];
    		
          
public function venta()
    {
        //un cliente puede tener muchas ventas
       return $this->hasMany(Venta::class);
    }


public function transporte()
    {
        //un cliente puede tener un transporte
        return $this->belongsTo(Transporte::class);
    }


public function iva()
    {
        //un cliente puede tener un iva
        return $this->belongsTo(Iva::class);
    }

}
