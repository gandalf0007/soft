<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{

	 protected $fillable = [
        'id',
        'transp_descrip',
        'transp_direcc',
        'transp_tel',
        
    ];
   
           
public function cliente()
    {
        //un transporte puede tener muchas clientes
       return $this->hasMany(Cliente::class);
    }


}
