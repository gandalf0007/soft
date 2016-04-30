<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $fillable = [
        'id',
        'descripcion',
      
    ];

    //crea una tabla de perfils
    protected $table="perfils";
}
