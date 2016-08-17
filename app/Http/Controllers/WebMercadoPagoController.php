<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Http\Requests;

use Soft\web_mercadopago;

use Alert;
use Session;
use Redirect;
use Storage;
use DB;
use Image;

class WebMercadoPagoController extends Controller
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
        return view('admin.paginas.home.mercadopago.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         web_mercadopago::create($request->all());

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Porcentaje Creado');
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
        $mercadopago=web_mercadopago::find($id);
        $mercadopago->fill($request->all());
        $mercadopago->save();

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'mercadopago Modificado');
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
        $mercadopago=web_mercadopago::find($id);
        $mercadopago->delete();
        
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'mercadopago Eliminado');
        return Redirect::to('/webconfig-footer');
    }
}
