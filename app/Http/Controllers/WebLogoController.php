<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Http\Requests;
use Alert;
use Session;
use Redirect;
use Storage;
use DB;
use Image;
use Soft\web_logo;
class WebLogoController extends Controller
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
        return view('admin.paginas.home.logo.create');
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
        if ($request->hasFile('logo')) {
            $avatar =$request->file('logo');
            $filename=time() . '.' . $avatar->getClientOriginalExtension();
            image::make($avatar)->save( public_path('/storage/paginas/home/logo/' . $filename));

            web_logo::create([
            'logo' =>$filename,
            ]);

        }

       
        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'logo Creado');
       return Redirect::to('/webconfig-header');
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
         $logos=web_logo::find($id);
         //carga de imagen atraves de intervention el paquete de imagen
        if ($request->hasFile('logo')) {
            $avatar =$request->file('logo');
            $filename=time() . '.' . $avatar->getClientOriginalExtension();
            image::make($avatar)->save( public_path('/storage/paginas/home/logo/' . $filename));

            $logos=web_carrucel::find($id);
            $logos->imagen = $filename;
            $logos->save();
        }
         //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Logo Modificado');
        return Redirect::to('/webconfig-header');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $logos=web_logo::find($id);
        $logos->delete();
        
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'logo Eliminada');
       return Redirect::to('/webconfig-header');
    }
}
