<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;
use Soft\Ticket;


class Tickets_prioritie extends Model
{
    protected $fillable = [
    'id',
    'nombre',
    'color',
    ];


   public function ticket()
    {
        //un prioridad puede tener muchas ticket
       return $this->hasMany(Ticket::class);
    }
}
