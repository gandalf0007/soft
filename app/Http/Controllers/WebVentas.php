<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Http\Requests;
use Soft\Producto;
use Session;
use Soft\web_venta;
use DB;
use Redirect;
use Alert;
use Auth;
use Soft\user_facturacion;
use Soft\web_transaccione;
use Soft\web_mercadopago;


class WebVentas extends Controller
{

    public function __construct()
    {
        /*si no existe mi session cart , esntonces la creo con put y creo
        un array para almacenar los items*/
        if(!\Session::has('cartweb')) \Session::put('cartweb', array());
        //para cliente ya no es un array ya que almaceno 1 solo objeto
        if(!\Session::has('cliente')) \Session::put('cliente');
    }

    public function CartCount(){
        /*obtengo mi variable de session cart que cree y la almaceno en $cart */
        $cart = \Session::get('cartweb');
        //cuenta los item que hay en la session
        $cartcount =  count($cart);

        return $cartcount;
    }

   
    public function show()
    {
        
        /*obtengo mi variable de session cart que cree y la almaceno en $cart */
        $cart = \Session::get('cartweb');
        //llama a la funcion CartTotal
        $cartcount = $this->CartCount();
        /*obtengo mi variable de session cliente que cree y la almaceno en $cart */
        $cliente = \Session::get('cliente');
        //llama a la funcion total
        $total = $this->total();

        $subcategorias = DB::table('categoriasubs')->orderBy('nombre', 'asc')->get();
         $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();
        $carrucels =  DB::table('web_carrucels')->orderBy('imagen', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();

         
        return view('shop.cart', compact('cartcount','cart','total','cliente', 
                                          'categorias',
                                          'subcategorias',
                                          'carrucels',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos'
                                          ));
    }

    //agregar item
    public function add($id)
    {
        $itemadd  = producto::find($id);
        $cart = \Session::get('cartweb');
        $itemadd->quantity = 1;
        $cart[$itemadd->descripcion] = $itemadd;
        \Session::put('cartweb', $cart);
       
        return Redirect::back();

     }

     // Delete item y client
    public function delete($id)
    {
        $item  = producto::find($id);
        $cart = \Session::get('cartweb');
        unset($cart[$item->descripcion]);
        \Session::put('cartweb', $cart);
        return Redirect::back();
    }


     // Update item
    public function update($id, $quantity)
    {
        
        $item  = producto::find($id);
        $cart = \Session::get('cartweb');
        $cart[$item->descripcion]->quantity = $quantity;
        \Session::put('cartweb', $cart);

        return Redirect::to('web-shopping-cart');
       
    }


    //limpiar carrito y cliente
     public function trash()
    {
        \Session::forget('cartweb');
        \Session::forget('cliente');
        
        return Redirect::back();
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




 public function CheckoutStep1()
    { 
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



        if (!Auth::guest()){
            return Redirect::to('checkout-step-2');
        }else{
            return view('shop.checkout', compact('categorias',
                                                  'subcategorias',
                                                  'carrucels',
                                                  'carrucelMarcas',
                                                  'informacions',
                                                  'boxs',
                                                  'logos',
                                                  'total',
                                                  'cartcount'));
        }
        
    }




    public function CheckoutStep2()
    {
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


        $datosfacturacions =  DB::table('user_facturacions')->where( 'user_id', '=',Auth::user()->id)->first();


        return view('shop.checkout-step2', compact(
                                          'datosfacturacions',
                                          'categorias',
                                          'subcategorias',
                                          'carrucels',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos',
                                          'total',
                                          'cartcount'
                                          ));
    }


    public function CheckoutStep3()
    {
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

        return view('shop.checkout-step3', compact(
                                          'categorias',
                                          'subcategorias',
                                          'carrucels',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos',
                                          'total',
                                          'cartcount'
                                          ));
    }


    public function CheckoutStep4(request $request)
    { 
      //llama a la funcion CartTotal
        $cartcount = $this->CartCount();
      //llama a la funcion total
        $total = $this->total();


      //guardamos el transporte elejido en el paso anterior
      if ($request['transporte'] == 1) {
      $transporte="retiro en nuestro local";
      }
      if ($request['transporte'] == 2) {
      $transporte="Envio a domicilio por oca";
      }
      if ($request['transporte'] == 3) {
      $transporte="Envio Express";
      }

     

        $subcategorias = DB::table('categoriasubs')->orderBy('nombre', 'asc')->get();
         $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();
        $carrucels =  DB::table('web_carrucels')->orderBy('imagen', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();

        return view('shop.checkout-step4', compact(
                                          'categorias',
                                          'subcategorias',
                                          'carrucels',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos',

                                          'transporte',
                                          'total',
                                          'cartcount'
                                          ));
    }

    public function CheckoutStep5(request $request)
    { 
      //mercadopago
       $mercadopago=web_mercadopago::first();
      
      //usuario
       $user= Auth::user();

      //datos de facturacion
      $facturacion =  DB::table('user_facturacions')->where( 'user_id', '=',Auth::user()->id)->first();
      
      //le mandamos los items del carrito
      $carts = \Session::get('cartweb');

      //llama a la funcion CartTotal
        $cartcount = $this->CartCount();
      //llama a la funcion total
        $total = $this->total();

      //transporte
       $transporte = $request['transporte'];

       //guardamos el metodo de pago del paso anterior
      if ($request['pago'] == 1) {
      $TipoPago="Mercadopago";
      }
      if ($request['pago'] == 2) {
      $TipoPago="Desposito bancario";
      }
     

     

        $subcategorias = DB::table('categoriasubs')->orderBy('nombre', 'asc')->get();
        $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();
        $carrucels =  DB::table('web_carrucels')->orderBy('imagen', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();

        return view('shop.checkout-step5', compact(
                                          'categorias',
                                          'subcategorias',
                                          'carrucels',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos',

                                          'transporte',
                                          'TipoPago',
                                          'total',
                                          'cartcount',
                                          'carts',
                                          'user',
                                          'facturacion',
                                          'mercadopago'
                                          ));
    }


public function CheckoutStep6(request $request)
    { 
      //llama a la funcion CartTotal
        $cartcount = $this->CartCount();
      //llama a la funcion total
        $total = $this->total();
        $totalaux = $total;

       //transporte
       $transporte = $request['transporte'];

       //tipo de pago
       $TipoPago= $request['TipoPago'];

        
    
        //genero una venta que estara relacinada con los productos en las transacciones
        $venta = new web_Venta();
        $venta->user_id       = Auth::user()->id;
        $venta->usuario         = Auth::user()->nombre;
        $venta->pago_tipo     = $TipoPago;
        $venta->transporte    = $transporte;
        $venta->total         = $total;
        //$venta->comentario  =
        $venta->status = "pendiente";
        $venta->save();

        //traigo todos los productos de la session  del usuario 
        $cart = \Session::get('cartweb');
        //los recorro
        foreach ($cart as $item) {
            //crea una nueva transaccion
            $transaction  = new web_transaccione();
            //alamacena la transaccion
            $transaction->web_venta_id    = $venta->id;
            $transaction->producto_id  = $item->id;
            $transaction->user        = Auth::user()->nombre;
            $transaction->cantidad    = $item->quantity;
            $transaction->total_price = $item->precioventa * $item->quantity;
            //guardo la transaccion
            $transaction->save();

            //descontar stock en la tabla producto
            $producto = producto::find($item->id);
            $producto->stockactual = $producto->stockactual - $item->quantity;
            $producto->save();
        }   

        //limpiamos el carrito
        \Session::forget('cartweb');
       

        $subcategorias = DB::table('categoriasubs')->orderBy('nombre', 'asc')->get();
        $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->get();
        $carrucels =  DB::table('web_carrucels')->orderBy('imagen', 'asc')->get();
        $carrucelMarcas =  DB::table('web_marcas')->orderBy('imagen', 'asc')->get();
        $informacions =  DB::table('web_informacions')->orderBy('direccion1', 'asc')->get();
        $boxs =  DB::table('web_facebooks')->orderBy('box', 'asc')->get();
        $logos =  DB::table('web_logos')->orderBy('logo', 'asc')->get();

        return view('shop.checkout-step6', compact(
                                          'categorias',
                                          'subcategorias',
                                          'carrucels',
                                          'carrucelMarcas',
                                          'informacions',
                                          'boxs',
                                          'logos',     
                                          'totalaux',
                                          'total',
                                          'cartcount'
                                          ));
    }





/*---------------------------------carrito--------------------------------------*/





}