<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
	protected $fillable = [
        'id','genero',
    ];
    //crea una tabla de generos
    protected $table="generos";
}
