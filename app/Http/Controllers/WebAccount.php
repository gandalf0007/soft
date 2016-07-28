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

class WebAccount extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function MyAccount()
    {
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
        //datos de facturacion
        $datosfacturacions =  DB::table('user_facturacions')->where( 'user_id', '=',Auth::user()->id)->first();
     
        return view('shop.myaccount',compact('datosfacturacions','perfils','user','categorias','subcategorias','carrucels','carrucelMarcas','informacions','boxs','logos'));
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
       Alert::success('Mensaje existoso', 'Modificado');
       return Redirect::to('/myaccount');

    }


    public function DatosDeFacturacion(request $request)
    {

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
            'empresa' =>$request['empresa'],
            'telefono' =>$request['telefono'],  
            'telefono2' =>$request['telefono2'],
            ]);


       Alert::success('Mensaje existoso', 'Modificado');
       return Redirect::to('/myaccount');

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

       
       Alert::success('Mensaje existoso', 'Modificado');
       return Redirect::to('/myaccount');

    }





}
