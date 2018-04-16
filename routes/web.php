<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'UserController@index');


//GESTION DE USUARIOS
Route::get('/Registro', function () {
    return view('usuarios.register');
});
Route::post('/register', 'UserController@registro');
Route::get('/Login', function () {
    return view('usuarios.login');
});
Route::get('/Logout', 'UserController@logout');
//Route::get('/Profile', 'UserController@profile');
Route::get('/confirmacion/{codigo}', 'UserController@confirmacion');

//OTROS
Route::get('/Noticias/ICOs', 'PostController@index1');
Route::get('/Noticias/Analisis', 'PostController@index2');
Route::get('/Noticias/Noticias', 'PostController@index3');
Route::get('/Noticias/{from}/{slug}', 'PostController@show');

Route::get('/Academia/Trading', 'PostController@trading');
Route::get('/Academia/Mineria', 'PostController@mineria');

Route::get('/Academia/Descargas', 'PublicController@descargas');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::get('/Signals', 'SignalController@index');

Route::get('/Foro', 'ForoController@index');
Route::get('/Foro/{id}', 'ForoController@mostrar');
Route::post('/Foro', 'ForoController@nuevo');
Route::post('/Foro/{id}', 'ForoController@comentar');


Route::get('/hora', 'UserController@hora');

Route::get('/Videos', 'PublicController@video');

Route::get('/Descarga/{archivo}', 'PublicController@descargaArchivo');

?>