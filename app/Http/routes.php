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

Route::get('/','FrontController@index');
Route::get('admin','FrontController@admin');

Route::resource('usuario','UsuarioController');
//Route::resource('cliente','ClienteController');
Route::resource('rubro','RubroController');
Route::resource('ivatipo','IvatipoController');
Route::resource('marca','MarcaController');
Route::resource('producto','ProductoController');
Route::resource('provedor','ProvedoreController');
Route::resource('cliente','ClienteController');
Route::resource('transporte','TransporteController');
//sistema de logue para laravel 5.2
Route::auth();
//para redireccionar si ya esta logueado y trata de entrar al login
Route::get('logged', 'LoginController@index');


//agregado pdf
Route::get('reportes', 'PdfController@index');
Route::get('crear_reporte_porpais/{tipo}', 'PdfController@crear_reporte_porpais');
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

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/admin', 'HomeController@index');
 
});