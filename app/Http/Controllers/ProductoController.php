<?php

namespace Soft\Http\Controllers;
use Illuminate\Http\Request;
use Soft\Http\Requests;
use Soft\Http\Requests\ProductoCreateRequest;
use Soft\Http\Requests\ProductoUpdateRequest;
use Soft\Producto;
use Soft\Producto_imagen;
use Soft\Categoria;
use Soft\Categoriasub;
use Session;
use Redirect;
use Storage;
use Soft\Rubro;
use Soft\Marca;
use Soft\Ivatipo;
use Soft\Provedore;
use Alert;
use Image;
use DB;
use Input;
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
        $categoriasub = categoriasub::lists('nombre','id');
        $categorias = categoria::lists('nombre','id');

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
        return view('admin.producto.index',compact('categoriasub','categorias','productos','rubros','marcas','ivatipos','provedores'));
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
    public function store(ProductoCreateRequest $request)
    {   
        
        $categoria_id = $request['categoria_id'];
        $categoria = Categoria::where('id','=',$categoria_id)->first();
        
        $subcategoria_id= $request['categoriasub_id'];
        $subcategoria = Categoriasub::where('id','=',$subcategoria_id)->first();

        $descripcion = $request['descripcion'];
        //creamos carpetas para almacenar las imagenes de los productos dependiendo de que categoria pertenecen
        
        //carpeta
        $directory = "productos/".$categoria->nombre."/".$subcategoria->nombre."/".$descripcion;

        //pregunto si la imagen no es vacia y guado en $filename , caso contrario guardo null
        if(!empty($request->hasFile('imagen1'))){
          $imagen = Input::file('imagen1');
            $filename=time() . '.' . $imagen->getClientOriginalExtension();
            //crea la carpeta
            Storage::makeDirectory($directory);
            image::make($imagen->getRealPath())->save( public_path('storage/'.$directory.'/'. $filename));
        }elseif(empty($request->hasFile('imagen1'))){
            //crea la carpeta
            Storage::makeDirectory($directory);
            $filename = "sin-foto.jpg";
        }


     
            
            


        if(empty($request->hasFile('imagen1'))){
            $ruta = "sin-foto.jpg"; 
        }else{
            $ruta = 'storage/'.$directory.'/'. $filename;
        }
            
        
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

           'categoria_id'=>$request['categoria_id'],
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
            
           'imagen1'=>$ruta,
           'filename'=>$filename,

           'oferta'=>$request['oferta'],
           'hot'=>$request['hot']
           
            ]);

        
    
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
         $categorias = categoria::lists('nombre','id');
         $categoriasub = categoriasub::lists('nombre','id');
        $rubros=Rubro::lists('descripcion','id');
        $marcas=Marca::lists('descripcion','id');
        $ivatipos=ivatipo::lists('descripcion','descripcion');
        $provedores=provedore::lists('razonsocial','id');
        $producto=producto::find($id);
        return view('admin.producto.edit',compact('categoriasub','categorias','rubros','marcas','ivatipos','provedores','producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoUpdateRequest $request, $id)
    {
        $categoria_id = $request['categoria_id'];
        $categoria = Categoria::where('id','=',$categoria_id)->first();
        
        $subcategoria_id= $request['categoriasub_id'];
        $subcategoria = Categoriasub::where('id','=',$subcategoria_id)->first();

        $descripcion = $request['descripcion'];
        //creamos carpetas para almacenar las imagenes de los productos dependiendo de que categoria pertenecen
        
        //carpeta
        $directory = "productos/".$categoria->nombre."/".$subcategoria->nombre."/".$descripcion;


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

         $producto->categoria_id =$request['categoria_id'];
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
         $producto->oferta =$request['oferta'];
         $producto->hot =$request['hot'];
         $producto->save();


          //para eliminar la imagen antes de cargar la nueva
        if($producto->filename == "sin-foto.jpg"){
         $directoryDelete = "/".$categoria->nombre."/".$subcategoria->nombre."/".$descripcion;
        \Storage::disk('productos')->delete($directoryDelete.'/'. $producto->filename);
        }

        //guarda la nueva imagen
         if (!empty($request->hasFile('imagen1'))) {
            $imagen =$request->file('imagen1');
            $filename=time() . '.' . $imagen->getClientOriginalExtension();
             image::make($imagen)->save( 'storage/'.$directory.'/'. $filename);


        if(empty($request->hasFile('imagen1'))){
            $ruta = $request->hasFile('imagen1');
        }else{
            $ruta = 'storage/'.$directory.'/'. $filename;
        }
            $producto=producto::find($id);
            $producto->imagen1 = $ruta;
            $producto->filename = $filename;
            $producto->save();
        }


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
    public function destroy(Request $request,$id)
    {
        //destruye deacuerdo al id que nos pasaron User::destroy($id); 
        //medoto delete ad , buscamos al user deacuardo a la id que recibimos y hacemos referencia a delete
        $producto=producto::find($id);


        $categoria = Categoria::where('id','=',$producto->categoria_id)->first();
        $subcategoria = Categoriasub::where('id','=',$producto->categoriasub_id)->first();

        //carpeta
        $directory = $categoria->nombre."/".$subcategoria->nombre."/".$producto->descripcion."/".$producto->imagen1;
        
         //para eliminar la imagen
        if($producto->imagen1 != "sin-foto.jpg"){
         \Storage::disk('productos')->delete($directory);
        }

        $producto->delete();
        
       
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Producto Eliminado');
        return Redirect::to('/producto');
    }
}
