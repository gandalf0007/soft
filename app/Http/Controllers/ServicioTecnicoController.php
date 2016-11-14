<?php

namespace Soft\Http\Controllers;

use Illuminate\Http\Request;

use Soft\Http\Requests;
use Soft\Reparacione;
use Soft\User;
use Soft\web_logo;

use Alert;
use Session;
use Redirect;
use Storage;
use DB;
use Image;
class ServicioTecnicoController extends Controller
{


    public function __construct()
    {
        //para cliente ya no es un array ya que almaceno 1 solo objeto
        if(!\Session::has('usuarioReparacion')) \Session::put('usuarioReparacion');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //ordenamos por usu_nombre y lo guaramos en $users
        $reparaciones = Reparacione::where('status','=',"PENDIENTE")->orderBy('created_at','asc');
        $count = Reparacione::where('status','=',"PENDIENTE")->count();
        //busqueda por descripccion
        $descripcion=$request->input('descripcion');
        if (!empty($descripcion)) { 
            $reparaciones->where('subject','LIKE','%'.$descripcion.'%');
        }
        //busqueda por codigo
        $codigo=$request->input('codigo');
        if (!empty($codigo)) {
            $productos->where('codigo','LIKE','%'.$codigo.'%');
        }
        
        $reparaciones=$reparaciones->paginate(10);
       
  
        return view('admin.reparaciones.index',compact('count','reparaciones'));
    }





public function ReparacionesCompletadas(Request $request)
    {
        //ordenamos por usu_nombre y lo guaramos en $users
        $reparaciones = Reparacione::where('status','=',"SOLUCIONADO")->orderBy('created_at','asc');
        $count = Reparacione::where('status','=',"SOLUCIONADO")->count();
        //busqueda por descripccion
        $descripcion=$request->input('descripcion');
        if (!empty($descripcion)) { 
            $reparaciones->where('subject','LIKE','%'.$descripcion.'%');
        }
        //busqueda por codigo
        $codigo=$request->input('codigo');
        if (!empty($codigo)) {
            $productos->where('codigo','LIKE','%'.$codigo.'%');
        }
        
        $reparaciones=$reparaciones->paginate(10);
       
  
        return view('admin.reparaciones.listar.completadas',compact('count','reparaciones'));
    }

public function ReparacionesCancelada(Request $request)
    {
        //ordenamos por usu_nombre y lo guaramos en $users
        $reparaciones = Reparacione::where('status','=',"CANCELADO")->orderBy('created_at','asc');
        $count = Reparacione::where('status','=',"CANCELADO")->count();
        //busqueda por descripccion
        $descripcion=$request->input('descripcion');
        if (!empty($descripcion)) { 
            $reparaciones->where('subject','LIKE','%'.$descripcion.'%');
        }
        //busqueda por codigo
        $codigo=$request->input('codigo');
        if (!empty($codigo)) {
            $productos->where('codigo','LIKE','%'.$codigo.'%');
        }
        
        $reparaciones=$reparaciones->paginate(10);
       
  
        return view('admin.reparaciones.listar.canceladas',compact('count','reparaciones'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $user = \Session::get('usuarioReparacion');
         return view('admin.reparaciones.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pendiente = "PENDIENTE";
        $user = \Session::get('usuarioReparacion');

       Reparacione::create([
            'equipo' =>$request['equipo'],
            'serie' =>$request['serie'],
            'falla'=>$request['falla'],
            'accesorio'=>$request['accesorio'],
            'observaciones' =>$request['observaciones'],
            'status' =>$pendiente,
            'user_id' =>$user->id,
            ]);

        Alert::success('Mensaje existoso', 'Creado');
        return redirect('/reparaciones');
    }

     public function addUser()
    {
         return view('admin.reparaciones.create');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $reparacion = Reparacione::find($id);
       $reparacion->delete();
        
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Reparacion Eliminada');
        return Redirect::to('/reparaciones');

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
        return View('admin.reparaciones.useradd',compact('users'));

     }

 public function addUsuario($id)
    {
        $useradd  = user::find($id);
        $user = \Session::get('usuarioReparacion');
        $user = $useradd;
        \Session::put('usuarioReparacion', $user);
         return redirect('/reparacion-create');
     }


/*---------------------------------cliente--------------------------------------*/


public function ServicioCambiarStatus(Request $Request , $id){

        $Reparacione=Reparacione::find($id);
        $Reparacione->status=$Request['pago'];
        $Reparacione->save();
         return Redirect::to('/reparaciones');
    }



public function crearReporteReparacion($tipo,$id){
     $vistaurl="admin.reparaciones.pdf.reporte";
     $Reparacione=Reparacione::find($id);
     $logo = DB::table('web_logos')->first();
     $informacion =  DB::table('web_informacions')->first();

     return $this->crearPDF($informacion,$logo,$Reparacione, $vistaurl,$tipo);

    }

      public function crearPDF($informacion,$logo,$Reparacione,$vistaurl,$tipo)
    {
        $date = date('Y-m-d');
        $view =  \View::make($vistaurl, compact('informacion','Reparacione','logo','date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        
        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){return $pdf->download('reporte.pdf'); }
    }




}
