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


class LiquidacionController extends Controller
{

     public function __construct()
    {
        /*si no existe mi session cart , esntonces la creo con put y creo
        un array para almacenar los items*/
        if(!\Session::has('cart')) \Session::put('cart', array());
        //para cliente ya no es un array ya que almaceno 1 solo objeto
        if(!\Session::has('user')) \Session::put('user');
    }


   

   //mostrar carrito
    public function show()
    {
        
        /*obtengo mi variable de session cliente que cree y la almaceno en $cart */
        $user = \Session::get('user');
        //llama a la funcion total
       
        return view('admin.liquidacion.index', compact('user'));
    }

    //generar liquidacion
    public function generar(Request $request)
    {
        
        /*obtengo mi variable de session cliente que cree y la almaceno en $cart */
        $user = \Session::get('user');
        //llama a la funcion total 
        if ($request['jornada'] == "completa") {
            $basicoJornada = $request['basico'];
        }
        if ($request['jornada'] == "media") {
           $basicoJornada = $request['basico']*(1/2);
        }

        $antiguedad = $request['antiguedadaños'] * $basicoJornada * 0.01;

        $presentimos = ($basicoJornada + $antiguedad)/12;

        $bruto = $basicoJornada + $antiguedad + $presentimos;

        if ($request['feriadosmes'] != 0) {
        $feriados = $bruto/(30*$request['feriadosmes']);
         }else{
            $feriados = 0;
            }

        if ($request['feriadonotrabajado'] != 0) {
        $feNoTrabajados= $bruto/(25*$request['feriadonotrabajado']);
         }else{
            $feNoTrabajados= 0;
            }

        if ($request['feriadotrabajado'] != 0) {
           $feTrabajados = ($bruto/(30*$request['feriadosmes']*$request['feriadotrabajado'])) + ($bruto/(25*$request['feriadotrabajado']));
        }else{
            $feTrabajados = 0;
        }
        

        $subtotal = $bruto - $feriados + $feNoTrabajados + $feTrabajados ;

        $jubilacion = 0.11 * $subtotal;


        
        if ($request['jornada'] == "completa") {
           $obrasocial = 0.03 * $subtotal;
        }
        if ($request['jornada'] == "media") {
           $obrasocial = 2 * 0.03 * $subtotal;
        }

        $ley19032 = $subtotal * 0.03;
        $sec = $subtotal * 0.02;
        $faecys = $subtotal * 0.005;

        $totalDescuentos = $jubilacion + $obrasocial + $ley19032 + $sec + $faecys ;

        $totalNeto =  $subtotal - $totalDescuentos;

        
        return view('admin.liquidacion.generar', compact('user',
                                                    'totalNeto',
                                                    'totalDescuentos',
                                                    'faecys',
                                                    'sec',
                                                    'ley19032',
                                                    'obrasocial',
                                                    'jubilacion',
                                                    'subtotal',
                                                    'feTrabajados',
                                                    'feNoTrabajados',
                                                    'feriados',
                                                    'bruto',
                                                    'presentimos',
                                                    'antiguedad',
                                                    'basicoJornada'));
    }



/*---------------------------------Usuario--------------------------------------*/
public function seleccionarUsuario(request $request)
    {
         //me busca los clientes
        $users = user::orderBy('nombre');

        /*------------buscador-----------*/
        //lo que ingresamos en el buscador lo alamacenamos en $usu_nombre
        $user_nombre=$request->input('nombre');
        //preguntamos que si ($usu_nombre no es vacio
        if (!empty($user_nombre)) {
            //entonces me busque de usu_nombre a el nombre que le pasamos atraves de $usu_nombre
            $users->where('nombre','LIKE','%'.$user_nombre.'%');
        }
         $users=$users->paginate(10);
         /*------------buscador-----------*/


        //me los manda a productoadd asi los seleccioens
        return View('admin.liquidacion.usuarioadd')->with('users',$users);

     }

 public function addUsuario($id)
    {
        $useradd  = user::find($id);
        $user = \Session::get('user');
        $user = $useradd;
        \Session::put('user', $user);
         return redirect('liquidacion-show');
     }


/*---------------------------------Usuario--------------------------------------*/
}
