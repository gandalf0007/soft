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
          $path = public_path().'/storage/productos';
            $files = $request->file('file');
            foreach($files as $file){
                /*lo guarda con el  nombre generado
                $fileName = time() . '.' .$file->getClientOriginalExtension();*/
                $fileName =$file->getClientOriginalName();
                $file->move($path, $fileName);
                producto_imagen::create([
            'nombre' =>$fileName,
            'ruta'=>$path,
            'producto_id'=>$id,
            ]);
            }
        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Imagenes Creadas');
       return Redirect::to('/producto');
    }

   
 public function destroy(request $request,$id) {
        
          $imagen=producto_imagen::find($id);
         $imagen->delete();
        \Storage::disk('productos')->delete($imagen->nombre);
        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Imagen Eliminada');
       return Redirect::to('/producto-uploadimagen/'.$imagen->producto_id);
    }


    
}
