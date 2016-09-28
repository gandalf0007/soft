<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;
use Soft\Ticket;



class Tickets_statu extends Model
{
    protected $fillable = [
    'id',
    'nombre',
    'color',
    ];


      public function ticket()
    {
        //un status puede tener muchas ticket
       return $this->hasMany(Ticket::class);
    }
}
