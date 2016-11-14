<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;
use Soft\User;


class Reparacione extends Model
{
    protected $fillable = [
        'id',
        'equipo',
        'serie',
        'falla',
        'accesorio',
        'observaciones',
        'status',
        'user_id',
        'vendedor_id',
        
    ];




  public function user()
    {
        //una reparacion  tiene un usuario
       return $this->belongsTo(User::class);
    }
}
