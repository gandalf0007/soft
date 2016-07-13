<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Http\Requests;
use Auth;
use Alert;
use Session;
use Redirect;
use Storage;
use Soft\categoria;
use Soft\Categoriasub;
use DB;
use Image;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

      
      $subcategorias = categoriasub::all();
       $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();
        $categoriasList=categoria::lists('nombre','id');
        
         return view('admin.categoria.index',compact('categorias','subcategorias','categoriasList'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //retorna a una vista que esta en la carpeta usuario y dentro esta create
        return view('admin.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //obtenemos el campo icon definido en el formulario
        $file = $request->file('icon');
         //obtenemos el nombre del archivo
       $nombre = $file->getClientOriginalName();
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('svg')->put($nombre,  \File::get($file));

        categoria::create([
            'nombre' =>$request['nombre'],
            'icon'=>$nombre,
            ]);
        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Categoria Creada');
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
        $categoria=categoria::find($id);
        
       if(!empty($file)){
        //eliminar el archivo antes de modificar
         \Storage::disk('svg')->delete($categoria->icon);
        //obtenemos el campo icon definido en el formulario
        $file = $request->file('icon');
        //obtenemos el nombre del archivo
       $nombre = $file->getClientOriginalName();
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('svg')->put($nombre,  \File::get($file));
       $categoria->icon =$nombre;
       } 

         //carga de imagen atraves de intervention el paquete de imagen
        if ($request->hasFile('banner')) {
            $avatar =$request->file('banner');
            $filename=time() . '.' . $avatar->getClientOriginalExtension();
            image::make($avatar)->resize(397, 395)->save( public_path('/storage/banner/' . $filename));

            $categoria=categoria::find($id);
            $categoria->banner = $filename;
            $categoria->save();
        }
         
        $categoria->nombre = $request['nombre'];
        $categoria->save();

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Categoria Modificada');
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
        $categoria=categoria::find($id);
        $categoria->delete();
        
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Categoria Eliminada');
        return Redirect::to('/categoria');
    }
}
