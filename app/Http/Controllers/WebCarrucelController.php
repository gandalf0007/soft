<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Http\Requests;
use Soft\web_carrucel;
use Alert;
use Session;
use Redirect;
use Storage;
use DB;
use Image;
class WebCarrucelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
          $imagenes=web_carrucel::all();
    return view ('admin.paginas.home.carrucel.index',compact('imagenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //retorna a una vista que esta en la carpeta usuario y dentro esta create
        return view('admin.paginas.home.carrucel.create');
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
            image::make($avatar)->resize(720, 368)->save( public_path('/storage/paginas/home/carrucel/' . $filename));

            web_carrucel::create([
            'imagen' =>$filename,
            ]);

        }

       
        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Carrucel Creado');
       return Redirect::to('/webconfig-carrucel');
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

         $carrucels=web_carrucel::find($id);
         //carga de imagen atraves de intervention el paquete de imagen
        if ($request->hasFile('imagen')) {
            $avatar =$request->file('imagen');
            $filename=time() . '.' . $avatar->getClientOriginalExtension();
            image::make($avatar)->save( public_path('/storage/paginas/home/carrucel/' . $filename));

            $carrucels=web_carrucel::find($id);
            $carrucels->imagen = $filename;
            $carrucels->save();
        }
         //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'logo Modificado');
        return Redirect::to('/webconfig-carrucel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagenes=web_carrucel::find($id);
        $imagenes->delete();
        \Storage::disk('carrucel')->delete($imagenes->imagen);
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Carrucel Eliminada');
       return Redirect::to('/webconfig-carrucel');
    }
}
