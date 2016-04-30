<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Http\Requests;
use Soft\Http\Requests\GeneroCreateRequest;
use Soft\Http\Requests\GeneroUpdateRequest;
use Soft\Genero;
use Redirect;
use Session;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $generos=Genero::paginate(10);
        return view('genero.index',compact('generos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('genero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GeneroCreateRequest $request)
    {
        Genero::create([
            'genero' =>$request['genero'],
            ]);
        return redirect('/genero')->with('message','agregado con exito');
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
       //creamos un $genero que va a hacer igual al genero que encontremos con la id que recibimos 
        $genero=Genero::find($id);
        //nos regrasa a la vista en edit que se encuentra en la carpeta usuario a la cual le pasamos el 
        //genero correspondiente
        
           return view('genero.edit',['genero'=>$genero]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GeneroUpdateRequest $request, $id)
    {
        //creamos un $user que va a hacer igual al user que encontremos con la id que recibimos 
        $genero=Genero::find($id);
        $genero->fill($request->all());
        $genero->save();

        //le manda un mensaje al usuario
        Session::flash('message','Genero modificado con exito'); 
        return Redirect::to('/genero');
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
        $generos=Genero::find($id);
        $generos->delete();
        
        //le manda un mensaje al usuario
        Session::flash('message','usuario eliminado con exito'); 
        return Redirect::to('/genero');
    }
}
