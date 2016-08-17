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


     public function checkout(Request $Request)
    {
        $total = $this->total();

        //traigo el tipo de pago y si es efectivo que se guarde como pagado en otro caso 
        //que se guarde como pendiente
        $tipo_pago=$Request['tipo_pago'];
        if ($tipo_pago == "Efectivo") 
        {
            $tipo_pago = "pagado";
        }else{  
            $tipo_pago="pendiente";            
        }
        //traigo el cliente de la session
        $cliente = \Session::get('cliente');
        //genero una venta que estara relacinada con los productos en las transacciones
        $venta = new Venta();
        $venta->cliente_id    = $cliente->id;
        $venta->user_id       = Auth::user()->id;
        $venta->pago_tipo     = $Request['tipo_pago'];
        $venta->total         = $total;
        //$venta->comentario  =
        $venta->status = $tipo_pago;
        $venta->save();

        //traigo todos los productos de la session  del usuario 
        $cart = \Session::get('cart');
        //los recorro
        foreach ($cart as $item) {
            //crea una nueva transaccion
            $transaction  = new Transaction();
            //alamacena la transaccion
            $transaction->venta_id    = $venta->id;
            $transaction->producto_id  = $item->id;
            $transaction->user        = Auth::user()->nombre;
            $transaction->cantidad    = $item->quantity;
            $transaction->total_price = $item->pro_venta * $item->quantity;
            //guardo la transaccion
            $transaction->save();

            //descontar stock en la tabla producto
            $producto = producto::find($item->id);
            $producto->stockactual = $producto->stockactual - $item->quantity;
            $producto->save();
        }   

       
        //redirecciona para destruir el carrito de la seccion
         return Redirect::to('venta-trash');
    }



 public function CheckoutStep1()
    {
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
            return view('shop.checkout', compact('categorias','subcategorias','carrucels','carrucelMarcas','informacions','boxs','logos'));
        }
        
    }




    public function CheckoutStep2()
    {
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
                                          'logos'
                                          ));
    }


    public function CheckoutStep3()
    {

      
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
                                          'logos'
                                          ));
    }


    public function CheckoutStep4(request $request)
    {
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
                                          'transporte'
                                          ));
    }

    public function CheckoutStep5(request $request)
    {
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
                                          'logos'
                                          ));
    }






/*---------------------------------carrito--------------------------------------*/



 /*---------------------------------Listar Ventas--------------------------------------*/
    public function listarVenta(request $request){


         $ventas=venta::orderBy('id')->paginate(50);
         $transactions = transaction::all();

         /*buscador*/
        $fechai=$request->input('fecha_inicio');
        $fechaf=$request->input('fecha_final');
        if (!empty($fechai) and !empty($fechaf)) {
            //entonces me busque de usu_nombre a el nombre que le pasamos atraves de $usu_nombre
            $ventas = venta::where('created_at', '>=' , $fechai)->where('created_at', '<=', $fechaf)->paginate(50);
        }
        /*buscador*/

        return view('admin.venta.listar.index',compact('ventas','transactions'));
    }


public function detalleVentaPdf($tipo,$id){
        $vistaurl="admin.venta.venta-detalle-pdf";
        $ventas=venta::all();
        $transactions = transaction::all();
        
     return $this->crearPDF($ventas, $transactions , $vistaurl,$tipo,$id);
     
    }

    public function crearPDF($ventas, $transactions , $vistaurl,$tipo ,$id){
        $data = $ventas;
        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('data', 'date', 'transactions','id'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){return $pdf->download('reporte.pdf'); }
     
    }

    public function cambiarStatus(Request $Request , $id){
    

        $venta=venta::find($id);
        $venta->status=$Request['pago'];
        $venta->save();
        return Redirect::to('/listar-venta');

    }

  /*  public function detalleVenta($id){
        //$items = Transaction::with('product_id')->where('venta_id','=',$request->get('venta_id'))->get();
        //return json_encode($items);
      
        $ventas = venta::all();
         $ventas= venta::Paginate();
         $transactions = transaction::all();
        //$items=venta::find($id);
        $mycart = DB::table('transactions')->where('venta_id','=',$id)->get();
       
        //$myitemadds = DB::table('transactions')->where('venta_id','=',$id)->get();
       return view('admin.venta.listar.index')
        ->with('ventas',$ventas)
         ->with('transactions',$transactions)
       ->with('mycart',$mycart);
    }/*
/*---------------------------------Listar Ventas--------------------------------------*/






/*---------------------------------cliente--------------------------------------*/
public function seleccionarCliente(request $request)
    {
         //me busca los clientes
        $clientes = cliente::orderBy('nombre');

        /*------------buscador-----------*/
        //lo que ingresamos en el buscador lo alamacenamos en $usu_nombre
        $clie_nombre=$request->input('nombre');
        //preguntamos que si ($usu_nombre no es vacio
        if (!empty($clie_nombre)) {
            //entonces me busque de usu_nombre a el nombre que le pasamos atraves de $usu_nombre
            $clientes->where('nombre','LIKE','%'.$clie_nombre.'%');
        }
         $clientes=$clientes->paginate(10);
         /*------------buscador-----------*/


        //me los manda a productoadd asi los seleccioens
        return View('admin.venta.clienteadd')->with('clientes',$clientes);

     }

 public function addCliente($id)
    {
        $clienteadd  = cliente::find($id);
        $cliente = \Session::get('cliente');
        $cliente = $clienteadd;
        \Session::put('cliente', $cliente);
         return redirect('venta-show');
     }


/*---------------------------------cliente--------------------------------------*/




/*---------------------------------vendedor--------------------------------------*/
/*---------------------------------vendedor--------------------------------------*/


}