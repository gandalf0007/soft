<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; 
use DB;
use Storage;

class Producto extends Model
{

	protected $fillable = [
        'id',
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

          'pro_stock_act',
          'pro_stock_cri',
          'pro_stock_ped',

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

     	
          //crea una tabla de peliculas
    protected $table="productos";

   

       public function setPathAttribute($path){

      $this->attributes['path']  = Carbon::now()->second.$path->getClientOriginalName();
      $name = Carbon::now()->second.$path->getClientOriginalName();
      \Storage::disk('local')->put($name, \File::get($path));

    }



}
