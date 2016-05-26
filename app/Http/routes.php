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
    
    Route::get('/','FrontController@index');
   Route::get('welcome','FrontController@welcome');
 
});

Route::group(['middleware' => 'web'], function () {

 Route::get('/admin', 'HomeController@index');
 Route::get('usuario/perfil','UsuarioController@perfil');


/*
Route::get('venta-addcart','VentaController@addcart');
Route::post('venta-addcart','VentaController@addcart');
//visualisa los productos para agregar
Route::get('venta-addproducto','VentaController@addproducto');
//al darle agregar a un producto a mi carrito , le mando el id de ese producto
Route::get('venta-addtocart/{id}','VentaController@add');
Route::get('cart/checkout','VentaController@checkout');
//eliminar objetos de productosadds al hacer el chekout
Route::get('venta-cart-destroy','VentaController@destroy');
//eliminar un item del carrito
Route::get('venta-item-destroy','VentaController@deleteitem');
Route::get('venta-cart','VentaController@cart');
Route::get('show-my-cart','VentaController@showMyCart');*/

/*---------------carrito------------*/
//mostrar
Route::get('cart-show','VentaController@show');
//eliminar carricato
Route::get('cart-trash','VentaController@trash');
//actualizar items
Route::get('cart-update/{id}/{quantity}','VentaController@update');
//eliminar productos del carrito
Route::get('cart-delete/{id}','VentaController@delete');
//chekout finalizar carrito
Route::get('cart-checkout','VentaController@checkout');
/*---------------carrito------------*/


/*---------------menu------------*/
Route::resource('usuario','UsuarioController');
Route::resource('rubro','RubroController');
Route::resource('ivatipo','IvatipoController');
Route::resource('marca','MarcaController');
Route::resource('producto','ProductoController');
Route::resource('provedor','ProvedoreController');
Route::resource('cliente','ClienteController');
Route::resource('transporte','TransporteController');
Route::resource('venta','VentaController');
/*---------------menu------------*/


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
