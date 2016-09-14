<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use Soft\Http\Requests;
use Soft\User;
use Soft\Producto;
use Soft\ProductosAdd;
use Redirect;
use Auth;
use DB;
use Cart;
use Soft\Transaction;
use Soft\Venta;
use Soft\Cliente;
use Soft\Presupuesto;
use Soft\Presupuestos_detalle;
use Alert;


class PresupuestoController extends Controller
{

    public function __construct()
    {
        /*si no existe mi session cart , esntonces la creo con put y creo
        un array para almacenar los items*/
        if(!\Session::has('presupuesto')) \Session::put('presupuesto', array());
        //para cliente ya no es un array ya que almaceno 1 solo objeto
        if(!\Session::has('cliente_presu')) \Session::put('cliente_presu');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
/*---------------------------------carrito--------------------------------------*/
    public function addproducto(){
        //me busca los productos
        $productos = producto::Paginate(8);
        //me los manda a productoadd asi los seleccioens
        return View('admin.venta.presupuesto.productoadd')->with('productos',$productos);
    }

    //mostrar carrito
    public function show()
    {

        /*obtengo mi variable de session cart que cree y la almaceno en $cart */
        $cart = \Session::get('presupuesto');
        /*obtengo mi variable de session cliente que cree y la almaceno en $cart */
        $cliente = \Session::get('cliente_presu');
        //llama a la funcion total
        $total = $this->total();
        return view('admin.venta.presupuesto.presupuesto', compact('cart','total','cliente'));
    }

    //agregar item
    public function add($id)
    {
        $itemadd  = producto::find($id);
        $cart = \Session::get('presupuesto');
        $itemadd->quantity = 1;
        $cart[$itemadd->pro_descrip] = $itemadd;
        \Session::put('presupuesto', $cart);
        return redirect('presupuesto-show');

     }

     // Delete item y client
    public function delete($id)
    {
        $item  = producto::find($id);
        $cart = \Session::get('presupuesto');
        unset($cart[$item->pro_descrip]);
        \Session::put('presupuesto', $cart);

        return redirect('presupuesto-show');
    }


     // Update item
    public function update($id, $quantity)
    {
        
        $item  = producto::find($id);
        $cart = \Session::get('presupuesto');
        $cart[$item->pro_descrip]->quantity = $quantity;
        \Session::put('presupuesto', $cart);

        return redirect('presupuesto-show');
    }


    //limpiar carrito y cliente
     public function trash()
    {
        \Session::forget('presupuesto');
        \Session::forget('cliente_presu');
        return redirect('presupuesto-show');
    }


    //total del carrito
    private function total()
    {
        $cart = \Session::get('presupuesto');
        $total = 0;
        foreach($cart as $item){
            $total += $item->pro_venta * $item->quantity;
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
        $cliente = \Session::get('cliente_presu');
        //genero una venta que estara relacinada con los productos en las transacciones
        $presupuesto = new presupuesto();
        $presupuesto->cliente_id    = $cliente->id;
        $presupuesto->user_id       = Auth::user()->id;
        $presupuesto->pago_tipo     = $Request['tipo_pago'];
        $presupuesto->total         = $total;
        //$venta->comentario  =
        $presupuesto->status = $tipo_pago;
        $presupuesto->save();

        //traigo todos los productos de la session  del usuario 
        $cart = \Session::get('presupuesto');
        //los recorro
        foreach ($cart as $item) {
            //crea una nueva transaccion
            $transaction  = new presupuestos_detalle();
            //alamacena la transaccion
            $transaction->presupuesto_id    = $presupuesto->id;
            $transaction->producto_id  = $item->id;
            $transaction->user        = Auth::user()->usu_nombre;
            $transaction->cantidad    = $item->quantity;
            $transaction->total_price = $item->pro_venta * $item->quantity;
            //guardo la transaccion
            $transaction->save();

           /* //descontar stock en la tabla producto
            $producto = producto::find($item->id);
            $producto->pro_stock_act = $producto->pro_stock_act - $item->quantity;
            $producto->save();*/
        }   

        //redirecciona para destruir el carrito de la seccion
         return Redirect::to('presupuesto-trash');
    }
/*---------------------------------carrito--------------------------------------*/



 /*---------------------------------Listar Ventas--------------------------------------*/
    public function listarVenta(){
        $ventas = venta::all();
         $ventas= venta::Paginate();
         $transactions = transaction::all();


        return view('admin.venta.listar.index')
        ->with('ventas',$ventas)
         ->with('transactions',$transactions);
     
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
        $clientes = cliente::orderBy('clie_nombres');

        /*------------buscador-----------*/
        //lo que ingresamos en el buscador lo alamacenamos en $usu_nombre
        $clie_nombre=$request->input('clie_nombres');
        //preguntamos que si ($usu_nombre no es vacio
        if (!empty($clie_nombre)) {
            //entonces me busque de usu_nombre a el nombre que le pasamos atraves de $usu_nombre
            $clientes->where('clie_nombres','LIKE','%'.$clie_nombre.'%');
        }
         $clientes=$clientes->paginate(10);
         /*------------buscador-----------*/


        //me los manda a productoadd asi los seleccioens
        return View('admin.venta.presupuesto.clienteadd')->with('clientes',$clientes);

     }

 public function addCliente($id)
    {
        $clienteadd  = cliente::find($id);
        $cliente = \Session::get('cliente_presu');
        $cliente = $clienteadd;
        \Session::put('cliente_presu', $cliente);
         return redirect('presupuesto-show');
     }


/*---------------------------------cliente--------------------------------------*/




/*---------------------------------vendedor--------------------------------------*/
/*---------------------------------vendedor--------------------------------------*/


}
