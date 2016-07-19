<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Producto_Imagen extends Model
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
        return $this->belongsTo(producto::class);
    }
    	
}