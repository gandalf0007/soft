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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mycart = DB::table('productos_adds')->where('user_id','=',Auth::user()->id)->get();
        $my_cart_total = DB::table('productos_adds')->where('user_id','=',Auth::user()->id)->sum('pro_precio1');
        $clientes=user::lists('usu_nombre','id');
        $cart = Cart::content();
        
        return view('admin.venta.index')
        ->with('mycart',$mycart)
        ->with('my_cart_total',$my_cart_total)
        ->with('cart',$cart)
        ->with('clientes',$clientes);
    }


    public function addproducto(){
        //me busca los productos
        $productos = producto::Paginate(8);
        //me los manda a productoadd asi los seleccioens
        return View('admin.venta.productoadd')->with('productos',$productos);
    }

    //agrega un item a mi carrito con el id que se paso
    public function addtocart($id){
        //traigo todos los productos agregados al carrito de ese usuario
        $myitemadd = DB::table('productos_adds')->where('user_id','=',Auth::user()->id)->get();
        
        //recivo y busco el id del item q deseo agregar
        $producto = producto::find($id);
        //$myitemadd = ProductosAdd::find($id);
          
        foreach ($myitemadd as $myitemadd ) {
             if ($myitemadd->pro_id !== 0 ) {
                $pro_id= $myitemadd->pro_id;
             }else{
                $pro_id=0;
                }}
         
        if ($id == $pro_id) {
            $myitemadd->cantidad = $myitemadd->cantidad +1;
            
            DB::table('productos_adds')
            //->where('user_id','=',Auth::user()->id)
            ->update(array('cantidad' => 2));
            
           
        }else{
        //crea una nuevo producto en ProductosAdd
        $mass_shopping_cart = new ProductosAdd;
        //almacena los datos del producto
        $mass_shopping_cart->user_id = Auth::user()->id;
        $mass_shopping_cart->pro_id = $producto->id;
        $mass_shopping_cart->cantidad = 1;
        $mass_shopping_cart->pro_descrip = $producto->pro_descrip;
        $mass_shopping_cart->pro_precio1 = $producto->pro_venta;
        //los guarda
        $mass_shopping_cart->save();
        }

        
       return Redirect::to('venta');
    }


     public function checkout()
    {
        //$venta_id= 0;
        //$formid= str_random();
        //$cart_content = Cart::content(1);
        //genero una venta que estara relacinada con los productos en las transacciones
        $venta = new Venta();
        //$ventagenerada->cliente_id  =
        $venta->user_id     = Auth::user()->usu_nombre;
        //$ventagenerada->pago_tipo   =
        //$ventagenerada->total       =
        //$ventagenerada->comentario  =
        $venta->save();

        //traigo todos los productos de productosAdds del usuario 
        $mycart = DB::table('productos_adds')->where('user_id','=',Auth::user()->id)->get();
        //los recorro
        foreach ($mycart as $mycart) {
            //crea una nueva transaccion
            $transaction  = new Transaction();
            //alamacena la transaccion
            $transaction->venta_id    = $venta->id;
            $transaction->product_id  = $mycart->pro_id;
            $transaction->user     = Auth::user()->usu_nombre;
            $transaction->qty         = $mycart->cantidad;
            $transaction->total_price = $mycart->pro_precio1 * $mycart->cantidad;
            $transaction->status      = 'pagado';
            //guardo la transaccion
            $transaction->save();
  
        }   
        //redirecciona para destruir lo que se almaceno en productosAdds
         return Redirect::to('venta-cart-destroy');
    }

    //borrar un item del carrito
    public function deleteitem() {
        //almacenamos el id del producto que mandamos
        $product_id = Request::get('product_id');
        //lo buscamos
        $myitem=ProductosAdd::find($product_id);
        //lo borramos
        $myitem->delete();

        return Redirect::to('venta');

        }





    public function addcart() {
        //cliente
       

        //add porducto
        $product_id = Request::get('product_id');
        $producto = producto::find($product_id);
        Cart::add(array('id' => $product_id, 'name' => $producto->pro_descrip , 'qty' => 1, 'price' => $producto->pro_venta));
    

        //increment the quantity
    if (Request::get('product_id') && (Request::get('increment')) == 1) {
        $rowId = Cart::search(array('id' => Request::get('product_id')));
        $item = Cart::get($rowId[0]);

        Cart::update($rowId[0], $item->qty + 0);
    }

        //decrease the quantity
    if (Request::get('product_id') && (Request::get('decrease')) == 1) {
        $rowId = Cart::search(array('id' => Request::get('product_id')));
        $item = Cart::get($rowId[0]);

        Cart::update($rowId[0], $item->qty - 2);
    }

        //remove the item
    if (Request::get('product_id') && (Request::get('remove')) == 'true') {
    $rowId = Cart::search(array('id' => Request::get('product_id')));
    if ($rowId[0]){
    Cart::remove($rowId[0]);}
    }


        $cart = Cart::content();
    
    return view('admin.venta.index', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
        
}



   





    public function create()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //destruimos los items de producto_adds al hacer el chekout
        $misproductos=DB::table('productos_adds')->where('user_id','=',Auth::user()->id)->get();
         foreach ($misproductos as $misproductos) {
            $misproductos=ProductosAdd::find($misproductos->id);
              $misproductos->delete();
         }
       



        
        return Redirect::to('venta');
    }
}
