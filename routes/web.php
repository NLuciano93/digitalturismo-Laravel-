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
Route::post('/contacto', 'MensajesController@store');

##################   ADMIN   ##############
Route::view('/adminInicio', 'adminInicio')->middleware('auth', 'validarAdmin');
/*************  USUARIOS ***********/ 
Route::get('/adminUsuarios', 'UsuariosController@index')->middleware('auth', 'validarAdmin');
Route::get('/borrarUsuario/{id}', 'UsuariosController@destroy')->middleware('auth', 'validarAdmin');
/*Route::post('/busquedaUsuarios', 'UsuariosController@busquedaUsuarioAdmin')->middleware('auth', 'validarAdmin');*/
Route::post('/agregarFavorito', 'UsuariosController@agregarFav');
Route::post('/quitarFavorito', 'UsuariosController@quitarFav');
Route::post('/quitarFavoritoUser', 'UsuariosController@quitarFavUser');

/********************* COMENTARIOSS *******************/
Route::view('/comentario', 'comentario');
Route::post('/comentario', 'UsuariosController@agregarComentario');
Route::get('/verComentarios', 'DestinosController@verComentarios');
Route::get('/verTodosComentarios', 'ComentariosController@todosComentarios');
Route::get('/verComentariosDestino/{id}', 'DestinosController@verComentarios');

/********************* DESTINOS *******************/
/*---------------------ADMIN---------------------------*/
Route::get('/adminDestinos', 'DestinosController@index')->middleware('auth', 'validarAdmin');
Route::get('/destinoAlta', 'DestinosController@create')->middleware('auth', 'validarAdmin');
Route::post('/destinoAlta', "DestinosController@store")->middleware('auth', 'validarAdmin');
Route::post('/destinoMod', "DestinosController@update")->middleware('auth', 'validarAdmin');
Route::get('/destinoMod/{id}', 'DestinosController@edit')->middleware('auth', 'validarAdmin');
Route::get('/borrarDestino/{id}', 'DestinosController@destroy')->middleware('auth', 'validarAdmin');
Route::post('/busquedaDestinos', 'DestinosController@busquedaDestinoAdmin');


/*---------------------usuariocomun-----------------------*/

Route::get('/verDestino/{id}', 'DestinosController@verComentarios')->middleware('auth');
Route::get('/verTodosLosDestinos', 'DestinosController@verTodosLosDestinos');
Route::get('/destinos', 'DestinosController@pagDestinos');
Route::get('/detalleDestino/{id}', 'DestinosController@detalleDestino')->middleware('auth');
Route::post('busDestinosUser', 'DestinosController@busDestinosUser');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user', 'UsuariosController@perfilUsuario');
Route::post('/usuarioActualizado','UsuariosController@actualizarDatos');
Route::post('/passActualizar','UsuariosController@actualizarPass');
/**-------------------------------CARRITO----------------------- */
Route::get('/agregarCarrito/{id}', 'DestinosController@agregarCarrito');