<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;
use Soft\Http\Requests\UserUpdateRequest;
use Soft\Http\Requests;
use DB;
use Auth;
use Soft\Perfil;
use Soft\User;
use Alert;
use Redirect;
use Image;
use Soft\user_facturacion;
use Session;
use Soft\web_venta;
use Soft\web_transaccione;

class WebAccount extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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


    public function MyAccount()
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

        //para usuario
        $perfils  = Perfil::lists('descripcion', 'id');
        $user = Auth::user();
       
        return view('shop.myaccount-perfil',compact(
            'perfils',
            'user',
            'categorias',
            'subcategorias',
            'carrucels',
            'carrucelMarcas',
            'informacions',
            'boxs',
            'logos',
            'total',
            'cartcount'));
    }

    
public function MyAccountConfig()
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

        
        //datos de facturacion
        $datosfacturacions =  DB::table('user_facturacions')->where( 'user_id', '=',Auth::user()->id)->first();
     
        return view('shop.myaccount-config',compact('datosfacturacions',
            'categorias',
            'subcategorias',
            'carrucels',
            'carrucelMarcas',
            'informacions',
            'boxs',
            'logos',
            'total',
            'cartcount'));
    }


    public function update(UserUpdateRequest $request, $id)
    {

        //creamos un $user que va a hacer igual al user que encontremos con la id que recibimos 
        $user=User::find($id);
        $user->nombre = $request['nombre'];
        $user->apellido =$request['apellido'];
        if(!empty($request['password'])){
        $user->password=bcrypt($request['password']);
        }
        $user->re_password=$request['re_password'];
        $user->email =$request['email'];
        $user->direccion =$request['direccion'];
        $user->telefono =$request['telefono'];
       // $user->path =$request['path'];
        $user->save();

        //carga de imagen atraves de intervention el paquete de imagen
        if ($request->hasFile('path')) {
            $avatar =$request->file('path');
            $filename=time() . '.' . $avatar->getClientOriginalExtension();
            image::make($avatar)->resize(300, 300)->save( public_path('/storage/user/' . $filename));

            $user=User::find($id);
            $user->path = $filename;
            $user->save();
        }
        //le manda un mensaje al usuario
       Session::flash('message','Usuario Modificados con exito'); 
       return Redirect::to('/myaccount-perfil');

    }


    public function DatosDeFacturacion(request $request)
    {
        if($request['empresa'] == null){
            $empresa=0;
        }else{
            $empresa=1;
        }

         user_facturacion::create([
            'user_id' => Auth::user()->id,
            'nombre' =>$request['nombre'],
            'apellido'=>$request['apellido'],
            'cuit' =>$request['cuit'],
            'cp' =>$request['cp'],
            'direccion' =>$request['direccion'],
            'provincia' =>$request['provincia'],
            'ciudad' =>$request['ciudad'],
            'nacimiento' =>$request['nacimiento'],
            'empresa' =>$empresa,
            'telefono' =>$request['telefono'],  
            'telefono2' =>$request['telefono2'],
            ]);


        Session::flash('message','Datos Creados con exito'); 
       return Redirect::to('/myaccount-config');

    }

public function DatosDeFacturacionCheckout(request $request)
    {
        if($request['empresa'] == null){
            $empresa=0;
        }else{
            $empresa=1;
        }

         user_facturacion::create([
            'user_id' => Auth::user()->id,
            'nombre' =>$request['nombre'],
            'apellido'=>$request['apellido'],
            'cuit' =>$request['cuit'],
            'cp' =>$request['cp'],
            'direccion' =>$request['direccion'],
            'provincia' =>$request['provincia'],
            'ciudad' =>$request['ciudad'],
            'nacimiento' =>$request['nacimiento'],
            'empresa' =>$empresa,
            'telefono' =>$request['telefono'],  
            'telefono2' =>$request['telefono2'],
            ]);


        Session::flash('message','Datos Creados con exito'); 
       return Redirect::to('/checkout-step-2');

    }



 public function EditarFacturacion(request $request,$id)
    {

         $facturacion=user_facturacion::find($id);
        $facturacion->nombre = $request['nombre'];
        $facturacion->apellido =$request['apellido'];
        $facturacion->cuit=$request['cuit'];
        $facturacion->cp =$request['cp'];
        $facturacion->direccion =$request['direccion'];
        if(!empty($request['provincia'])){
        $facturacion->provincia =$request['provincia'];
        }
        $facturacion->ciudad =$request['ciudad'];
        $facturacion->nacimiento =$request['nacimiento'];
        $facturacion->empresa =$request['empresa'];
        $facturacion->telefono =$request['telefono'];
        $facturacion->telefono2 =$request['telefono2'];
       // $facturacion->path =$request['path'];
        $facturacion->save();

       
       Session::flash('message','Datos Modificados con exito'); 
       return Redirect::to('/myaccount-config');

    }

     public function EditarFacturacionCheckout(request $request,$id)
    {

         $facturacion=user_facturacion::find($id);
        $facturacion->nombre = $request['nombre'];
        $facturacion->apellido =$request['apellido'];
        $facturacion->cuit=$request['cuit'];
        $facturacion->cp =$request['cp'];
        $facturacion->direccion =$request['direccion'];
        if(!empty($request['provincia'])){
        $facturacion->provincia =$request['provincia'];
        }
        $facturacion->ciudad =$request['ciudad'];
        $facturacion->nacimiento =$request['nacimiento'];
        $facturacion->empresa =$request['empresa'];
        $facturacion->telefono =$request['telefono'];
        $facturacion->telefono2 =$request['telefono2'];
       // $facturacion->path =$request['path'];
        $facturacion->save();

       
       Session::flash('message','Datos Modificados con exito'); 
       return Redirect::to('/checkout-step-2');

    }



 /*---------------------------------Listar Facturas--------------------------------------*/
    public function verFacturas(request $request){

        $ventas= web_venta::orderBy('created_at','des')->where('user_id','=',Auth::user()->id);
         $transactions = web_transaccione::all();

         /*buscador*/
        $fechai=$request->input('fecha_inicio');
        $fechaf=$request->input('fecha_final');
        if (!empty($fechai) and !empty($fechaf)) {
            //entonces me busque de usu_nombre a el nombre que le pasamos atraves de $usu_nombre
            $ventas = web_venta::where('created_at', '>=' , $fechai)->where('created_at', '<=', $fechaf)->paginate(50);
        }
        /*buscador*/

        //listar Facturas
        $ventas=$ventas->paginate(50);
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

        
     
        return view('shop.myaccount-facturas',compact(
            'categorias',
            'subcategorias',
            'carrucels',
            'carrucelMarcas',
            'informacions',
            'boxs',
            'logos',
            'total',
            'cartcount',
            'ventas',
            'transactions'));



       
    }


public function detalleVentaPdf($tipo,$id){
        $vistaurl="shop.myaccount-pdf";
        $ventas= web_venta::find($id);
        //$ventas=web_venta::where('user_id','=',Auth::user()->id);
        $datosfacturacions=user_facturacion::where('user_id','=',$ventas->user_id)->first();
        $transactions = web_transaccione::all();

       
     return $this->crearPDF($ventas, $transactions ,$datosfacturacions, $vistaurl,$tipo,$id);
     
    }

    public function crearPDF($ventas, $transactions ,$datosfacturacions, $vistaurl,$tipo ,$id){
        $datosfacturacions = $datosfacturacions;

        $ventas = $ventas;
        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('ventas', 'date', 'transactions','datosfacturacions' ,'id'))->render();
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



}
