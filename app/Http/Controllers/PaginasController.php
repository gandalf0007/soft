<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Http\Requests;
use Soft\webpost;
use Alert;
use Session;
use Redirect;
use Storage;
use DB;
use Image;
use Soft\producto;
use Soft\producto_imagen;

class PaginasController extends Controller
{
     public function post()
    {
        
        /*seccion para el layout*/
        $carrucels =  DB::table('web_carrucels')->orderBy('imagen', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();
        /*seccion para el layout*/
        $posts=webpost::paginate(10);
         return view ('shop.blog',compact(
                                          'carrucels',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos',
                                          'posts'
                                          ));
    }

 public function postDetalle($id)
    {
        
         /*seccion para el layout*/
        $carrucels =  DB::table('web_carrucels')->orderBy('imagen', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();
        /*seccion para el layout*/
        $post=webpost::find($id);
        return view('shop.blog-details',compact(
                                          'carrucels',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos',
                                          'post'
                                          ));
    }


    public function Home(){
        $subcategorias = DB::table('categoriasubs')->orderBy('nombre', 'asc')->get();
         $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();
        $carrucels =  DB::table('web_carrucels')->orderBy('imagen', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();
         
         return view ('shop.home',compact('categorias',
                                          'subcategorias',
                                          'carrucels',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos'
                                          ));


    }
    


public function item(){
      /*seccion para el layout*/
        $carrucels =  DB::table('web_carrucels')->orderBy('imagen', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();
        /*seccion para el layout*/
        $items=producto::paginate(10);
        return view('shop.blog-details',compact(
                                          'carrucels',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos',
                                          'itemds'
                                          ));

    }


  public function itemDetalle($id){
      /*seccion para el layout*/
        $subcategorias = DB::table('categoriasubs')->orderBy('nombre', 'asc')->get();
        $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();
        $carrucels =  DB::table('web_carrucels')->orderBy('imagen', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();
        /*seccion para el layout*/
        $itemdetalle=producto::find($id);
        $imagens= producto_imagen::where('producto_id', '=',$id)->get();
        return view('shop.detail2',compact(
                                          'categorias',
                                          'subcategorias',
                                          'carrucels',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos',
                                          'itemdetalle',
                                          'imagens'
                                          ));

    }


     public function subcategoria($nombre){
      /*seccion para el layout*/
        $subcategorias = DB::table('categoriasubs')->orderBy('nombre', 'asc')->get();
        $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();
        $carrucels =  DB::table('web_carrucels')->orderBy('imagen', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();
        /*seccion para el layout*/
        $itemdetalles=producto::all();
        $imagens= producto_imagen::all();
        return view('shop.category',compact(
                                          'categorias',
                                          'subcategorias',
                                          'carrucels',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos',
                                          'itemdetalles',
                                          'imagens'
                                          ));

    }


}
