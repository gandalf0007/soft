<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;
use Soft\User;
class user_facturacion extends Model
{
   
           
    protected $fillable = [
        'id',
        'user_id',
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'telefono2',
        'cuit',
        'cp',
        'provincia',
        'ciudad',
        'nacimiento',
        'empresa',
        'transporte',

    ];


    public function user()
    {
        //una facturacion tiene un usuario
       return $this->belongsTo(User::class);
    }  

}
