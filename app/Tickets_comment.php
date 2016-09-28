<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;
use Soft\User;

class Tickets_comment extends Model
{
    protected $fillable = [
    'id',
    'comment',
    'html',
    'user_id',
    'ticket_id',

    ];


    public function user()
    {
        //un comentario puede tener 1 usuario
       return $this->belongsTo(User::class);
    }
    
}
