<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class web_transaccione extends Model
{
    protected $fillable = [
        	'id',
        	'venta_id',
            'producto_id',
            'user',
            'cantidad',
            'total_price',
           
        
    ];



    public function producto()
    {
      //una transaccion corresponde a un producto
        return $this->belongsTo(producto::class);
    }

public function webventa()
    {
      //una transaccion corresponde a una venta
        return $this->belongsTo(web_venta::class);
    }


}
