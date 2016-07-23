<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Http\Requests;
use Soft\web_marca;
use Alert;
use Session;
use Redirect;
use Storage;
use DB;
use Image;
use File;

class WebCarrucelMarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    
    public function index()
    {
        $imagenesMarcas=web_marca::all();
    return view ('admin.paginas.home.marcas.index',compact('imagenesMarcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //retorna a una vista que esta en la carpeta usuario y dentro esta create
        return view('admin.paginas.home.marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //carga de imagen atraves de intervention el paquete de imagen
        if ($request->hasFile('imagen')) {
            $avatar =$request->file('imagen');
            $filename=time() . '.' . $avatar->getClientOriginalExtension();
            image::make($avatar)->resize(114, 51)->save( public_path('/storage/paginas/home/marcas/' . $filename));

            web_marca::create([
            'imagen' =>$filename,
            ]);

        }

       
        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Marca Creado');
       return Redirect::to('/webconfig-carrucelmarcas');
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
         $carrucelMarcas=web_marca::find($id);
         //carga de imagen atraves de intervention el paquete de imagen
        if ($request->hasFile('imagen')) {
            $avatar =$request->file('imagen');
            $filename=$avatar->getClientOriginalName();
            image::make($avatar)->resize(114, 51)->save( public_path('/storage/paginas/home/marcas/' . $filename));

            $carrucelMarcas=web_marca::find($id);
            $carrucelMarcas->imagen = $filename;
            $carrucelMarcas->save();
        }

        return Redirect::to('/webconfig-carrucelmarcas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagenes=web_marca::find($id);
        $imagenes->delete();
         \Storage::disk('marcas')->delete($imagenes->imagen);
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Marca Eliminada');
       return Redirect::to('/webconfig-carrucelmarcas');
    }
}
