<?php

namespace Soft\Http\Controllers;


use Illuminate\Support\Facades\Request;
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


class VentaController extends Controller
{

    public function __construct()
    {
        /*si no existe mi session cart , esntonces la creo con put y creo
        un array para almacenar los items*/
        if(!\Session::has('cart')) \Session::put('cart', array());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function addproducto(){
        //me busca los productos
        $productos = producto::Paginate(8);
        //me los manda a productoadd asi los seleccioens
        return View('admin.venta.productoadd')->with('productos',$productos);
    }

    //mostrar carrito
    public function show()
    {
        /*obtengo mi variable de session que cree y la almaceno en $cart */
        $cart = \Session::get('cart');
        //llama a la funcion total
        $total = $this->total();
        return view('admin.venta.index', compact('cart','total'));
    }

    //agregar item
    public function add($id)
    {
        $itemadd  = producto::find($id);
        $cart = \Session::get('cart');
        $itemadd->quantity = 1;
        $cart[$itemadd->pro_descrip] = $itemadd;
        \Session::put('cart', $cart);

        return redirect('cart-show');
        dd($itemadd);

     }

     // Delete item
    public function delete($id)
    {
        $item  = producto::find($id);
        $cart = \Session::get('cart');
        unset($cart[$item->pro_descrip]);
        \Session::put('cart', $cart);

        return redirect('cart-show');
    }


     // Update item
    public function update($id, $quantity)
    {
        
        $item  = producto::find($id);
        $cart = \Session::get('cart');
        $cart[$item->pro_descrip]->quantity = $quantity;
        \Session::put('cart', $cart);

        return redirect('cart-show');
    }


    //limpiar carrito
     public function trash()
    {
        \Session::forget('cart');
        return redirect('cart-show');
    }


    //total del carrito
    private function total()
    {
        $cart = \Session::get('cart');
        $total = 0;
        foreach($cart as $item){
            $total += $item->pro_venta * $item->quantity;
        }
        return $total;
    }


     public function checkout()
    {
        //genero una venta que estara relacinada con los productos en las transacciones
        $venta = new Venta();
        //$venta->cliente_id  =
        $venta->user_id       = Auth::user()->usu_nombre;
        //$venta->pago_tipo   =
        //$venta->total       =
        //$venta->comentario  =
        $venta->save();

        //traigo todos los productos de la session  del usuario 
        $cart = \Session::get('cart');
        //los recorro
        foreach ($cart as $item) {
            //crea una nueva transaccion
            $transaction  = new Transaction();
            //alamacena la transaccion
            $transaction->venta_id    = $venta->id;
            $transaction->product_id  = $item->id;
            $transaction->user        = Auth::user()->usu_nombre;
            $transaction->cantidad    = $item->quantity;
            $transaction->total_price = $item->pro_venta * $item->quantity;
            $transaction->status      = 'pagado';
            //guardo la transaccion
            $transaction->save();
  
        }   
        //redirecciona para destruir el carrito de la seccion
         return Redirect::to('cart-trash');
    }



}