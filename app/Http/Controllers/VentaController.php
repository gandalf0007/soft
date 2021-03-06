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
use Alert;
use Soft\web_venta;
use Soft\web_transaccione;
use Soft\Punto;

class VentaController extends Controller
{

    public function __construct()
    {
        /*si no existe mi session cart , esntonces la creo con put y creo
        un array para almacenar los items*/
        if(!\Session::has('cart')) \Session::put('cart', array());
        //para cliente ya no es un array ya que almaceno 1 solo objeto
        if(!\Session::has('cliente')) \Session::put('cliente');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
/*---------------------------------carrito--------------------------------------*/
    public function addproducto(Request $request){
        //me busca los productos
        $productos = producto::orderBy('created_at','des');

        //busqueda por descripccion
        $descripcion=$request->input('descripcion');
     
        if (!empty($descripcion)) { 
            $productos->where('descripcion','LIKE','%'.$descripcion.'%');
        }
        //busqueda por codigo
        $codigo=$request->input('codigo');
        if (!empty($codigo)) {
            $productos->where('codigo','LIKE','%'.$codigo.'%');
        }

        $productos = $productos->Paginate(10);

        //me los manda a productoadd asi los seleccioens
        return View('admin.venta.productoadd',compact('productos'));
    }

    //mostrar carrito
    public function show()
    {
        //carga los productos en el modal
        $productos = producto::orderBy('created_at','des')->Paginate(40);
        /*obtengo mi variable de session cart que cree y la almaceno en $cart */
        $cart = \Session::get('cart');
        /*obtengo mi variable de session cliente que cree y la almaceno en $cart */
        $cliente = \Session::get('cliente');
        //llama a la funcion total
        $total = $this->total();
        return view('admin.venta.index', compact('cart','total','cliente','productos'));
    }

    //agregar item
    public function add($id)
    {
        $itemadd  = producto::find($id);
        $cart = \Session::get('cart');
        $itemadd->quantity = 1;
        $cart[$itemadd->descripcion] = $itemadd;
        \Session::put('cart', $cart);
        return redirect('venta-show');

     }

     // Delete item y client
    public function delete($id)
    {
        $item  = producto::find($id);
        $cart = \Session::get('cart');
        unset($cart[$item->descripcion]);
        \Session::put('cart', $cart);

        return redirect('venta-show');
    }


     // Update item
    public function update($id, $quantity)
    {
        
        $item  = producto::find($id);
        $cart = \Session::get('cart');
        
        //si se actualisa con un stock superior al stockactual que tire error
        if ($quantity  <=  $item->stockactual ) {
            $cart[$item->descripcion]->quantity = $quantity;
            \Session::put('cart', $cart);
            Alert::success('Mensaje existoso', 'actualizado');
            return redirect('venta-show');
        }else{

            Alert::error('ERROR', 'stock insuficiente');
            return redirect('venta-show');

        }
    }


    //limpiar carrito y cliente
     public function trash()
    {
        \Session::forget('cart');
        \Session::forget('cliente');
         Alert::success('Mensaje existoso', 'Venta Vaciada');
        return redirect('venta-show');
    }


    //total del carrito
    private function total()
    {
        $cart = \Session::get('cart');
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
/*---------------------------------carrito--------------------------------------*/



 /*---------------------------------Listar Ventas--------------------------------------*/
    public function listarVenta(request $request){


         $ventas=venta::orderBy('created_at','des')->paginate(50);
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

    public function listarVentaWeb(request $request){


         $ventas= web_venta::orderBy('created_at','des');
         $transactions = web_transaccione::all();

         /*buscador*/
        $fechai=$request->input('fecha_inicio');
        $fechaf=$request->input('fecha_final');
        if (!empty($fechai) and !empty($fechaf)) {
            //entonces me busque de usu_nombre a el nombre que le pasamos atraves de $usu_nombre
            $ventas = web_venta::where('created_at', '>=' , $fechai)->where('created_at', '<=', $fechaf)->paginate(50);
        }

        $user=$request->input('user');
        if (!empty($user)) {
                $ventas = web_venta::where('usuario','LIKE','%'.$user.'%');
        }
        /*buscador*/
        

        $ventas= $ventas->paginate(50);
        //llama a la funcion total
        $total = $this->total();
     
        return view('admin.venta.listar.ventas-web',compact(
            'total',
            'ventas',
            'transactions')); 
        }


public function detalleVentaPdf($tipo,$id){
        $vistaurl="admin.venta.venta-detalle-pdf";
        $ventas=venta::all();
        $transactions = transaction::all();
         $logo = DB::table('web_logos')->first();
     return $this->crearPDF($logo,$ventas, $transactions , $vistaurl,$tipo,$id);
     
    }

    public function crearPDF($logo,$ventas, $transactions , $vistaurl,$tipo ,$id){
        
        $data = $ventas;
        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('data','logo', 'date', 'transactions','id'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){return $pdf->download('reporte.pdf'); }
     
    }

    public function cambiarStatus(Request $Request , $id){
    $transactions = Transaction::where('venta_id','=',$id)->get();
        $venta=venta::find($id);
         if($Request['pago'] == "cancelado" and $venta->status != "cancelado"){
           
         foreach ($transactions as $transaction) {
           //volve  stock en la tabla producto
            $producto = producto::find($transaction->producto_id);
            $producto->stockactual = $producto->stockactual + $transaction->cantidad;
            $producto->save(); 
            //cambiamos el estado de la venta
            $venta->status=$Request['pago'];
            $venta->save();}
        }else{
            $venta->status=$Request['pago'];
            $venta->save();
        }

        return Redirect::to('/listar-venta');

    }

    public function cambiarStatusWeb(Request $Request , $id){
    
        $transactions = web_transaccione::where('web_venta_id','=',$id)->get();
        $venta=web_venta::find($id);
        $user=User::find($venta->user_id);
        $punto = Punto::first();

        if($Request['pago'] == "cancelado" and $venta->status != "cancelado"){
           
         foreach ($transactions as $transaction) {
           //volve  stock en la tabla producto
            $producto = producto::find($transaction->producto_id);
            $producto->stockactual = $producto->stockactual + $transaction->cantidad;
            $producto->save(); 
            //cambiamos el estado de la venta
            $venta->status=$Request['pago'];
            $venta->save();}

            //descontar puntos
            $user->puntos= $user->puntos-(($punto->porcentaje*$venta->total)/100);
            $user->save();
        }else{
            $venta->status=$Request['pago'];
            $venta->save();
            //cargamos los puntos al usuario
            $user->puntos= (($punto->porcentaje*$venta->total)/100);
            $user->save();
        }

         return Redirect::to('/listar-venta-web');
    }

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