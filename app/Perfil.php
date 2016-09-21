<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;
use Soft\User;
class Perfil extends Model
{
    protected $fillable = [
        'id',
        'descripcion',
      
    ];

    //crea una tabla de perfils
    protected $table="perfils";


     						/*relaciones de las tablas*/

public function user()
    {
        //un perfil puede tener muchas usuarios
       return $this->hasMany(User::class);
    }

}
