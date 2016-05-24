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
        
        //retorna a una vista que esta en la carpeta usuario y dentro esta create
        
        return view('admin.venta.index')
        ->with('mycart',$mycart)
        ->with('my_cart_total',$my_cart_total)
        ->with('cart',$cart)
        ->with('clientes',$clientes);
    }


    public function addproducto(){
        //me busca los productos
        $productos = producto::Paginate(8);
        //me los manda a productoadd
        return View('admin.venta.productoadd')->with('productos',$productos);
    }


    public function addtocart($id){
        $producto = producto::find($id);
        //crea una nuevo producto
        $mass_shopping_cart = new ProductosAdd;
        //almacena los datos del producto
        $mass_shopping_cart->user_id = Auth::user()->id;
        $mass_shopping_cart->pro_id = $producto->id;
        $mass_shopping_cart->cantidad = 1;
        $mass_shopping_cart->pro_descrip = $producto->pro_descrip;
        $mass_shopping_cart->pro_precio1 = $producto->pro_venta;
        //los guarda
        $mass_shopping_cart->save();

       return Redirect::to('venta');
    }


     public function checkout()
    {
        //$formid= str_random();
        //$cart_content = Cart::content(1);
        $mycart = DB::table('productos_adds')->where('user_id','=',Auth::user()->id)->get();
        
        foreach ($mycart as $mycart) {
            //crea una nueva venta
            $transaction  = new Transaction();
            //busca de prodcutosadd los productos de mi carrito
            $product = ProductosAdd::find(Auth::user()->id);
            //alamacena la venta
            $transaction->product_id  = $mycart->pro_id;
            $transaction->form_id     = Auth::user()->usu_nombre;
            $transaction->qty         = $mycart->cantidad;
            $transaction->total_price = $mycart->pro_precio1 * $mycart->cantidad;
            $transaction->status      = 'pagado';
            //guardo la venta
            $transaction->save();
  
        }   
        

         return Redirect::to('venta-cart-destroy');
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
       $productos=Producto::all();
       return view('admin.venta.productoadd',['productos'=>$productos ]);
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

        //$producto=producto::find($id);
        //$request=$producto;
        ProductosAdd::create($request->all());
        

        dd($productosadd);
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto=producto::find($id);
        dd($Producto);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $producto=producto::find($id);
        dd($Producto);
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

        //$producto=producto::find($request);
       //ProductosAdd::create($producto->all());
        
        //$productosadd=ProductosAdd::all();

       // dd($producto);
        //return Redirect::to('/transporte');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        ////destruimos los items de producto_adds
        $misproductos=DB::table('productos_adds')->where('user_id','=',Auth::user()->id)->get();
        
         foreach ($misproductos as $misproductos) {
            $misproductos=ProductosAdd::find($misproductos->id);
              $misproductos->delete();
         }
        //le manda un mensaje al usuario
        
        return Redirect::to('venta');
    }
}
