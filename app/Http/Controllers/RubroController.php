<?php

namespace Soft\Http\Controllers;
use Illuminate\Http\Request;
use Soft\Http\Requests;
use Soft\Rubro;
use Session;
use Redirect;

class RubroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $rubros=rubro::orderBy('id');
        //buscador
        $rubro=$request->input('rubro');
        if (!empty($rubro)) {
            //entonces me busque de usu_nombre a el nombre que le pasamos atraves de $usu_nombre
            $rubros->where('descripcion','LIKE','%'.$rubro.'%');
        }


        $rubros=$rubros->paginate(10);    
        
        return view('admin.configuracion.rubro.index',compact('rubros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.configuracion.rubro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Rubro::create([
            'descripcion' =>$request['descripcion'],
            ]);
        return redirect('/rubro')->with('message','rubro guardado con exito');
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
     /*   //creamos un $user que va a hacer igual al user que encontremos con la id que recibimos 
        $rubro=Rubro::find($id);
        //nos regrasa a la vista en edit que se encuentra en la carpeta usuario a la cual le pasamos el 
        //user correspondiente
        
        return view('admin.configuracion.rubro.edit',['rubro'=>$rubro]);*/
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
       $rubro=Rubro::find($id);
       $rubro->fill($request->all());
       $rubro->save();

        //le manda un mensaje al usuario
       Session::flash('message','rubro modificado con exito'); 
       return Redirect::to('/rubro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rubro=Rubro::find($id);
        $rubro->delete();
        
        //le manda un mensaje al usuario
        Session::flash('message','rubro eliminado con exito'); 
        return Redirect::to('/rubro');
    }
}
