<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

use Soft\Producto;

class Producto_imagen extends Model
{
     protected $fillable = [
		    'id',
        'nombre',
        'ruta',
        'tipo',
        'tamaño',
       'producto_id',
	 ];

	  public function producto()
    {
      //una imagen corresponde a un producto
        return $this->belongsTo(Producto::class);
    }





}
