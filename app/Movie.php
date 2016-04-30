<?php

namespace Soft;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; 
use DB;
class Movie extends Model
{

	protected $fillable = [
        'id', 'nombre', 'cast','direccion', 'duracion','genero_id','path',
    ];
    
    //crea una tabla de peliculas
    protected $table="movies";

    //mutador para que no se sobrescriban las imagenes
    public function setPathAttribute($path){

    	$this->attributes['path']  = Carbon::now()->second.$path->getClientOriginalName();
    	$name = Carbon::now()->second.$path->getClientOriginalName();
    	\Storage::disk('local')->put($name, \File::get($path));

    }

    //aqui hacemos una consulta con el query bilder que provee laravel
    public static function Movies(){
    	//retornamos la tabla movies
    		return DB::table('movies')
    		//creamos un join con la tabla generos , donde el id de la tabla generos sea =
    		// al genero en la tabla movies
    		->join('generos','generos.id','=','movies.genero_id')
    		//seleccionamos todos los campos de la tabla movies y seleccionamos solamente el campo genero
    		//de la tabla genero
    		->select('movies.*','generos.genero')
    		//recibimos la consulta y me la pagina a la vez
    		->paginate(10);


    	}
}
