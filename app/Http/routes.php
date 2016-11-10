<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
| post , get , delete , put
*/
//activando la proteccion token contra ataques a formularios


//rutas , el primer parammetro es el nombre de la ruta
//el segundo parametro llama a la funcion dentro de frontController
use Soft\Categoria;
use Soft\Categoriasub;
use Soft\Http\Requests;
use Soft\Http\Requests\Request;



Route::group(['middleware' => 'web'], function () {
    
Route::get('/','PaginasController@home');
Route::get('blog','PaginasController@post');
Route::get('blogdetail-post{id}',[
'as'=>'paginas.postDetalle',
'uses'=>'PaginasController@postDetalle'
	]);
Route::get('subcategoria-{id}','PaginasController@subcategoria');
Route::get('item-detalle-{slug}',[
'as'=>'paginas.itemDetalle',
'uses'=>'PaginasController@itemDetalle'
	]);

Route::post('review/{slug}','ReviewsController@Reviews');

Route::get('preguntas-frecuentes','PaginasController@PreguntasFrecuentes');
Route::get('formas-de-pago','PaginasController@FormasDePago');
Route::get('garantia','PaginasController@garantia');
Route::get('aviso-legal','PaginasController@AvisoLegal');
Route::get('envios','PaginasController@envios');
Route::get('ubicacion','PaginasController@ubicacion');
Route::get('contacto','PaginasController@contacto');
Route::post('mail','MailController@send');


Route::get('web-addtocart/{id}',[
	'uses'=>'WebVentas@add',
	'as'=>'web.AddToCart'
	]);
Route::get('web-shopping-cart',[
	'uses'=>'WebVentas@show',
	'as'=>'web.ShoppingCart'
	]);
//eliminar carricato
Route::get('web-trash','WebVentas@trash');
//eliminar productos del carrito
Route::get('web-delete/{id}','WebVentas@delete');
//actualizar items
Route::get('web-update/{id}/{quantity}','WebVentas@update');


Route::get('checkout','WebVentas@CheckoutStep1');


Route::get('buscador','BuscadorController@buscador');
});





Route::group(array('middleware' => 'auth'), function(){
    Route::controller('filemanager', 'FilemanagerLaravelController');
});


Route::group(['middleware' =>['admin']], function () {

 Route::get('/admin', 'FrontController@admin');
 Route::get('usuario/perfil','UsuarioController@perfil');

/*
Route::get('venta-addcart','VentaController@addcart');
Route::post('venta-addcart','VentaController@addcart');


Route::get('cart/checkout','VentaController@checkout');
//eliminar objetos de productosadds al hacer el chekout
Route::get('venta-cart-destroy','VentaController@destroy');
//eliminar un item del carrito
Route::get('venta-item-destroy','VentaController@deleteitem');
Route::get('venta-cart','VentaController@cart');
Route::get('show-my-cart','VentaController@showMyCart');*/

/*--------------------------------SECCION VENTAS------------------------------*/


/*---------------VENTAS------------*/
//busqueda de los productos
Route::get('venta-busqueda','VentaController@addproducto');
//visualisa los productos para agregar
Route::get('venta-addproducto','VentaController@addproducto');
//al darle agregar a un producto a mi carrito , le mando el id de ese producto
Route::get('venta-addtocart/{id}','VentaController@add');
//mostrar
Route::get('venta-show','VentaController@show');
//eliminar carricato
Route::get('venta-trash','VentaController@trash');
//actualizar items
Route::get('venta-update/{id}/{quantity}','VentaController@update');
//eliminar productos del carrito
Route::get('venta-delete/{id}','VentaController@delete');
//chekout finalizar carrito
Route::post('venta-checkout','VentaController@checkout');
Route::get('venta-checkout','VentaController@checkout');
//listar ventas
Route::get('listar-venta/','VentaController@listarVenta');
//listar ventas WEB
Route::get('listar-venta-web/','VentaController@listarVentaWeb');
//cargar Cliente
Route::get('venta-addcliente/','VentaController@seleccionarCliente');
//mandamos id del cliente para almacenarlo en la sessio
Route::get('venta-cliente/{id}','VentaController@addCliente');

Route::get('venta-detalle-pdf/{tipo}/{id}','VentaController@detalleVentaPdf');

//cambiar status de venta
Route::post('cambiar-status/{id}',[
'as'=>'venta.cambiarstatus',
'uses'=>'VentaController@cambiarStatus'
	]);

Route::post('cambiar-status-web/{id}',[
'as'=>'venta.cambiarStatusWeb',
'uses'=>'VentaController@cambiarStatusWeb'
	]);

//detalle de la venta en una ventana modal
/*Route::get('listar-venta/detalle/{id}','VentaController@detalleVenta');
Route::post('listar-venta/detalle/{id}','VentaController@detalleVenta');*/
/*Route::post('listar-venta/detalle/{id}',[
'as'=>'venta.detalleVenta',
'uses'=>'VentaController@detalleVenta'
	]);
Route::get('listar-venta/detalle/{id}',[
'as'=>'venta.detalleVenta',
'uses'=>'VentaController@detalleVenta'
	]);*/
/*---------------VENTAS------------*/



/*---------------PRESUPUESTOS------------*/
Route::get('presupuesto-show','PresupuestoController@show');
//visualisa los productos para agregar
Route::get('presupuesto-addproducto','PresupuestoController@addproducto');
//al darle agregar a un producto a mi carrito , le mando el id de ese producto
Route::get('presupuesto-addtocart/{id}','PresupuestoController@add');
//eliminar carricato
Route::get('presupuesto-trash','PresupuestoController@trash');
//actualizar items
Route::get('presupuesto-update/{id}/{quantity}','PresupuestoController@update');
//eliminar productos del carrito
Route::get('presupuesto-delete/{id}','PresupuestoController@delete');
//chekout finalizar carrito
Route::post('presupuesto-checkout','PresupuestoController@checkout');
Route::get('presupuesto-checkout','PresupuestoController@checkout');
//cargar Cliente
Route::get('presupuesto-addcliente/','PresupuestoController@seleccionarCliente');
//mandamos id del cliente para almacenarlo en la sessio
Route::get('presupuesto-cliente/{id}','PresupuestoController@addCliente');
/*---------------PRESUPUESTOS------------*/
/*--------------------------------SECCION VENTAS------------------------------*/


/*--------------------------------SECCION COMPRAS------------------------------*/
//visualisa los productos para agregar
Route::get('compra-addproducto','CompraController@addproducto');
//al darle agregar a un producto a mi carrito , le mando el id de ese producto
Route::get('compra-addtocart/{id}','CompraController@add');
//mostrar
Route::get('compra-show','CompraController@show');
//eliminar carricato
Route::get('compra-trash','CompraController@trash');
//actualizar items
Route::get('compra-update/{id}/{quantity}','CompraController@update');
//eliminar productos del carrito
Route::get('compra-delete/{id}','CompraController@delete');
//chekout finalizar carrito
Route::post('compra-checkout','CompraController@checkout');
Route::get('compra-checkout','CompraController@checkout');
//listar Compras
Route::get('listar-compra/','CompraController@listarCompra');
//listar Compras WEB
Route::get('listar-compra-web/','CompraController@listarCompraWeb');
//cargar Cliente
Route::get('compra-addprovedor/','CompraController@seleccionarProvedor');
//mandamos id del cliente para almacenarlo en la sessio
Route::get('compra-provedore/{id}','CompraController@addProvedor');

Route::get('compra-detalle-pdf/{tipo}/{id}','CompraController@detalleCompraPdf');



//detalle de la venta en una ventana modal
/*Route::get('listar-venta/detalle/{id}','VentaController@detalleVenta');
Route::post('listar-venta/detalle/{id}','VentaController@detalleVenta');*/
/*Route::post('listar-venta/detalle/{id}',[
'as'=>'venta.detalleVenta',
'uses'=>'VentaController@detalleVenta'
	]);
Route::get('listar-venta/detalle/{id}',[
'as'=>'venta.detalleVenta',
'uses'=>'VentaController@detalleVenta'
	]);*/

/*--------------------------------SECCION COMPRAS------------------------------*/


/*--------------------------------SECCION LIQUIDACIONES------------------------------*/
//mostrar
Route::get('liquidacion-show','LiquidacionController@show');
//generar
Route::post('liquidacion-generar','LiquidacionController@generar');
//cargar usuario
Route::get('liquidacion-addusuario/','LiquidacionController@seleccionarUsuario');
//mandamos id del cliente para almacenarlo en la sessio
Route::get('liquidacion-usuario/{id}','LiquidacionController@addUsuario');
/*--------------------------------SECCION LIQUIDACIONES------------------------------*/





/*---------------menu------------*/
Route::resource('usuario','UsuarioController');
Route::delete('rubro/deletemultiple','RubroController@deleteMultiple');
Route::resource('rubro','RubroController');
Route::resource('ivatipo','IvatipoController');
Route::resource('marca','MarcaController');
Route::resource('puntos','PuntosController');
Route::get('puntos-seleccionar-usuario','PuntosController@seleccionarUsuario');
Route::get('puntos-agregar-usuario/{id}','PuntosController@addUsuario');
Route::get('puntos-agregar-puntos/{id}','PuntosController@AgregarPuntos');


Route::resource('producto','ProductoController');


//calcular precio del combo
Route::get('producto-calcular/{gabinete}/{mother}/{procesador}/{mouse}/{teclado}/{video}/{fuente}/{disco}/{memoria}','ProductoController@calcularCombo');
Route::post('producto-calcular/{gabinete}/{mother}/{procesador}/{mouse}/{teclado}/{video}/{fuente}/{disco}/{memoria}','ProductoController@calcularCombo');

//store combo pc
Route::get('producto-combo-pc','ProductoController@ComboPc');
Route::post('producto-combo-create','ProductoController@CreateComboPc');
//ver combo pc
Route::get('producto-combo-ver-{id}','ProductoController@VerComboPc');
//editar combo pc
Route::get('producto-combo-edit-{id}','ProductoController@EditComboPc');
//update combo pc
Route::put('producto-combo-update/{id}','ProductoController@UpdateComboPc');
//eliminar combo
//elimina al combo
Route::delete('producto-combo-delete/{id}','ProductoController@destroyCombo');

//pestañas
Route::get('producto-oferta','ProductoController@ProductosOferta');
Route::get('producto-stock-critico','ProductoController@StockCritico');
Route::get('producto-desabilitado','ProductoController@ProductoDesabilitado');
Route::get('producto-review','ProductoController@ProductoReview');
Route::get('producto-combo','ProductoController@ProductosCombo');

Route::get('producto-review/{slug}','ReviewsController@ReviewsVer');
Route::DELETE('producto-review-delete/{id}','ReviewsController@ReviewsDelete');
Route::get('producto-review-confirm/{id}','ReviewsController@ReviewsConfirm');
Route::get('producto-review-spam/{id}','ReviewsController@ReviewsSpam');

Route::resource('productoimagen','ProductoImagenController');


 //me devuelve las subcategorias al crear el prodcuto (select dinamico)
Route::get('ajax-subcategoria',function(){
	$cat_id = Input::get('cat_id');
	$subcategorias = categoriasub::where('categoria_id','=', $cat_id)->get();
	return Response::json($subcategorias);
});


/*porducto carga de imaganes*/
Route::get('producto-uploadimagen/{id}','ProductoImagenController@crear');
Route::post('producto-imagen/{id}',[
'as'=>'ProductoImagen.uploadFiles',
'uses'=>'ProductoImagenController@uploadFiles'
	]);
Route::delete('producto-destroyimagen/{id}',[
'as'=>'ProductoImagen.destroy',
'uses'=>'ProductoImagenController@destroy'
	]);
/*porducto carga de imaganes*/

Route::get('tags', function (Illuminate\Http\Request  $request) {
        $term = $request->term ?: '';
        $tags = Soft\Tag::where('nombre', 'like', $term.'%')->lists('nombre', 'id');
        $valid_tags = [];
        foreach ($tags as $id => $tag) {
            $valid_tags[] = ['id' => $id, 'text' => $tag];
        }
        return \Response::json($valid_tags);
    });

Route::resource('provedor','ProvedoreController');
Route::resource('cliente','ClienteController');
Route::resource('transporte','TransporteController');
Route::resource('venta','VentaController');
Route::resource('gasto','GastoController');
Route::resource('categoria','CategoriaController');
Route::resource('categoriasub','CategoriaSubController');


Route::get('tickets','TicketController@index');
Route::get('tickets-completados','TicketController@TicketCompletados');

Route::post('tickets-cambiar-status/{id}','TicketController@TicketCambiarStatus');
Route::get('tickets-responder/{id}','TicketController@TicketResponder');
Route::put('tickets-comentario/{id}','TicketController@TicketComentario');
/*---------------menu------------*/


/*---------------WEB CONFIG------------*/
Route::get('webconfig-carrucel','WebCarrucelController@index');
Route::resource('carrucel','WebCarrucelController');
Route::get('webconfig-carrucelmarcas','WebCarrucelMarcasController@index');
Route::resource('carrucelmarcas','WebCarrucelMarcasController');
Route::get('webconfig-footer','WebFooterController@ConfigFooter');
Route::resource('informacion','WebInformacionController');
Route::resource('facebook','WebFacebookController');
Route::resource('mercadopago','WebMercadoPagoController');
Route::get('webconfig-header','WebHeaderController@ConfigHeader');
Route::resource('logo','WebLogoController');
Route::resource('post','WebPostController');
/*---------------WEB CONFIG------------*/


/*---------------reportes Pdf------------*/
//agregado pdf
Route::get('reportes', 'PdfController@index');
Route::get('crear_reporte_porpais/{tipo}', 'PdfController@crear_reporte_porpais');
/*---------------reportes Pdf------------*/

/*--------------------------------REPORTES GRAFICAS------------------------------*/
Route::get('listado_graficas', 'GraficasController@index');
Route::get('grafica_registros/{anio}/{mes}', 'GraficasController@registros_mes');
Route::get('grafica_publicaciones', 'GraficasController@total_publicaciones');
/*--------------------------------REPORTES GRAFICAS------------------------------*/


/*---------------Excel import/export ------------*/
/*--------user --------*/
Route::get('/userExport','ExcelController@userExport');
Route::get('/userImport','ExcelController@userImport');
Route::post('/userImport','ExcelController@userImport');


/*---------------Excel import/export ------------*/


 });



Route::group(['middleware' =>['auth']], function () {
/*---------------CHECKOUT------------*/
Route::get('checkout-step-2','WebVentas@CheckoutStep2');
Route::get('checkout-step-3','WebVentas@CheckoutStep3');
Route::post('checkout-step-4',[
	'uses'=>'WebVentas@CheckoutStep4',
	'as'=>'WebVenta.step4'
	]);
Route::post('checkout-step-5',[
	'uses'=>'WebVentas@CheckoutStep5',
	'as'=>'WebVenta.step5'
	]);
Route::post('checkout-step-6',[
	'uses'=>'WebVentas@CheckoutStep6',
	'as'=>'WebVenta.step6'
	]);
Route::resource('pago','MercadoPagoController');
/*---------------CHECKOUT------------*/


/*---------------USER ACCOUNT------------*/
Route::resource('myaccount-edit','WebAccount@update');
Route::get('myaccount-perfil','WebAccount@MyAccount');
Route::get('myaccount-config','WebAccount@MyAccountConfig');
Route::get('myaccount-facturas','WebAccount@verFacturas');
Route::get('myaccount-detalle-pdf/{tipo}/{id}','WebAccount@detalleVentaPdf');
Route::get('myaccount-ticket','WebAccount@MyAccountTicket');
Route::get('myaccount-ticket-responder-{id}','WebAccount@MyAccountTicketResponder');
Route::put('myaccount-ticket-comentario/{id}','WebAccount@MyAccountTicketComentario');
Route::post('myaccount-ticket-crear','WebAccount@MyAccountTicketCrear');
//cuando crea desde la cuenta del user
Route::post('myaccount-datos-facturacion',[
	'uses'=>'WebAccount@DatosDeFacturacion',
	'as'=>'myaccount.DatosDeFacturacion'
	]);
//cuando edita desde la cuenta del user
Route::put('myaccount-edit-datos-facturacion/{id}',[
	'uses'=>'WebAccount@EditarFacturacion',
	'as'=>'myaccount.EditarFacturacion'
	]);
//cuando crea desde el checkout
Route::post('myaccount-datos-facturacion-checkout',[
	'uses'=>'WebAccount@DatosDeFacturacionCheckout',
	'as'=>'myaccount.DatosDeFacturacionCheckout'
	]);
//cuando edita desde el checkout
Route::put('myaccount-edit-datos-facturacion-checkout/{id}',[
	'uses'=>'WebAccount@EditarFacturacionCheckout',
	'as'=>'myaccount.EditarFacturacionCheckout'
	]);
/*---------------USER ACCOUNT------------*/



/*---------------menu WEB------------*/


/*---------------login------------*/
//sistema de logue para laravel 5.2
Route::auth();
//para redireccionar si ya esta logueado y trata de entrar al login
Route::get('logged', 'LoginController@logged');
Route::get('login-redirect', 'LoginController@LoginRedirect');


/*---------------login------------*/










/*
Route::get('contacto','FrontController@contacto');
Route::get('reviews','FrontController@reviews');
Route::get('password/email','Auth\PasswordController@getEmail');
Route::post('password/email','Auth\PasswordController@getEmail');

//sistema de logue para laravel 5.2
Route::auth();


Route::resource('mail','MailController');
//para redireccionar si ya esta logueado y trata de entrar al login
Route::get('logged', 'LoginController@index');

//enrutado ressfull

Route::resource('genero', 'GeneroController');
Route::resource('pelicula', 'PeliculaController');


//ADMINISTRADOR

//el auth es un middleware que significa que solo puede acceder a la ruta si esta logueado
//y el middleware es el que nosotros creamos para cada ruta espesifica
Route::group(['middleware'=>['guest']], function(){


});
*/
});
