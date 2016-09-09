<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Soft\Http\Requests;
use Soft\Producto_imagen;
use Image;
use Auth;
use Hash;
use Validator;
use Response;
use Alert;
use Session;
use Redirect;
use Storage;
use DB;
use Soft\Producto;
use Soft\Categoria;
use Soft\Categoriasub;

class ProductoImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function crear($id)
    {
        $producto=producto::find($id);
        $imagens= producto_imagen::where('producto_id', '=',$id)->get();
        return view('admin.producto.imagen',compact('producto','imagens'));
    }


   public function uploadFiles(request $request,$id) {
        $producto = producto::find($id);
        $categoria = Categoria::where('id','=',$producto->categoria_id)->first();
        $subcategoria = Categoriasub::where('id','=',$producto->categoriasub_id)->first();

$directory = "productos/".$categoria->nombre."/".$subcategoria->nombre."/".$producto->descripcion;
    


          
            $files = $request->file('file');
            foreach($files as $file){
                /*lo guarda con el  nombre generado
                $fileName = time() . '.' .$file->getClientOriginalExtension();*/
                $filename=time() . '.' . $file->getClientOriginalExtension();
                image::make($file)->save( public_path('storage/'.$directory.'/'. $filename));
                producto_imagen::create([
            'nombre' =>$filename,
            'ruta'=>'storage/'.$directory.'/'. $filename,
            'producto_id'=>$id,
            ]);
            }
        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Imagenes Creadas');
       return Redirect::to('/producto');
    }

   
 public function destroy(request $request,$id) {
        $imagen=producto_imagen::find($id);

        $producto = producto::where('id','=',$imagen->producto_id)->first();
       
        $categoria = Categoria::where('id','=',$producto->categoria_id)->first();
        $subcategoria = Categoriasub::where('id','=',$producto->categoriasub_id)->first();

        $directory = $categoria->nombre."/".$subcategoria->nombre."/".$producto->descripcion.'/'.$imagen->nombre;
         
         $imagen->delete();
        \Storage::disk('productos')->delete($directory);
        //le manda un mensaje al usuario
       //Alert::success('Mensaje existoso', 'Imagen Eliminada');
       return Redirect::to('/producto-uploadimagen/'.$imagen->producto_id);
    }


    
}
