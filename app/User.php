<?php

namespace Soft;
use Carbon\Carbon; 
use DB;
use Storage;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Scope;
use Soft\Venta;
use Soft\web_venta;
use Soft\Perfil;
use Soft\webpost;
use Soft\user_facturacion;
use Soft\Ticket;
use Soft\Tickets_comment;

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
        'nombre',
        'apellido',
        'password',
        're_password',
        'email',
        'direccion',
        'perfil_id',
        'telefono',
        'path',
        'provincia',
        'ciudad',
        'cp',
        'puntos',
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

public function webventa()
    {
        //un usuario puede tener muchas ventas
       return $this->hasMany(web_venta::class);
    }


public function perfil()
    {
        //un usuario tiene un perfil
       return $this->belongsTo(Perfil::class);
    }   

public function webpost()
    {
        //un usuario puede tener muchos post
       return $this->hasMany(webpost::class);
    } 

    public function facturacion()
    {
        //un usuario tiene una facturacion
       return $this->belongsTo(user_facturacion::class);
    }  

  public function ticket()
    {
        //un usuario puede tener muchas ticket
       return $this->hasMany(Ticket::class);
    }

    public function comentario()
    {
        //un usuario puede tener muchas ticket
       return $this->hasMany(Tickets_comment::class);
    }
}
