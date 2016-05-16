<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Http\Requests;
use Soft\Cliente;
use Soft\Iva;
use Soft\Transporte;
use Session;
use Redirect;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes=cliente::orderBy('clie_nombres');
        //lo que ingresamos en el buscador lo alamacenamos en $usu_nombre
        $clie_nombres=$request->input('clie_nombres');
        //preguntamos que si ($usu_nombre no es vacio
        if (!empty($clie_nombres)) {
            //entonces me busque de usu_nombre a el nombre que le pasamos atraves de $usu_nombre
            $clientes->where('clie_nombres','LIKE','%'.$clie_nombres.'%');
        }
        //realizamos la paginacion
        $clientes=$clientes->paginate(10);
        //retorna a una vista que esta en la carpeta usuario y dentro esta index
        //compact es para enviarle informaion a esa vista index , y le mandamos ese users que creamos
        //que contiene toda la informacion
        return view('admin.cliente.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ivas=iva::lists('descripcion','id');
        $transportes=transporte::lists('transp_descrip','id');

        return view('admin.cliente.create',['ivas'=>$ivas ,'transportes'=>$transportes ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        cliente::create($request->all());
        return redirect('/cliente')->with('message','cliente guardado con exito');
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
        $ivas=iva::lists('descripcion','id');
        $transportes=transporte::lists('transp_descrip','id');

        $cliente=cliente::find($id);
        return view('admin.cliente.edit',['cliente'=>$cliente  , 'transportes'=>$transportes , 'ivas'=>$ivas]);
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
        $cliente=cliente::find($id);
       $cliente->fill($request->all());
       $cliente->save();

        //le manda un mensaje al usuario
       Session::flash('message','cliente modificado con exito'); 
       return Redirect::to('/cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente=cliente::find($id);
        $cliente->delete();
        
        //le manda un mensaje al usuario
        Session::flash('message','cliente eliminado con exito'); 
        return Redirect::to('/cliente');
    }
}
