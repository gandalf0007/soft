<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

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
use Soft\provedore;

class CompraController extends Controller
{
    public function __construct()
    {
        /*si no existe mi session compracart , esntonces la creo con put y creo
        un array para almacenar los items*/
        if(!\Session::has('compracart')) \Session::put('compracart', array());
        //para provedor ya no es un array ya que almaceno 1 solo objeto
        if(!\Session::has('provedor')) \Session::put('provedor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
/*---------------------------------carrito--------------------------------------*/
    public function addproducto(){
        //me busca los productos
        //$productos = producto::Paginate(8);
        //me los manda a productoadd asi los seleccioens
        //return View('admin.venta.productoadd')->with('productos',$productos);
    }

    //mostrar carrito
    public function show()
    {
        //carga los productos en el modal
        $productos = producto::Paginate(8);
        /*obtengo mi variable de session compracart que cree y la almaceno en $compracart */
        $compracart = \Session::get('compracart');
        /*obtengo mi variable de session provedor que cree y la almaceno en $compracart */
        $provedor = \Session::get('provedor');
        //llama a la funcion total
        $total = $this->total();
        return view('admin.compra.index', compact('compracart','total','provedor','productos'));
    }

    //agregar item
    public function add($id)
    {
        $itemadd  = producto::find($id);
        $compracart = \Session::get('compracart');
        $itemadd->quantity = 1;
        $compracart[$itemadd->descripcion] = $itemadd;
        \Session::put('compracart', $compracart);
        return redirect('compra-show');

     }

     // Delete item y client
    public function delete($id)
    {
        $item  = producto::find($id);
        $compracart = \Session::get('compracart');
        unset($compracart[$item->descripcion]);
        \Session::put('compracart', $compracart);

        return redirect('compra-show');
    }


     // Update item
    public function update($id, $quantity)
    {
       
        $item  = producto::find($id);
        $compracart = \Session::get('compracart');
        if ($quantity  <=  $item->stockactual ) {
            $compracart[$item->descripcion]->quantity = $quantity;
            \Session::put('compracart', $compracart);
            Alert::success('Mensaje existoso', 'actualizado');
            return redirect('compra-show');
        }else{

            Alert::error('Mensaje existoso', 'stock insuficiente');
            return redirect('compra-show');

        }
        
    }


    //limpiar carrito y provedor
     public function trash()
    {
        \Session::forget('compracart');
        \Session::forget('provedor');
         Alert::success('Mensaje existoso', 'Compra eliminada');
        return redirect('compra-show');
    }


    //total del carrito
    private function total()
    {
        $compracart = \Session::get('compracart');
        $total = 0;
        foreach($compracart as $item){
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
        //traigo el provedor de la session
        $provedor = \Session::get('provedor');
        //genero una venta que estara relacinada con los productos en las transacciones
        $venta = new Venta();
        $venta->provedor_id    = $provedor->id;
        $venta->user_id       = Auth::user()->id;
        $venta->pago_tipo     = $Request['tipo_pago'];
        $venta->total         = $total;
        //$venta->comentario  =
        $venta->status = $tipo_pago;
        $venta->save();

        //traigo todos los productos de la session  del usuario 
        $compracart = \Session::get('compracart');
        //los recorro
        foreach ($compracart as $item) {
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

    public function cambiarStatusWeb(Request $Request , $id){
    

        $venta=web_venta::find($id);
        $venta->status=$Request['pago'];
        $venta->save();
        return Redirect::to('/listar-venta-web');

    }

  /*  public function detalleVenta($id){
        //$items = Transaction::with('product_id')->where('venta_id','=',$request->get('venta_id'))->get();
        //return json_encode($items);
      
        $ventas = venta::all();
         $ventas= venta::Paginate();
         $transactions = transaction::all();
        //$items=venta::find($id);
        $mycompracart = DB::table('transactions')->where('venta_id','=',$id)->get();
       
        //$myitemadds = DB::table('transactions')->where('venta_id','=',$id)->get();
       return view('admin.venta.listar.index')
        ->with('ventas',$ventas)
         ->with('transactions',$transactions)
       ->with('mycompracart',$mycompracart);
    }/*
/*---------------------------------Listar Ventas--------------------------------------*/

/*---------------------------------Provedor--------------------------------------*/
public function seleccionarProvedor(request $request)
    {
         //me busca los clientes
        $provedores = provedore::orderBy('razonsocial');

        /*------------buscador-----------*/
        //lo que ingresamos en el buscador lo alamacenamos en $usu_nombre
        $provedor_nombre=$request->input('nombre');
        //preguntamos que si ($usu_nombre no es vacio
        if (!empty($provedor_nombre)) {
            //entonces me busque de usu_nombre a el nombre que le pasamos atraves de $usu_nombre
            $provedores->where('nombre','LIKE','%'.$provedor_nombre.'%');
        }
         $provedores=$provedores->paginate(10);
         /*------------buscador-----------*/


        //me los manda a productoadd asi los seleccioens
        return View('admin.compra.provedoradd')->with('provedores',$provedores);

     }

 public function addProvedor($id)
    {
        $provedoradd  = provedore::find($id);
        $provedor = \Session::get('provedor');
        $provedor = $provedoradd;
        \Session::put('provedor', $provedor);
         return redirect('compra-show');
     }


/*---------------------------------Provedor--------------------------------------*/


}
