<?php

namespace Soft\Http\Controllers;
use Illuminate\Http\Request;
use Soft\Http\Requests;
use Soft\Http\Requests\ProductoCreateRequest;
use Soft\Http\Requests\ProductoUpdateRequest;
use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Str as Str;
use Soft\Producto;
use Soft\Combo;
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
use Soft\Review;
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

    public function __construct()
    {
        /*si no existe mi session cart , esntonces la creo con put y creo
        un array para almacenar los items*/
        if(!\Session::has('pc')) \Session::put('pc', array());
    }



    public function index(Request $request)
    {
        //modal
        $rubros=Rubro::lists('descripcion','id');
        $marcas=Marca::lists('descripcion','id');
        $ivatipos=ivatipo::lists('descripcion','descripcion');
        $provedores=provedore::lists('razonsocial','id');
        $categoriasub = categoriasub::lists('nombre','id');
        $categorias = categoria::lists('nombre','id');

        //muestro todos los productos menos los que son combos
        $productos=producto::where('combo_id','=',null)->orderBy('created_at','des');
        $count = producto::count();
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
        return view('admin.producto.index',compact('count','categoriasub','categorias','productos','rubros','marcas','ivatipos','provedores'));
    }

public function ProductosCombo(Request $request)
    {
        //modal
        $rubros=Rubro::lists('descripcion','id');
        $marcas=Marca::lists('descripcion','id');
        $ivatipos=ivatipo::lists('descripcion','descripcion');
        $provedores=provedore::lists('razonsocial','id');
        $categoriasub = categoriasub::lists('nombre','id');
        $categorias = categoria::lists('nombre','id');

        
        $productos=producto::where('combo_id','!=',null);
        $count= producto::where('combo_id','!=',null)->count();

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
        $productos= $productos->paginate(10);
        //retorna a una vista que esta en la carpeta usuario y dentro esta index
        //compact es para enviarle informaion a esa vista index , y le mandamos ese users que creamos
        //que contiene toda la informacion
        return view('admin.producto.listar.combo',compact('count','categoriasub','categorias','productos','rubros','marcas','ivatipos','provedores'));
    }


    public function ProductosOferta(Request $request)
    {
        //modal
        $rubros=Rubro::lists('descripcion','id');
        $marcas=Marca::lists('descripcion','id');
        $ivatipos=ivatipo::lists('descripcion','descripcion');
        $provedores=provedore::lists('razonsocial','id');
        $categoriasub = categoriasub::lists('nombre','id');
        $categorias = categoria::lists('nombre','id');

         //ordenamos por usu_nombre y lo guaramos en $users
        $productos=producto::where('hot','=',1);
        $count=producto::where('hot','=',1)->count();
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
        return view('admin.producto.listar.oferta',compact('count','categoriasub','categorias','productos','rubros','marcas','ivatipos','provedores'));
    }

    public function StockCritico(Request $request)
    {
        //modal
        $rubros=Rubro::lists('descripcion','id');
        $marcas=Marca::lists('descripcion','id');
        $ivatipos=ivatipo::lists('descripcion','descripcion');
        $provedores=provedore::lists('razonsocial','id');
        $categoriasub = categoriasub::lists('nombre','id');
        $categorias = categoria::lists('nombre','id');

         
        $productoss = DB::table('productos')->orderBy('descripcion', 'asc')->get();
        $count = 0;
        foreach ($productoss as $producto) {
            if ($producto->stockactual <= $producto->stockcritico) {
               $productos[]=$producto;
                $count= $count + 1;
            }

        }
       //transformamos el array en una coleccion
        $productos = Collection::make($productos);
        
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
        
        
        //retorna a una vista que esta en la carpeta usuario y dentro esta index
        //compact es para enviarle informaion a esa vista index , y le mandamos ese users que creamos
        //que contiene toda la informacion
        return view('admin.producto.listar.stock',compact('count','categoriasub','categorias','productos','rubros','marcas','ivatipos','provedores'));
    }


    public function ProductoDesabilitado(Request $request)
    {
        //modal
        $rubros=Rubro::lists('descripcion','id');
        $marcas=Marca::lists('descripcion','id');
        $ivatipos=ivatipo::lists('descripcion','descripcion');
        $provedores=provedore::lists('razonsocial','id');
        $categoriasub = categoriasub::lists('nombre','id');
        $categorias = categoria::lists('nombre','id');

         //ordenamos por usu_nombre y lo guaramos en $users
        $productos=producto::where('habilitado','=',null);
        $count= producto::where('habilitado','=',null)->count();
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
        return view('admin.producto.listar.desabilitado',compact('count','categoriasub','categorias','productos','rubros','marcas','ivatipos','provedores'));
    }



    public function ProductoReview(Request $request)
    {
        //modal
        $rubros=Rubro::lists('descripcion','id');
        $marcas=Marca::lists('descripcion','id');
        $ivatipos=ivatipo::lists('descripcion','descripcion');
        $provedores=provedore::lists('razonsocial','id');
        $categoriasub = categoriasub::lists('nombre','id');
        $categorias = categoria::lists('nombre','id');

         //ordenamos por usu_nombre y lo guaramos en $users
        $reviews = review::orderBy('id','desc')->paginate(10);

        $count= review::where('approved','=',1)->count();
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
      
        //retorna a una vista que esta en la carpeta usuario y dentro esta index
        //compact es para enviarle informaion a esa vista index , y le mandamos ese users que creamos
        //que contiene toda la informacion
        return view('admin.producto.listar.review-aprobados',compact('count','categoriasub','categorias','reviews','rubros','marcas','ivatipos','provedores'));
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
            
        
          $producto = Producto::create([
           'codigo'=>$request['codigo'],
           'descripcion'=>$request['descripcion'],
           'slug'=>Str::slug($request['descripcion']),
         
            
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
           'hot'=>$request['hot'],

           
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

         $categorias = categoria::lists('nombre','id');
         $categoriasub = categoriasub::lists('nombre','id');
        $rubros=Rubro::lists('descripcion','id');
        $marcas=Marca::lists('descripcion','id');
        $ivatipos=ivatipo::lists('descripcion','descripcion');
        $provedores=provedore::lists('razonsocial','id');
        $producto=producto::find($id);
        return view('admin.producto.ver',compact('categoriasub','categorias','rubros','marcas','ivatipos','provedores','producto'));
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
        $producto=producto::find($id);

        $categoria_id = $request['categoria_id'];
        $categoria = Categoria::where('id','=',$categoria_id)->first();
        
        $subcategoria_id= $request['categoriasub_id'];
        $subcategoria = Categoriasub::where('id','=',$subcategoria_id)->first();

        //almaceno la descripcion
        $descripcion = $request['descripcion'];
        

        //directorios nuevos y viejos
        $oldDirectory = "productos/".$categoria->nombre."/".$subcategoria->nombre."/".$producto->descripcion;
        $directory = "productos/".$categoria->nombre."/".$subcategoria->nombre."/".$descripcion;
        $directoryDelete = "/".$categoria->nombre."/".$subcategoria->nombre."/".$producto->descripcion."/".$producto->filename;



        // si no cambio la imagen y si cambio la descripcion renombro la carpeta(01)
        if ($request['descripcion'] != $producto->descripcion and empty($request->hasFile('imagen1'))) {
          //renombramos la carpeta
           Storage::rename($oldDirectory, $directory);

           $imagen =$request->file('imagen1');
           $ruta = 'storage/'.$directory.'/'. $producto->filename;

           $producto=producto::find($id);
           $producto->imagen1 = $ruta;
           $producto->filename = $producto->filename;
           $producto->save();
        }

        //si cambio la imagen y no la descripcion (10)
        if(!empty($request->hasFile('imagen1')) and $request['descripcion'] == $producto->descripcion){
         //eliminamos la imagen anterior
          \Storage::disk('productos')->delete($directoryDelete);
          //guardamos la nueva imagen
          $imagen = Input::file('imagen1');
          $filename=time() . '.' . $imagen->getClientOriginalExtension();
          image::make($imagen->getRealPath())->save( public_path('storage/'.$directory.'/'. $filename));
          $ruta = 'storage/'.$directory.'/'. $filename;

          $producto=producto::find($id);
          $producto->imagen1 = $ruta;
          $producto->filename = $filename;
          $producto->save();
        }

        //si cambio la imagen y cambio la descripcion(11)
        if (!empty($request->hasFile('imagen1')) and $request['descripcion'] != $producto->descripcion) {
           //eliminamos la imagen anterior
          \Storage::disk('productos')->delete($directoryDelete);
           //renombramos la carpeta
           Storage::rename($oldDirectory, $directory);
          //guardamos la nueva imagen
          $imagen = Input::file('imagen1');
          $filename=time() . '.' . $imagen->getClientOriginalExtension();
          image::make($imagen->getRealPath())->save( public_path('storage/'.$directory.'/'. $filename));
    
           $ruta = 'storage/'.$directory.'/'. $filename;

          $producto=producto::find($id);
          $producto->imagen1 = $ruta;
          $producto->filename = $filename;
          $producto->save();
        }
        
        //si no cambio ni la imgen ni la descripcion (00)    
        if (empty($request->hasFile('imagen1')) and $request['descripcion'] == $producto->descripcion) {
          $ruta = $producto->imagen1;

          $producto=producto::find($id);
          $producto->imagen1 = $ruta;
          $producto->filename = $producto->filename;
          $producto->save();
        }

    

         $producto->codigo = $request['codigo'];
         $producto->descripcion =$request['descripcion'];
         $producto->slug =Str::slug($request['descripcion']);
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











//----------------------------SECCION DEL PRODUCTOS COMBOS------------------------------//
public function ComboPc()
    {

      
        $categorias = categoria::all();
        $rubros=Rubro::lists('descripcion','id');
        $marcas=Marca::lists('descripcion','id');
        $ivatipos=ivatipo::lists('descripcion','descripcion');
        $provedores=provedore::lists('razonsocial','id');

       //transformamos el array en una coleccion
        //$gabinetes = producto::where('categoria_id','=',20)->get();

        $gabinetes = DB::table('productos')->where('categoria_id','=',20)->select('id', 'descripcion','precioventa')->get();
        $mothers = DB::table('productos')->where('categoria_id','=',28)->select('id', 'descripcion','precioventa')->get();
        $mouses = DB::table('productos')->where('categoria_id','=',29)->select('id', 'descripcion','precioventa')->get();
        $teclados = DB::table('productos')->where('categoria_id','=',30)->select('id', 'descripcion','precioventa')->get();
        $videos = DB::table('productos')->where('categoria_id','=',31)->select('id', 'descripcion','precioventa')->get();
        $procesadores = DB::table('productos')->where('categoria_id','=',32)->select('id', 'descripcion','precioventa')->get();
        $fuentes = DB::table('productos')->where('categoria_id','=',40)->select('id', 'descripcion','precioventa')->get();
        $discos = DB::table('productos')->where('categoria_id','=',19)->select('id', 'descripcion','precioventa')->get();
        $memorias = DB::table('productos')->where('categoria_id','=',24)->select('id', 'descripcion','precioventa')->get();
      
        $total = 0;
        return view('admin.producto.create-pc',compact('gabinetes',
            'categorias','provedores','marcas','rubros','ivatipos'
            ,'memorias','discos','fuentes','procesadores','videos','teclados','mouses','mothers','total'));
        
    }
    


public function calcularCombo(Request $request, $gabinete,$mother,$procesador,$mouse,$teclado,$video,$fuente,$disco,$memoria)
    {
        //si es una peticion ajax
        if ($request->ajax()) {
            $preciogabinete = producto::find($gabinete);
            $preciomother = producto::find($mother);
            $precioprocesador = producto::find($procesador);
            $preciomouse = producto::find($mouse);
            $precioteclado = producto::find($teclado);
            $preciovideo = producto::find($video);
            $preciofuente = producto::find($fuente);
            $preciodisco = producto::find($disco);
            $preciomemoria = producto::find($memoria);

            $total = $preciogabinete->precioventa + $preciomother->precioventa + $precioprocesador->precioventa + $preciomouse->precioventa + $precioteclado->precioventa + $preciovideo->precioventa
                        + $preciofuente->precioventa + $preciodisco->precioventa + $preciomemoria->precioventa;

            return response()->json([
                 $total
                ]);
        }
    }




        public function CreateComboPc(ProductoCreateRequest $request)
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
            
        
           

           $combo = Combo::create([
            'gabinete'=>$request['gabinete'],
           'mother'=>$request['mother'],
           'mouse'=>$request['mouse'],
           'teclado'=>$request['teclado'],
           'video'=>$request['video'],
           'procesador'=>$request['procesador'],
           'fuente'=>$request['fuente'],
           'disco'=>$request['disco'],
           'memoria'=>$request['memoria'],
            ]);


          $producto = Producto::create([
           'codigo'=>$request['codigo'],
           'descripcion'=>$request['descripcion'],
           'slug'=>Str::slug($request['descripcion']),
         
            
           'preciocosto'=>$request['preciocosto'],
           'iva_id'=>$request['iva_id'],
           'precioventa'=>$request['precioventa'],
           'descuento'=>$request['descuento'],      
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
           'hot'=>$request['hot'],

           'combo_id'=>$combo->id,
           
            ]);
    
        


         Alert::success('Mensaje existoso', 'Producto Creado');
        return redirect('/producto');
    }


    public function VerComboPc($id)
    {
        $categorias = categoria::lists('nombre','id');
        $categoriasub = categoriasub::lists('nombre','id');
        $rubros=Rubro::lists('descripcion','id');
        $marcas=Marca::lists('descripcion','id');
        $ivatipos=ivatipo::lists('descripcion','descripcion');
        $provedores=provedore::lists('razonsocial','id');
        $producto=producto::find($id);

        $combo = combo::find($producto->combo_id);
    /*
        $gabinetes = producto::where('categoria_id','=',20)->lists('descripcion','id');
        $mothers = producto::where('categoria_id','=',28)->lists('descripcion','id');
        $mouses = producto::where('categoria_id','=',29)->lists('descripcion','id');
        $teclados = producto::where('categoria_id','=',30)->lists('descripcion','id');
        $videos = producto::where('categoria_id','=',31)->lists('descripcion','id');
        $procesadores = producto::where('categoria_id','=',32)->lists('descripcion','id');
        $fuentes = producto::where('categoria_id','=',40)->lists('descripcion','id');
        $discos = producto::where('categoria_id','=',19)->lists('descripcion','id');
        $memorias = producto::where('categoria_id','=',24)->lists('descripcion','id');
     */

        $gabinetes = producto::where('id','=',$combo->gabinete)->lists('descripcion','id');
        $mothers = producto::where('id','=',$combo->mother)->lists('descripcion','id');
        $mouses = producto::where('id','=',$combo->mouse)->lists('descripcion','id');
        $teclados = producto::where('id','=',$combo->teclado)->lists('descripcion','id');
        $videos = producto::where('id','=',$combo->video)->lists('descripcion','id');
        $procesadores = producto::where('id','=',$combo->procesador)->lists('descripcion','id');
        $fuentes = producto::where('id','=',$combo->fuente)->lists('descripcion','id');
        $discos = producto::where('id','=',$combo->disco)->lists('descripcion','id');
        $memorias = producto::where('id','=',$combo->memoria)->lists('descripcion','id');
        
        return view('admin.producto.ver-combo',compact('mothers','mouses','teclados','videos','procesadores','fuentes','discos','memorias','gabinetes','categoriasub','categorias','rubros','marcas','ivatipos','provedores','producto'));
    }


    public function EditComboPc($id)
    {
        $categorias = categoria::lists('nombre','id');
        $categoriasub = categoriasub::lists('nombre','id');
        $rubros=Rubro::lists('descripcion','id');
        $marcas=Marca::lists('descripcion','id');
        $ivatipos=ivatipo::lists('descripcion','descripcion');
        $provedores=provedore::lists('razonsocial','id');
        $producto=producto::find($id);

        $combo = combo::find($producto->combo_id);
    
        $gabinetes = producto::where('categoria_id','=',20)->lists('descripcion','id');
        $mothers = producto::where('categoria_id','=',28)->lists('descripcion','id');
        $mouses = producto::where('categoria_id','=',29)->lists('descripcion','id');
        $teclados = producto::where('categoria_id','=',30)->lists('descripcion','id');
        $videos = producto::where('categoria_id','=',31)->lists('descripcion','id');
        $procesadores = producto::where('categoria_id','=',32)->lists('descripcion','id');
        $fuentes = producto::where('categoria_id','=',40)->lists('descripcion','id');
        $discos = producto::where('categoria_id','=',19)->lists('descripcion','id');
        $memorias = producto::where('categoria_id','=',24)->lists('descripcion','id');


        $gab = producto::where('id','=',$combo->gabinete)->first();
        $mot = producto::where('id','=',$combo->mother)->first();
        $mou = producto::where('id','=',$combo->mouse)->first();
        $tec = producto::where('id','=',$combo->teclado)->first();
        $vid = producto::where('id','=',$combo->video)->first();
        $pro = producto::where('id','=',$combo->procesador)->first();
        $fue = producto::where('id','=',$combo->fuente)->first();
        $dis = producto::where('id','=',$combo->disco)->first();
        $mem = producto::where('id','=',$combo->memoria)->first();

        
     
        
        return view('admin.producto.edit-combo',compact(
            'gab','mot','mou','tec','vid','pro','fue','dis','mem',
            'combo','mothers','mouses','teclados','videos','procesadores','fuentes','discos','memorias','gabinetes','categoriasub','categorias','rubros','marcas','ivatipos','provedores','producto'));
    }

    

    public function UpdateComboPc(Request $request, $id)
    {   
       
        $producto=producto::find($id);
        $combo = combo::find($producto->combo_id);

        $categoria_id = $request['categoria_id'];
        $categoria = Categoria::where('id','=',$categoria_id)->first();
        
        $subcategoria_id= $request['categoriasub_id'];
        $subcategoria = Categoriasub::where('id','=',$subcategoria_id)->first();

        //almaceno la descripcion
        $descripcion = $request['descripcion'];
       

        //directorios nuevos y viejos
        $oldDirectory = "productos/".$categoria->nombre."/".$subcategoria->nombre."/".$producto->descripcion;
        $directory = "productos/".$categoria->nombre."/".$subcategoria->nombre."/".$descripcion;
        $directoryDelete = "/".$categoria->nombre."/".$subcategoria->nombre."/".$producto->descripcion."/".$producto->filename;



        // si no cambio la imagen y si cambio la descripcion renombro la carpeta(01)
        if ($request['descripcion'] != $producto->descripcion and empty($request->hasFile('imagen1'))) {
          //renombramos la carpeta
           Storage::rename($oldDirectory, $directory);

           $imagen =$request->file('imagen1');
           $ruta = 'storage/'.$directory.'/'. $producto->filename;

           $producto=producto::find($id);
           $producto->imagen1 = $ruta;
           $producto->filename = $producto->filename;
           $producto->save();
        }

        //si cambio la imagen y no la descripcion (10)
        if(!empty($request->hasFile('imagen1')) and $request['descripcion'] == $producto->descripcion){
         //eliminamos la imagen anterior
          \Storage::disk('productos')->delete($directoryDelete);
          //guardamos la nueva imagen
          $imagen = Input::file('imagen1');
          $filename=time() . '.' . $imagen->getClientOriginalExtension();
          image::make($imagen->getRealPath())->save( public_path('storage/'.$directory.'/'. $filename));
          $ruta = 'storage/'.$directory.'/'. $filename;

          $producto=producto::find($id);
          $producto->imagen1 = $ruta;
          $producto->filename = $filename;
          $producto->save();
        }

        //si cambio la imagen y cambio la descripcion(11)
        if (!empty($request->hasFile('imagen1')) and $request['descripcion'] != $producto->descripcion) {
           //eliminamos la imagen anterior
          \Storage::disk('productos')->delete($directoryDelete);
           //renombramos la carpeta
           Storage::rename($oldDirectory, $directory);
          //guardamos la nueva imagen
          $imagen = Input::file('imagen1');
          $filename=time() . '.' . $imagen->getClientOriginalExtension();
          image::make($imagen->getRealPath())->save( public_path('storage/'.$directory.'/'. $filename));
    
           $ruta = 'storage/'.$directory.'/'. $filename;

          $producto=producto::find($id);
          $producto->imagen1 = $ruta;
          $producto->filename = $filename;
          $producto->save();
        }
        
        //si no cambio ni la imgen ni la descripcion (00)    
        if (empty($request->hasFile('imagen1')) and $request['descripcion'] == $producto->descripcion) {
          $ruta = $producto->imagen1;

          $producto=producto::find($id);
          $producto->imagen1 = $ruta;
          $producto->filename = $producto->filename;
          $producto->save();
        }

    
        //modificamos el producto
         $producto->codigo = $request['codigo'];
         $producto->descripcion =$request['descripcion'];
         $producto->slug =Str::slug($request['descripcion']);
         $producto->preciocosto=$request['preciocosto'];
         $producto->iva_id=$request['iva_id'];
         $producto->precioventa =$request['precioventa'];
         $producto->descuento =$request['descuento'];
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

         //modifico el combo
         $combo->gabinete =$request['gabinete'];
         $combo->mother =$request['mother'];
         $combo->procesador =$request['procesador'];
         $combo->mouse =$request['mouse'];
         $combo->teclado =$request['teclado'];
         $combo->video =$request['video'];
         $combo->fuente =$request['fuente'];
         $combo->disco =$request['disco'];
         $combo->memoria =$request['memoria'];
         $combo->save();

        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Producto Modificado');
       return Redirect::to('/producto-combo');
    }



    public function destroyCombo(Request $request,$id)
    {
         $producto=producto::find($id);
         $combo= combo::find($producto->combo_id);

        $categoria = Categoria::where('id','=',$producto->categoria_id)->first();
        $subcategoria = Categoriasub::where('id','=',$producto->categoriasub_id)->first();

        //carpeta
        $directory = $categoria->nombre."/".$subcategoria->nombre."/".$producto->descripcion."/".$producto->imagen1;
        
         //para eliminar la imagen
        if($producto->imagen1 != "sin-foto.jpg"){
         \Storage::disk('productos')->delete($directory);
        }

        $producto->delete();
        $combo->delete();
       
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Producto Eliminado');
        return Redirect::to('/producto-combo');
    }


}
