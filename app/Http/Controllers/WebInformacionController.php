<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Http\Requests;
use Soft\web_informacion;
use Alert;
use Session;
use Redirect;
use Storage;
use DB;
use Image;

class WebInformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //retorna a una vista que esta en la carpeta usuario y dentro esta create
        return view('admin.paginas.home.informacion.create');
    }

   


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        web_informacion::create($request->all());

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Informacion Creado');
       return Redirect::to('/webconfig-footer');
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
         $info=web_informacion::find($id);
        $info->fill($request->all());
        $info->save();

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Informacion Modificado');
       return Redirect::to('/webconfig-footer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $info=web_informacion::find($id);
        $info->delete();
        
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Informacion Eliminado');
        return Redirect::to('/webconfig-footer');
    }
}
