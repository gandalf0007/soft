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
use Soft\Producto;
use Soft\Producto_Imagen;
use Soft\Categoria;
use Soft\Review;
class PaginasController extends Controller
{

  public function __construct()
    {
        /*si no existe mi session cart , esntonces la creo con put y creo
        un array para almacenar los items*/
        if(!\Session::has('cartweb')) \Session::put('cartweb', array());
        //para cliente ya no es un array ya que almaceno 1 solo objeto
        if(!\Session::has('cliente')) \Session::put('cliente');
    }

    //total del carrito
    private function total()
    {
      
        $cart = \Session::get('cartweb');
        $total = 0;
        foreach($cart as $item){
            $total += $item->precioventa * $item->quantity;
        }
        return $total;
    }


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
        //llama a la funcion total
        $total = $this->total();

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
                                          'categorias',
                                          'total'
                                          ));
    }

 public function postDetalle($id)
    {
        //llama a la funcion CartTotal
        $cartcount = $this->CartCount();
        //llama a la funcion total
        $total = $this->total();

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
                                          'categorias',
                                          'total'
                                          ));
    }


    public function Home(){
        //llama a la funcion CartTotal
        $cartcount = $this->CartCount();
        //llama a la funcion total
        $total = $this->total();

         /*seccion para el layout*/
        $subcategorias = DB::table('categoriasubs')->orderBy('nombre', 'asc')->get();
         $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();
        $carrucels =  DB::table('web_carrucels')->orderBy('imagen', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();
         /*seccion para el layout*/

         /*productos*/
          $nuevos=producto::where('hot','=',null)->orderBy('created_at','des')->where('habilitado','=',1)->take(30)->get();
          $hots=producto::where('hot','=',1)->where('habilitado','=',1)->get();
          $sales=producto::where('precioventa','>=',1500)->where('habilitado','=',1)->get();
         return view ('shop.home',compact('cartcount',
                                          'categorias',
                                          'subcategorias',
                                          'carrucels',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos',
                                          'total',
                                          'nuevos',
                                          'hots',
                                          'sales'
                                          ));


    }
    


  public function itemDetalle($slug){
    //llama a la funcion CartTotal
        $cartcount = $this->CartCount();
        //llama a la funcion total
        $total = $this->total();

      /*seccion para el layout*/
        $subcategorias = DB::table('categoriasubs')->orderBy('nombre', 'asc')->get();
        $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();
        /*seccion para el layout*/
        $itemdetalle = producto::where('slug','=', $slug)->firstOrFail();
        //$itemdetalle=producto::find($id);
        $imagens= Producto_imagen::where('producto_id', '=',$itemdetalle->id)->get();
        



  // Get all reviews that are not spam for the product and paginate them
  $reviews = Review::where('producto_id','=',$itemdetalle->id)->where('approved','=',1)->orderBy('created_at','desc')->paginate(100);
  $urlimagen = str_replace(" ","%20",$itemdetalle->imagen1);
  
 
        return view('shop.detail2',compact('cartcount',
                                          'categorias',
                                          'subcategorias',      
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos',
                                          'itemdetalle',
                                          'imagens',
                                          'total',
                                          'reviews',
                                          'urlimagen'
                                          ));

    }


     public function subcategoria($id){
      //llama a la funcion CartTotal
        $cartcount = $this->CartCount();
        //llama a la funcion total
        $total = $this->total();

      /*seccion para el layout*/
        $subcategorias = DB::table('categoriasubs')->orderBy('nombre', 'asc')->get();
        $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();
        $carrucels =  DB::table('web_carrucels')->orderBy('imagen', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();
        /*seccion para el layout*/
        $itemdetalles=producto::where('categoriasub_id','=',$id)->where('habilitado','=',1);
        $itemdetalles = $itemdetalles->paginate(15);
        return view('shop.category',compact('cartcount',
                                          'categorias',
                                          'subcategorias',
                                          'carrucels',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos',
                                          'itemdetalles',
                                          'total'
                                         
                                          ));

    }





public function PreguntasFrecuentes(){
        //llama a la funcion CartTotal
        $cartcount = $this->CartCount();
        //llama a la funcion total
        $total = $this->total();

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
                                          'logos',
                                          'total'
                                          ));
    }


public function FormasDePago(){
        //llama a la funcion CartTotal
        $cartcount = $this->CartCount();
        //llama a la funcion total
        $total = $this->total();

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
                                          'logos',
                                          'total'
                                          ));
    }

public function garantia(){
        //llama a la funcion CartTotal
        $cartcount = $this->CartCount();
        //llama a la funcion total
        $total = $this->total();

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
                                          'logos',
                                          'total'
                                          ));
    }

public function AvisoLegal(){
        //llama a la funcion CartTotal
        $cartcount = $this->CartCount();
        //llama a la funcion total
        $total = $this->total();


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
                                          'logos',
                                          'total'
                                          ));
    }

    public function envios(){
        //llama a la funcion CartTotal
        $cartcount = $this->CartCount();
        //llama a la funcion total
        $total = $this->total();

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
                                          'logos',
                                          'total'
                                          ));
    }








public function ubicacion(){
        //llama a la funcion CartTotal
        $cartcount = $this->CartCount();
        //llama a la funcion total
        $total = $this->total();

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
                                          'logos',
                                          'total'
                                          ));


    }


public function contacto(){
        //llama a la funcion CartTotal
        $cartcount = $this->CartCount();
        //llama a la funcion total
        $total = $this->total();

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
                                          'logos',
                                          'total'
                                          ));


    }


}
