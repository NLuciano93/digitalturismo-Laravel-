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

Route::get('/', 'DestinosController@inicio');
Route::view('/faq', 'faq');

##################   ADMIN   ##############
Route::view('/adminInicio', 'adminInicio')->middleware('auth', 'validarAdmin');
/*************  USUARIOS ***********/ 
Route::get('/adminUsuarios', 'UsuariosController@index')->middleware('auth', 'validarAdmin');
Route::get('/borrarUsuario/{id}', 'UsuariosController@destroy')->middleware('auth', 'validarAdmin');
Route::post('/agregarFavorito', 'UsuariosController@agregarFav');
Route::post('/quitarFavorito', 'UsuariosController@quitarFav');
Route::view('/comentario', 'comentario');
Route::post('/comentario', 'UsuariosController@agregarComentario');
/********************* DESTINOS *******************/

Route::get('/adminDestinos', 'DestinosController@index')->middleware('auth', 'validarAdmin');
Route::get('/destinoAlta', 'DestinosController@create')->middleware('auth', 'validarAdmin');
Route::post('/destinoAlta', "DestinosController@store")->middleware('auth', 'validarAdmin');
Route::post('/destinoMod', "DestinosController@update")->middleware('auth', 'validarAdmin');
Route::get('/destinoMod/{id}', 'DestinosController@edit')->middleware('auth', 'validarAdmin');
Route::get('/borrarDestino/{id}', 'DestinosController@destroy')->middleware('auth', 'validarAdmin');
Route::get('/verDestino/{id}', 'DestinosController@verComentarios');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
