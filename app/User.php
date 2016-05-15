<?php

namespace Soft;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Scope;

class User extends Authenticatable
{
    //el uso del soft delete
    //use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'usu_nombre',
        'usu_apellido',
        'password',
        'email',
        'usu_direcc',
        'usu_perfil',
        'usu_tel',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token',];
    //protected $dates = ['deleted_at'];

    //especificamos un modelo para setear la contraseña cada vez que se cambia , recivimos un $valor

    public function setPasswordAtribute($valor){
        //si ese valor no esta vacio , cambiamos la contraseña
        if (!empty($valor)) {
            //es para encriptar la contraseña y con make le pasamos el valor
            $this->attributes['password'] = \hash::make($valor);
        }

    }




}
