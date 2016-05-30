<?php

namespace Soft;
use Carbon\Carbon; 
use DB;
use Storage;
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
        're_password',
        'email',
        'usu_direcc',
        'perfil_id',
        'usu_tel',
        'path',
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


    



                        /*relaciones de las tablas*/


/*para que esto funciones el la db enl nombre de la columna deve apuntar a la tabla relacionada
por ejemplo , en user , el perfil se deve llamar asi perfil_id y no usu_perfil como se llamaba
antes*/
public function venta()
    {
        //un usuario puede tener muchas ventas
       return $this->hasMany(Venta::class);
    }

public function perfil()
    {
        //un usuario tiene un perfil
       return $this->belongsTo(perfil::class);;
    }    

}
