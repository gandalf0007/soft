<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Http\Requests;
use Session;
use Redirect;
use Soft\Transporte;

class TransporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transportes=transporte::orderBy('id');

        //busquador
        $transp_descrip=$request->input('transp_descrip');
        if (!empty($transp_descrip)) {         
            $transportes->where('transp_descrip','LIKE','%'.$transp_descrip.'%');
        }


       $transportes=$transportes->paginate(10);
        return view('admin.configuracion.transporte.index',compact('transportes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.configuracion.transporte.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       transporte::create($request->all());

        //le manda un mensaje al usuario
       Session::flash('message','transporte modificado con exito'); 
       return Redirect::to('/transporte');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transporte=transporte::find($id);
        return view('admin.configuracion.transporte.edit',['transporte'=>$transporte]);
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
        $transporte=transporte::find($id);
        $transporte->fill($request->all());
        $transporte->save();

        //le manda un mensaje al usuario
       Session::flash('message','transporte modificado con exito'); 
       return Redirect::to('/transporte');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transporte=transporte::find($id);
        $transporte->delete();
        
        //le manda un mensaje al usuario
        Session::flash('message','transporte eliminado con exito'); 
        return Redirect::to('/transporte');
    }
}
