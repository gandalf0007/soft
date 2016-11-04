<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    protected $fillable = [
           'id',
           'gabinete',
           'mother',
           'mouse',
           'teclado',
           'video',
           'procesador',
           'fuente',
           'disco',
           'memoria',
          
    ];

    

}
