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


  public function CartCount(){
        /*obtengo mi variable de session cart que cree y la almaceno en $cart */
        $cart = \Session::get('cartweb');
        //cuenta los item que hay en la session
        $cartcount =  count($cart);

        return $cartcount;
    }


     public function post()
    {
        //llama a la funcion CartTotal
        $cartcount = $this->CartCount();

        /*seccion para el layout*/
        $subcategorias = DB::table('categoriasubs')->orderBy('nombre', 'asc')->get();
         $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();      
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();
        /*seccion para el layout*/
        $posts=webpost::paginate(10);
         return view ('shop.blog',compact('cartcount',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos',
                                          'posts',
                                          'subcategorias',
                                          'categorias'
                                          ));
    }

 public function postDetalle($id)
    {
        //llama a la funcion CartTotal
        $cartcount = $this->CartCount();

         /*seccion para el layout*/
         $subcategorias = DB::table('categoriasubs')->orderBy('nombre', 'asc')->get();
         $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();
        /*seccion para el layout*/
        $post=webpost::find($id);
        return view('shop.blog-details',compact('cartcount',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos',
                                          'post',
                                          'subcategorias',
                                          'categorias'
                                          ));
    }


    public function Home(){
        //llama a la funcion CartTotal
        $cartcount = $this->CartCount();

        $subcategorias = DB::table('categoriasubs')->orderBy('nombre', 'asc')->get();
         $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();
        $carrucels =  DB::table('web_carrucels')->orderBy('imagen', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();
         
         return view ('shop.home',compact('cartcount',
                                          'categorias',
                                          'subcategorias',
                                          'carrucels',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos'
                                          ));


    }
    


  public function itemDetalle($id){
    //llama a la funcion CartTotal
        $cartcount = $this->CartCount();

      /*seccion para el layout*/
        $subcategorias = DB::table('categoriasubs')->orderBy('nombre', 'asc')->get();
        $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();
        /*seccion para el layout*/
        $itemdetalle=producto::find($id);
        $imagens= producto_imagen::where('producto_id', '=',$id)->get();
        return view('shop.detail2',compact('cartcount',
                                          'categorias',
                                          'subcategorias',      
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos',
                                          'itemdetalle',
                                          'imagens'
                                          ));

    }


     public function subcategoria($id){
      //llama a la funcion CartTotal
        $cartcount = $this->CartCount();

      /*seccion para el layout*/
        $subcategorias = DB::table('categoriasubs')->orderBy('nombre', 'asc')->get();
        $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();
        $carrucels =  DB::table('web_carrucels')->orderBy('imagen', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();
        /*seccion para el layout*/
        $itemdetalles=producto::where('categoriasub_id','=',$id)->get();
        $itemdetalles=producto::where('habilitado','=',1)->get();
        return view('shop.category',compact('cartcount',
                                          'categorias',
                                          'subcategorias',
                                          'carrucels',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos',
                                          'itemdetalles'
                                         
                                          ));

    }





public function PreguntasFrecuentes(){
  //llama a la funcion CartTotal
        $cartcount = $this->CartCount();

        $subcategorias = DB::table('categoriasubs')->orderBy('nombre', 'asc')->get();
         $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();
         return view ('shop.preguntasfrecuentes',compact('cartcount',
                                          'categorias',
                                          'subcategorias',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos'
                                          ));
    }


public function FormasDePago(){
  //llama a la funcion CartTotal
        $cartcount = $this->CartCount();

        $subcategorias = DB::table('categoriasubs')->orderBy('nombre', 'asc')->get();
         $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();
         return view ('shop.formasdepago',compact('cartcount',
                                          'categorias',
                                          'subcategorias',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos'
                                          ));
    }

public function garantia(){
  //llama a la funcion CartTotal
        $cartcount = $this->CartCount();

        $subcategorias = DB::table('categoriasubs')->orderBy('nombre', 'asc')->get();
         $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();
         return view ('shop.garantia',compact('cartcount',
                                          'categorias',
                                          'subcategorias',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos'
                                          ));
    }

public function AvisoLegal(){
  //llama a la funcion CartTotal
        $cartcount = $this->CartCount();

        $subcategorias = DB::table('categoriasubs')->orderBy('nombre', 'asc')->get();
         $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();
         return view ('shop.avisolegal',compact('cartcount',
                                          'categorias',
                                          'subcategorias',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos'
                                          ));
    }

    public function envios(){
      //llama a la funcion CartTotal
        $cartcount = $this->CartCount();

        $subcategorias = DB::table('categoriasubs')->orderBy('nombre', 'asc')->get();
         $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();
         return view ('shop.envios',compact('cartcount',
                                          'categorias',
                                          'subcategorias',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos'
                                          ));
    }








public function ubicacion(){
  //llama a la funcion CartTotal
        $cartcount = $this->CartCount();

        $subcategorias = DB::table('categoriasubs')->orderBy('nombre', 'asc')->get();
         $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();
        $carrucels =  DB::table('web_carrucels')->orderBy('imagen', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();
         
         return view ('shop.ubicacion',compact('cartcount',
                                          'categorias',
                                          'subcategorias',
                                          'carrucels',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos'
                                          ));


    }


public function contacto(){
  //llama a la funcion CartTotal
        $cartcount = $this->CartCount();

        $subcategorias = DB::table('categoriasubs')->orderBy('nombre', 'asc')->get();
         $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();
        $carrucels =  DB::table('web_carrucels')->orderBy('imagen', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();
         
         return view ('shop.contacto',compact('cartcount',
                                          'categorias',
                                          'subcategorias',
                                          'carrucels',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos'
                                          ));


    }


}
