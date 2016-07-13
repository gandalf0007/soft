<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Http\Requests;
use Soft\web_facebook;
use Alert;
use Session;
use Redirect;
use Storage;
use DB;
use Image;
class WebFacebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //retorna a una vista que esta en la carpeta usuario y dentro esta create
        return view('admin.paginas.home.facebook.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        web_facebook::create($request->all());

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'box Creado');
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
          $box=web_facebook::find($id);
        $box->fill($request->all());
        $box->save();

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'box Modificado');
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
         $box=web_facebook::find($id);
        $box->delete();
        
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'box Eliminado');
        return Redirect::to('/webconfig-footer');
    }
}
