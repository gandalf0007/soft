<?php

namespace Soft\Http\Controllers;
use Illuminate\Http\Request;
use Soft\Http\Requests;
use Session;
use Redirect;
use Soft\Ivatipo;
class IvatipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $ivatipos= Ivatipo::paginate(10);
        //retorna a una vista que esta en la carpeta usuario y dentro esta index
        //compact es para enviarle informaion a esa vista index , y le mandamos ese users que creamos
        //que contiene toda la informacion
        return view('configuracion.ivatipo.index',compact('ivatipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configuracion.ivatipo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ivatipo::create([
            'descripcion' =>$request['descripcion'],
            'valor' =>$request['valor'],
            
            ]);
        return redirect('/ivatipo')->with('message','iva guardado con exito');
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

       $ivatipo=Ivatipo::find($id);
        //nos regrasa a la vista en edit que se encuentra en la carpeta usuario a la cual le pasamos el 
        //user correspondiente
        
        return view('configuracion.ivatipo.edit',['ivatipo'=>$ivatipo ]);
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
        $ivatipo=Ivatipo::find($id);
       $ivatipo->fill($request->all());
       $ivatipo->save();

        //le manda un mensaje al usuario
       Session::flash('message','iva modificado con exito'); 
       return Redirect::to('/ivatipo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ivatipo=Ivatipo::find($id);
        $ivatipo->delete();
        
        //le manda un mensaje al usuario
        Session::flash('message','iva eliminado con exito'); 
        return Redirect::to('/ivatipo');
    }
}
