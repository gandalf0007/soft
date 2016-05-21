<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Venta_Item extends Model
{
    protected $fillable = [
         'id',
         'venta_id',
         'producto_id',
         'precio_costo',
         'precio_venta',
         'cantidad',
         'total_costo',
         'total_venta',
           
    ];
}
