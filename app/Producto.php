<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; 
use DB;
use Storage;

class Producto extends Model
{

	protected $fillable = [
           'id',
           'codigo',
           'descripcion',
             
           'preciocosto',
           'iva_id',
           'precioventa',     
           'rentabi1',
           'precio2',
           'rentabi2',
           'precio3',
           'rentabi3',
           
           'stockactual',
           'stockcritico',
           'stockpedido',
            'rubro_id',
            'marca_id',
            'provedor_id',
            
            'categoria_id',
            'categoriasub_id',
            
           'cod_alter',
           'ubicacion',
           'cod_bulto',
           'cant_bulto',

           'habilitado',
           'alerta',
           'observaciones',
           'usar_rentabili',

            'descripcioncorta',
            'descripcionlarga',

           'imagen1',
           'filename',
           'imagen3',

           'oferta',
           'hot',
           
          
    ];

     	
          //crea una tabla de peliculas
    protected $table="productos";

   

       public function setPathAttribute($path){

      $this->attributes['path']  = Carbon::now()->second.$path->getClientOriginalName();
      $name = Carbon::now()->second.$path->getClientOriginalName();
      \Storage::disk('local')->put($name, \File::get($path));

    }


    public function transaction()
    {
      //una producto corresponde a una transaccion
        return $this->hasMany(transaction::class);
    }

    public function webtransaction()
    {
      //una producto corresponde a una transaccion
        return $this->hasMany(web_transaccione::class);
    }


    public function marca()
    {
      //una producto corresponde a una marca
        return $this->belongsTo(marca::class);
    }

    public function producto_image()
    {
      //una producto puede tener varias imagenes
        return $this->hasMany(producto_image::class);
    }

    public function categoria()
    {
      //una producto corresponde a una categoria
        return $this->belongsTo(categoria::class);
    }

    public function categoriasub()
    {
      //una producto corresponde a una categoriasub
        return $this->belongsTo(categoriasub::class);
    }



}
