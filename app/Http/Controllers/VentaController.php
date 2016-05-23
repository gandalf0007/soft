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
        $clientes=user::lists('usu_nombre','id');
        $users=user::all();
        //retorna a una vista que esta en la carpeta usuario y dentro esta create
        
        return view('admin.venta.index')
        ->with('mycart',$mycart)
        ->with('clientes',$clientes)
        ->with('users',$users);
    }


    public function addproducto(){
        $productos = producto::Paginate(8);

        return View('admin.venta.productoadd')->with('productos',$productos);
    }


    public function addtocart($id){
        $produto = producto::find($id);

        $mass_shopping_cart = new ProductosAdd;

        $mass_shopping_cart->user_id = Auth::user()->id;
        $mass_shopping_cart->pro_id = $produto->id;
        $mass_shopping_cart->cantidad = 1;
        $mass_shopping_cart->pro_descrip = $produto->pro_descrip;
        //$mass_shopping_cart->pro_precio1 = $produto->pro_precio1;
        
        $mass_shopping_cart->save();
        
        return Redirect::to('venta');
    }


    public function showMyCart(){
        $mycart = DB::table('productos_adds')->where('user_id','=',Auth::user()->id)->where('status','=','')->get();
        $for_delivery = DB::table('mass_shopping_cart')->where('user_id','=',Auth::user()->id)->where('status','=','For Delivery')->get();
        $my_cart_total = DB::table('mass_shopping_cart')->where('user_id','=',Auth::user()->id)->where('status','=','')->sum('item_price');

        // $my_cart = MassShoppingCart::where('user_id','=',Auth::user()->id)->get();
        // $for_delivery = MassShoppingCart::where('status','=','For Delivery')->get();

        //return $my_cart->user_id;
       
        return View('admin.venta.index')
                ->with('mycart',$my_cart);
        //return View::make('my_cart')->with('my_cart',$my_cart)->with('for_delivery',$for_delivery)->with('my_cart_total',$my_cart_total);
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
    public function destroy($id)
    {
        //
    }
}
