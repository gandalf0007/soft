<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;
use Soft\Ticket;


class Tickets_categorie extends Model
{
    protected $fillable = [
    'id',
    'nombre',
    'color',
    ];

public function ticket()
    {
        //un categoria puede tener muchas ticket
       return $this->hasMany(Ticket::class);
    }



}
