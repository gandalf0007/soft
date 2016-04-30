<?php

namespace Soft\Http\Controllers;
use Illuminate\Http\Request;
use Soft\Http\Requests;
use Soft\Movie;
use Soft\Genero;
use Redirect;
use Session;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        //se aplica el auth a todos los metodos de esta clase , por lo tanto tiene que estar
        //logueado para acceder
        $this->middleware('auth');
        
    }

    
    public function index()
    {

        $movies= Movie::Movies();
        //$movies=Movie::paginate(10);
        return view('pelicula.index',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generos= Genero::lists('genero','id');
        return view ('pelicula.create',compact('generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Movie::create($request->all());
        //return redirect('/genero')->with('message','agregado con exito');
        return redirect('/pelicula')->with('message','pelicula creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //listo los generos
        //$genero=genero::lists('genero','id');

        //creamos un $movie que va a hacer igual al user que encontremos con la id que recibimos 
        $generos=genero::lists('genero','id');
        $movie=Movie::find($id);
        //nos regrasa a la vista en edit que se encuentra en la carpeta pelicula a la cual le pasamos el 
        //la pelicula correspondiente
        
        return view('pelicula.edit',['movie'=>$movie , 'generos'=>$generos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //otra forma de actualizar 
        $movie=movie::find($id);
        $movie->fill($request->all());
        $movie->save();

        //le manda un mensaje al usuario
        Session::flash('message','pelicula modificado con exito'); 
        return Redirect::to('/pelicula');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //destruye deacuerdo al id que nos pasaron User::destroy($id); 
        //medoto delete ad , buscamos al user deacuardo a la id que recibimos y hacemos referencia a delete
        //otra forma de eliminar es $this->movie->delete();
        $movies=Movie::find($id);
        $movies->delete();
        //para eliminar la imagen
        \Storage::delete($movies->path);
        
        //le manda un mensaje al usuario
        Session::flash('message','pelicula eliminada con exito'); 
        return Redirect::to('/pelicula');
    }
}
