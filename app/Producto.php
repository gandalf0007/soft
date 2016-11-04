<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; 
use DB;
use Storage;
use Soft\Categoria;
use Soft\Categoriasub;
use Soft\Transaction;
use Soft\web_transaccione;
use Soft\Marca;
use Soft\Producto_Image;
use Soft\Review;
class Producto extends Model
{

	protected $fillable = [
           'id',
           'codigo',
           'descripcion',
           'slug',
             
           'preciocosto',
           'iva_id',
           'precioventa',   
           'descuento', 
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
           'combo_id',
           
          
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
        return $this->hasMany(Transaction::class);
    }

    public function webtransaction()
    {
      //una producto corresponde a una transaccion
        return $this->hasMany(web_transaccione::class);
    }


    public function marca()
    {
      //una producto corresponde a una marca
        return $this->belongsTo(Marca::class);
    }

    public function producto_image()
    {
      //una producto puede tener varias imagenes
        return $this->hasMany(Producto_Image::class);
    }

    public function categoria()
    {
      //una producto corresponde a una categoria
        return $this->belongsTo(Categoria::class);
    }

    public function categoriasub()
    {
      //una producto corresponde a una categoriasub
        return $this->belongsTo(Categoriasub::class);
    }

    public function reviews()
  { 
      //una producto puede tener varias Reviews
      return $this->hasMany(Review::class);
  }

  public function recalculateRating($rating)
    {
      $reviews = $this->reviews()->notSpam()->approved();
      
      $avgRating = $reviews->avg('rating');
      $this->rating_cache = round($avgRating,1);
      $this->rating_count = $reviews->count();
      $this->save();
    }

}
