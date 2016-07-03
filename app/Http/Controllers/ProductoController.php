<?php

namespace Soft\Http\Controllers;
use Illuminate\Http\Request;
use Soft\Http\Requests;
use Soft\Producto;
use Session;
use Redirect;
use Storage;
use Soft\Rubro;
use Soft\Marca;
use Soft\Ivatipo;
use Soft\Provedore;
use Alert;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //modal
        $rubros=Rubro::lists('descripcion','id');
        $marcas=Marca::lists('descripcion','id');
        $ivatipos=ivatipo::lists('descripcion','descripcion');
        $provedores=provedore::lists('prov_razsoc','id');


         //ordenamos por usu_nombre y lo guaramos en $users
        $productos=producto::orderBy('pro_descrip');

        //busqueda por descripccion
        $pro_descrip=$request->input('pro_descrip');
        if (!empty($pro_descrip)) { 
            $productos->where('pro_descrip','LIKE','%'.$pro_descrip.'%');
        }
        //busqueda por codigo
        $codigo=$request->input('pro_codigo');
        if (!empty($codigo)) {
            $productos->where('pro_codigo','LIKE','%'.$codigo.'%');
        }
        
        //realizamos la paginacion
        $productos=$productos->paginate(10);
        //retorna a una vista que esta en la carpeta usuario y dentro esta index
        //compact es para enviarle informaion a esa vista index , y le mandamos ese users que creamos
        //que contiene toda la informacion
        return view('admin.producto.index',compact('productos','rubros','marcas','ivatipos','provedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rubros=Rubro::lists('descripcion','id');
        $marcas=Marca::lists('descripcion','id');
        $ivatipos=ivatipo::lists('descripcion','descripcion');
        $provedores=provedore::lists('prov_razsoc','id');
        return view('admin.producto.create',['ivatipos'=>$ivatipos,'rubros'=>$rubros,'marcas'=>$marcas
                                            ,'provedores'=>$provedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         producto::create($request->all());
         Alert::success('Mensaje existoso', 'Producto Creado');
        return redirect('/producto');
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
         $producto=producto::find($id);
         $producto->fill($request->all());
         $producto->save();

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Producto Modificado');
       return Redirect::to('/producto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //destruye deacuerdo al id que nos pasaron User::destroy($id); 
        //medoto delete ad , buscamos al user deacuardo a la id que recibimos y hacemos referencia a delete
        $producto=producto::find($id);
        $producto->delete();
        
        //para eliminar la imagen
        \Storage::delete($producto->path);
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Producto Eliminado');
        return Redirect::to('/producto');
    }
}
