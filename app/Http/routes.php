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

Route::group(['middleware' => 'web'], function () {
    
    Route::get('/','FrontController@admin');
   Route::get('welcome','FrontController@welcome');

   Route::get('home','HomeController@index');
 
});

Route::group(array('middleware' => 'auth'), function(){
    Route::controller('filemanager', 'FilemanagerLaravelController');
});


Route::group(['middleware' => 'auth'], function () {

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
//cargar Cliente
Route::get('venta-addcliente/','VentaController@seleccionarCliente');
//mandamos id del cliente para almacenarlo en la sessio
Route::get('venta-cliente/{id}','VentaController@addCliente');

Route::get('venta-detalle-pdf/{tipo}/{id}','VentaController@detalleVentaPdf');

//cambiar status de venta
Route::get('cambiar-status/','VentaController@cambiarStatus');
Route::post('cambiar-status/','VentaController@cambiarStatus');

Route::post('cambiar-status/{id}',[
'as'=>'venta.cambiarStatus',
'uses'=>'VentaController@cambiarStatus'
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


/*---------------menu------------*/
Route::resource('usuario','UsuarioController');
Route::delete('rubro/deletemultiple','RubroController@deleteMultiple');
Route::resource('rubro','RubroController');
Route::resource('ivatipo','IvatipoController');
Route::resource('marca','MarcaController');
Route::resource('producto','ProductoController');
Route::resource('provedor','ProvedoreController');
Route::resource('cliente','ClienteController');
Route::resource('transporte','TransporteController');
Route::resource('venta','VentaController');
Route::resource('gasto','GastoController');
Route::resource('categoria','CategoriaController');
Route::resource('categoriasub','CategoriaSubController');
/*---------------menu------------*/
/*---------------menu WEB------------*/
Route::get('webconfig-carrucel','WebCarrucelController@index');
Route::resource('carrucel','WebCarrucelController');

Route::get('webconfig-carrucelmarcas','WebCarrucelMarcasController@index');
Route::resource('carrucelmarcas','WebCarrucelMarcasController');

Route::get('webconfig-footer','WebFooterController@ConfigFooter');
Route::resource('informacion','WebInformacionController');
Route::resource('facebook','WebFacebookController');

Route::get('webconfig-header','WebHeaderController@ConfigHeader');
Route::resource('logo','WebLogoController');

Route::resource('post','WebPostController');

Route::get('blog','PaginasController@post');
Route::get('blogdetail-post{id}',[
'as'=>'paginas.postDetalle',
'uses'=>'PaginasController@postDetalle'
	]);
/*---------------menu WEB------------*/
/*---------------login------------*/
//sistema de logue para laravel 5.2
Route::auth();
//para redireccionar si ya esta logueado y trata de entrar al login
Route::get('logged', 'LoginController@index');
/*---------------login------------*/


/*---------------reportes Pdf------------*/
//agregado pdf
Route::get('reportes', 'PdfController@index');
Route::get('crear_reporte_porpais/{tipo}', 'PdfController@crear_reporte_porpais');
/*---------------reportes Pdf------------*/


/*---------------Excel import/export ------------*/
/*--------user --------*/
Route::get('/userExport','ExcelController@userExport');
Route::get('/userImport','ExcelController@userImport');
Route::post('/userImport','ExcelController@userImport');


/*---------------Excel import/export ------------*/







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
