<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Iva extends Model
{
    protected $fillable = [
        'id','descripcion',
    ];
    

    public function cliente()
    {
        //un iva puede tener muchas clientes
       return $this->hasMany(Cliente::class);
    }

}
