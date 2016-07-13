<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Http\Requests;
use Soft\Categoriasub;
use Soft\Categoria;
use Session;
use Redirect;
use Alert;
use Storage;

class CategoriaSubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categoriasList=categoria::lists('nombre','id');
        return view('admin.categoria.sub.create',['categoriasList'=>$categoriasList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       categoriasub::create([
            'nombre' =>$request['nombre'],
            'categoria_id'=>$request['categoria_id'],
            ]);

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Sub-Categoria Creada');
       return Redirect::to('/categoria');
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
        $subcategoria=categoriasub::find($id);
        $subcategoria->fill($request->all());
        $subcategoria->save();

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Sub-Categoria Modificada');
       return Redirect::to('/categoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategoria=categoriasub::find($id);
        $subcategoria->delete();
        
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Sub-Categoria Eliminada');
        return Redirect::to('/categoria');
    }
}
