<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;
use Soft\Http\Requests;
use Soft\Http\Requests\UserCreateRequest;
use Soft\Http\Requests\UserUpdateRequest;
//agregamos esto para no escribir cinema 
use Soft\User;
use Session;
use Redirect;

class UsuarioController extends Controller
{

    public function __construct()
    {
        //se aplica el auth a todos los metodos de esta clase , por lo tanto tiene que estar
        //logueado para acceder
        //$this->middleware('auth');
        //$this->middleware('admin');
        
    }

    //lista los recuroso
    public function index()
    {
        //hacemos referencia al namespace de nuestra aplicacion y despues al modelo user
        //All() nos trae todos los elementos que tiene la tabala user
        //cambiamos all() por pagination() para no mostrar todos los elementos sino algunos
        $users= user::paginate(10);
        //retorna a una vista que esta en la carpeta usuario y dentro esta index
        //compact es para enviarle informaion a esa vista index , y le mandamos ese users que creamos
        //que contiene toda la informacion
        return view('admin.usuario.index',compact('users'));
    }


    public function create()
    {
        //retorna a una vista que esta en la carpeta usuario y dentro esta create
        return view('admin.usuario.create');
    }

   
   //guarda los recursos en este caso los datos del usuario en la tabla user , name , email y password son los campos de mi
    //tabla user , a eso les agrego los datos de nombre , correo y pass atravas de request por el metodo post
    public function store(Request $request)
    {
        user::create([
            'usu_nombre' =>$request['usu_nombre'],
            'usu_apellido' =>$request['usu_apellido'],
            'usu_pass' =>$request['usu_pass'],
            'usu_email' =>$request['usu_email'],
            'usu_direcc' =>$request['usu_direcc'],
            'usu_perfil' =>$request['usu_perfil'],
            'usu_tel' =>$request['usu_tel'],
            ]);
        return redirect('/usuario')->with('message','usuario guardado con exito');
    }

    

    public function show($id)
    {
        //
    }

    //editar los recursos
    public function edit($id)
    {
        //creamos un $user que va a hacer igual al user que encontremos con la id que recibimos 
        $user=User::find($id);
        //nos regrasa a la vista en edit que se encuentra en la carpeta usuario a la cual le pasamos el 
        //user correspondiente
        
        return view('admin.usuario.edit',['user'=>$user]);
    }


    public function update(Request $request, $id)
    {
        //creamos un $user que va a hacer igual al user que encontremos con la id que recibimos 
       $user=User::find($id);
       $user->fill($request->all());
       $user->save();

        //le manda un mensaje al usuario
       Session::flash('message','usuario modificado con exito'); 
       return Redirect::to('/usuario');

    }


    public function destroy($id)
    {
        //destruye deacuerdo al id que nos pasaron User::destroy($id); 
        //medoto delete ad , buscamos al user deacuardo a la id que recibimos y hacemos referencia a delete
        //$users=User::find($id);
        //$users->delete();
        
        //le manda un mensaje al usuario
       // Session::flash('message','usuario eliminado con exito'); 
        //return Redirect::to('/usuario');
    }
}
