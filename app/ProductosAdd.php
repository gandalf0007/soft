<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class ProductosAdd extends Model
{
    protected $fillable = [
        'id',
        'pro_codigo',
        'pro_descrip',
        'path',
        'pro_preciocosto',
        'iva_id',

        'pro_venta',
        'pro_precio2',
        'pro_precio3',

          'pro_rentabi1',
          'pro_rentabi2',
          'pro_rentabi3',

          'pro_atock_act',
          'pro_atock_cri',
          'pro_atock_ped',

           'rubro_id',
           'marca_id',

          'pro_cod_alter',
          'pro_ubicacion',
          'pro_cod_bulto',
          'pro_cant_bulto',

           'provedor_id',

          'pro_observaciones',
          //faltan en el formulario
          'pro_habilitado',
          'pro_alerta',
          'pro_usar_rentabili',
          'fecha_alta',
    ];
}
