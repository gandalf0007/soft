<?php

namespace Soft\Http\Controllers;
use Illuminate\Http\Request;
use Soft\Http\Requests;
use Soft\Marca;
use Session;
use Redirect;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $marcas=marca::orderBy('descripcion');
        //lo que ingresamos en el buscador lo alamacenamos en $usu_nombre
        $descripcion=$request->input('descripcion');
        //preguntamos que si ($usu_nombre no es vacio
        if (!empty($descripcion)) {
            //entonces me busque de usu_nombre a el nombre que le pasamos atraves de $usu_nombre
            $marcas->where('descripcion','LIKE','%'.$descripcion.'%');
        }
        //realizamos la paginacion
        $marcas=$marcas->paginate(10);
        //retorna a una vista que esta en la carpeta usuario y dentro esta index
        //compact es para enviarle informaion a esa vista index , y le mandamos ese users que creamos
        //que contiene toda la informacion
        return view('admin.configuracion.marca.index',compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.configuracion.marca.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        marca::create([
            'descripcion' =>$request['descripcion'],
            
            ]);
        return redirect('/marca')->with('message','marca guardado con exito');
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
        //creamos un $marca que va a hacer igual a la marca que encontremos con la id que recibimos 
        $marca=marca::find($id);
        //nos regrasa a la vista en edit que se encuentra en la carpeta usuario a la cual le pasamos el 
        //user correspondiente
        
        return view('admin.configuracion.marca.edit',['marca'=>$marca]);
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
       $marca=marca::find($id);
       $marca->fill($request->all());
       $marca->save();

        //le manda un mensaje al usuario
       Session::flash('message','marca modificado con exito'); 
       return Redirect::to('/marca');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca=marca::find($id);
        $marca->delete();
        
        //le manda un mensaje al usuario
        Session::flash('message','marca eliminada con exito'); 
        return Redirect::to('/marca');
    }
}
