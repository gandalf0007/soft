<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;
use Soft\Http\Requests\GastoCreateRequest;
use Soft\Http\Requests\GastoUpdateRequest;

use Session;
use Redirect;
use Soft\Http\Requests;
use Soft\Gasto;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {

        $gastos= gasto::paginate(10);
      
      /*buscador*/
        $fechai=$request->input('fecha_inicio');
        $fechaf=$request->input('fecha_final');

        if (!empty($fechai) and !empty($fechaf)) {
            //entonces me busque de usu_nombre a el nombre que le pasamos atraves de $usu_nombre
            $gastos = gasto::where('fecha', '>=' , $fechai)->where('fecha', '<=', $fechaf)->paginate(50);
        }
        /*buscador*/


       return view('admin.gasto.index',compact('gastos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gasto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GastoCreateRequest $request)
    {
         gasto::create($request->all());
         Session::flash('message','gasto Guardado con exito'); 
       return Redirect::to('/gasto');
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
    public function update(GastoUpdateRequest $request, $id)
    {
         $gastos=gasto::find($id);
        $gastos->fill($request->all());
        $gastos->save();

        //le manda un mensaje al usuario
       Session::flash('message','gasto modificado con exito'); 
       return Redirect::to('/gasto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gastos=gasto::find($id);
        $gastos->delete();
        
        //le manda un mensaje al usuario
        Session::flash('message','Gasto eliminado con exito'); 
        return Redirect::to('/gasto');
    }
}
