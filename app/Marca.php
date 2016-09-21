<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $fillable = [
        'id',
        'descripcion',
      
    ];


//hacemos una consulta query atraves del metodo 
//scopeName se va a ir alterando mi usu_nombre  atraves del para
//metro que le pasamos por $name
    public function scopeSearch($query,$name)
    {
        //buscamos en la column a usu_nombre de la forma like
        return $query->where('descripcion',"like", "%" . $name . "%");


    }


public function producto()
    {
      //una marca corresponde a muchos productos
        return $this->hasMany(Producto::class);
    }

}
