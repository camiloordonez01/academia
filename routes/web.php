<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/perfil', function () {
    return view('configuracion/perfil');
});

/*--Rutas Administrativas--*/

//Bienvenido
Route::get('administrador', function() {
    if(Auth::user()){
        return view('administrador/bienvenido', ['nombre' => Auth::user()->name]);
    }else{
        return redirect('/login');
    }
});

//Perfil
Route::resource('administrador/perfil','PerfilAdminController');
Route::post('administrador/perfil/resetPassword', 'PerfilAdminController@resetPassword');
//Temas
Route::resource('administrador/test/temas','TemasController');


//Preguntas
Route::resource('administrador/test/preguntas','PreguntasController');
Route::post('administrador/test/preguntas/load', 'PreguntasController@load');

//Comentarios
Route::get('administrador/comentarios','ComentariosController@index');

//excel
Route::get('administrador/test/import_excel', 'ImportExcelController@index');
Route::post('administrador/test/import', 'ImportExcelController@import');

//Documentos
Route::resource('administrador/documentos','DocumentosController');

//Usuarios
Route::resource('administrador/usuarios', 'UsuariosController');
/*....................*/

/*--Rutas Cliente--*/
Route::get('control', function() {
    if(Auth::user()){
        return redirect('/control/estadisticas');
    }else{
        return redirect('/login');
    }
});
//Bienvenido
Route::get('control/estadisticas','EstadisticasController@index');
Route::get('control/estadisticas/chat','EstadisticasController@chat');
Route::post('control/estadisticas','EstadisticasController@resetear');


//Ranking
Route::resource('control/ranking','RankingController');

//Test
Route::get('control/test', 'TestController@index');
Route::post('control/quiz', 'TestController@generarTest');
Route::post('control/quiz/save', 'TestController@saveQuestion');
Route::post('control/quiz/comentario', 'TestController@comentarioQuestion');

//Documentos
Route::get('control/documentos', 'DocumentosViewController@index');

//Perfil
Route::get('control/perfil','PerfilPanelController@index');
Route::post('control/perfil/resetPassword', 'PerfilPanelController@resetPassword');

//Preguntas comentadas
Route::get('control/comentadas','PreguntasComentadas@index');

//Pregunta impugnada
Route::get('control/impugnar/{id}', 'ImpugnarController@index');
Route::post('control/impugnar', 'ImpugnarController@enviar');
/*....................*/


Auth::routes(["register" => false]);
Route::get('/home', 'HomeController@index')->name('home');


