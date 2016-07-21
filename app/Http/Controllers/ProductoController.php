<?php

namespace Soft\Http\Controllers;
use Illuminate\Http\Request;
use Soft\Http\Requests;
use Soft\Producto;
use Soft\producto_imagen;
use Soft\categoria;
use Soft\categoriasub;
use Session;
use Redirect;
use Storage;
use Soft\Rubro;
use Soft\Marca;
use Soft\Ivatipo;
use Soft\Provedore;
use Alert;
use Image;

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
        $provedores=provedore::lists('razonsocial','id');
        $categorias = categoria::all();

         //ordenamos por usu_nombre y lo guaramos en $users
        $productos=producto::orderBy('created_at','des');

        //busqueda por descripccion
        $descripcion=$request->input('descripcion');
        if (!empty($descripcion)) { 
            $productos->where('descripcion','LIKE','%'.$descripcion.'%');
        }
        //busqueda por codigo
        $codigo=$request->input('codigo');
        if (!empty($codigo)) {
            $productos->where('codigo','LIKE','%'.$codigo.'%');
        }
        
        //realizamos la paginacion
        $productos=$productos->paginate(10);
        //retorna a una vista que esta en la carpeta usuario y dentro esta index
        //compact es para enviarle informaion a esa vista index , y le mandamos ese users que creamos
        //que contiene toda la informacion
        return view('admin.producto.index',compact('categorias','productos','rubros','marcas','ivatipos','provedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categorias = categoria::all();
        $rubros=Rubro::lists('descripcion','id');
        $marcas=Marca::lists('descripcion','id');
        $ivatipos=ivatipo::lists('descripcion','descripcion');
        $provedores=provedore::lists('razonsocial','id');

        return view('admin.producto.create',compact('categorias','provedores','marcas','rubros','ivatipos'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('imagen1')) {
            $imagen =$request->file('imagen1');
            $filename=time() . '.' . $imagen->getClientOriginalExtension();
            image::make($imagen)->save( public_path('/storage/productos/' . $filename));
        
         Producto::create([
           'codigo'=>$request['codigo'],
           'descripcion'=>$request['descripcion'],
            
           'preciocosto'=>$request['preciocosto'],
           'iva_id'=>$request['iva_id'],
           'precioventa'=>$request['precioventa'],      
           'rentabi1'=>$request['rentabi1'],
           'precio2'=>$request['precio2'],
           'rentabi2'=>$request['rentabi2'],
           'precio3'=>$request['precio3'],
           'rentabi3'=>$request['rentabi3'],

           'stockactual'=>$request['stockactual'],
           'stockcritico'=>$request['stockcritico'],
           'stockpedido'=>$request['stockpedido'],
           'rubro_id'=>$request['rubro_id'],
           'marca_id'=>$request['marca_id'],
           'provedor_id'=>$request['provedor_id'],

           'categoriasub_id'=>$request['categoriasub_id'],
           

           'cod_alter'=>$request['cod_alter'],
           'ubicacion'=>$request['ubicacion'],
           'cod_bulto'=>$request['cod_bulto'],
           'cant_bulto'=>$request['cant_bulto'],

           'habilitado'=>$request['habilitado'],
           'alerta'=>$request['alerta'],
           'observaciones'=>$request['observaciones'],
           'usar_rentabili'=>$request['usar_rentabili'],

           'descripcioncorta'=>$request['descripcioncorta'],
           'descripcionlarga'=>$request['descripcionlarga'],
            
           'imagen1'=>$filename,
            ]);

         }
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
         $categorias = categoria::all();
        $rubros=Rubro::lists('descripcion','id');
        $marcas=Marca::lists('descripcion','id');
        $ivatipos=ivatipo::lists('descripcion','descripcion');
        $provedores=provedore::lists('razonsocial','id');
        $producto=producto::find($id);
        return view('admin.producto.edit',compact('categorias','rubros','marcas','ivatipos','provedores','producto'));
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
         $producto->codigo = $request['codigo'];
         $producto->descripcion =$request['descripcion'];
         $producto->preciocosto=$request['preciocosto'];
         $producto->iva_id=$request['iva_id'];
         $producto->precioventa =$request['precioventa'];
         $producto->rentabi1 =$request['rentabi1'];
         $producto->precio2 =$request['precio2'];
         $producto->rentabi2 =$request['rentabi2'];
         $producto->precio3 =$request['precio3'];
         $producto->rentabi3 =$request['rentabi3'];
         $producto->stockactual =$request['stockactual'];
         $producto->stockcritico =$request['stockcritico'];
         $producto->stockpedido =$request['stockpedido'];
         $producto->rubro_id =$request['rubro_id'];
         $producto->marca_id =$request['marca_id'];
         $producto->provedor_id =$request['provedor_id'];
         $producto->categoriasub_id =$request['categoriasub_id'];
         $producto->cod_alter =$request['cod_alter'];
         $producto->ubicacion =$request['ubicacion'];
         $producto->cod_bulto =$request['cod_bulto'];
         $producto->cant_bulto =$request['cant_bulto'];
         $producto->habilitado =$request['habilitado'];
         $producto->alerta =$request['alerta'];
         $producto->observaciones =$request['observaciones'];
         $producto->usar_rentabili =$request['usar_rentabili'];
         $producto->descripcioncorta =$request['descripcioncorta'];
         $producto->descripcionlarga =$request['descripcionlarga'];
         $producto->usar_rentabili =$request['usar_rentabili'];

         if ($request->hasFile('imagen1')) {
            $imagen =$request->file('imagen1');
            $filename=time() . '.' . $imagen->getClientOriginalExtension();
            image::make($imagen)->save( public_path('/storage/productos/' . $filename));

            $producto=Producto::find($id);
            $producto->imagen1 = $filename;
            $producto->save();

        }


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
