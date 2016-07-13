<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

	protected $fillable = [
        	'id',
            'nombre',
            'direccion',
            'telefono',
            'email',
            'observacion',    
            'localidad',
            'iva_id',
            'lista_precio',
            'cuit',
            'cp',
            'transporte_id',
            'habilitado',
            'cuentacorriente',
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
