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

    //para realizar el select dinamico
    public static function subcategoriaselect($id){
        return categoriasub::where('categoria_id','=',$id)->get();
    }

    public function categoria()
    {
        //un sub-categoria puede tener una categoria
        return $this->belongsTo(categoria::class);
    }

     public function producto()
    {
        //una sub-categoria puede tener muchas productos
       return $this->hasMany(producto::class);
    }

}
