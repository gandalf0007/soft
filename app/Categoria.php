<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

use Soft\Producto;
use Soft\Categoriasub;
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
       return $this->hasMany(Categoriasub::class);
    }


    public function producto()
    {
        //una categoria puede tener muchas productos
       return $this->hasMany(Producto::class);
    }

   
    
}
