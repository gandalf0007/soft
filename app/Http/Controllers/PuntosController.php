<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Http\Requests;
use Soft\Punto;
use Soft\User;

use Alert;
use Session;
use Redirect;
use Storage;
use DB;
use Image;
class PuntosController extends Controller
{


    public function __construct()
    {
        /*si no existe mi session cart , esntonces la creo con put y creo
        un array para almacenar los items*/
        //if(!\Session::has('cart')) \Session::put('cart', array());
        //para cliente ya no es un array ya que almaceno 1 solo objeto
        if(!\Session::has('usuario')) \Session::put('usuario');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $user = \Session::get('usuario');
        $puntos = punto::all();
        return view('admin.puntos.index',compact('puntos','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //retorna a una vista que esta en la carpeta usuario y dentro esta create
        return view('admin.puntos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        punto::create($request->all());

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Porcentaje Creado');
       return Redirect::to('/puntos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $punto= punto::find($id);
        $punto->fill($request->all());
        $punto->save();

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'porcentaje Modificado');
       return Redirect::to('/puntos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $punto=punto::find($id);
        $punto->delete();
        
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'porcentaje Eliminado');
        return Redirect::to('/puntos');
    }



    /*---------------------------------cliente--------------------------------------*/
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
        return View('admin.puntos.useradd',compact('users'));

     }

 public function addUsuario($id)
    {
        $useradd  = user::find($id);
        $user = \Session::get('usuario');
        $user = $useradd;
        \Session::put('usuario', $user);
         return redirect('/puntos');
     }


/*---------------------------------cliente--------------------------------------*/



/*---------------------------------Agregar Puntos--------------------------------------*/
 public function AgregarPuntos(request $request,$id)
    {

        \Session::forget('usuario');
        $user = \Session::get('usuario');

        $user  = user::find($id);
        $user->puntos = $user->puntos + $request['puntos'];
        $user->save();

        $user = $user;

       
        \Session::put('usuario', $user);
         return redirect('/puntos');
     }
/*---------------------------------Agregar Puntos--------------------------------------*/
}
