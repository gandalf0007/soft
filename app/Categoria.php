<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        	'id',
        	'nombre',
        	'banner',
        	'icon',
            
    ];

    public function categoriasub()
    {
        //una categoria puede tener muchas sub-categorias
       return $this->hasMany(categoriasub::class);
    }

    
}
