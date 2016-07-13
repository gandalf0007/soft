<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Categoriasub extends Model
{
    protected $fillable = [
        	'id',
        	'nombre',
        	'categoria_id',
        	'icono',
            
    ];

    public function categoria()
    {
        //un sub-categoria puede tener una categoria
        return $this->belongsTo(categoria::class);
    }


}
