<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Http\Requests;
use Soft\Punto;

use Alert;
use Session;
use Redirect;
use Storage;
use DB;
use Image;
class PuntosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puntos = punto::all();
        return view('admin.configuracion.puntos.index',compact('puntos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //retorna a una vista que esta en la carpeta usuario y dentro esta create
        return view('admin.configuracion.puntos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        punto::create($request->all());

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Porcentaje Creado');
       return Redirect::to('/puntos');
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
        //
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
        $punto= punto::find($id);
        $punto->fill($request->all());
        $punto->save();

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'porcentaje Modificado');
       return Redirect::to('/puntos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $punto=punto::find($id);
        $punto->delete();
        
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'porcentaje Eliminado');
        return Redirect::to('/puntos');
    }
}
