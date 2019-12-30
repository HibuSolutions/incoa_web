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


Auth::routes();
////////////////vistas usuario
Route::get('/', 'RutasController@index')->name('inicio');
Route::get('miperfil', 'RutasController@miPerfil')->name('miperfil');
Route::get('editarPerfi', 'RutasController@editarPerfil')->name('editarPerfil');
Route::post('actualizarPerfil', 'RutasController@actualizarPerfil')->name('actualizarPerfil');
Route::post('nuevoReporte', 'ReporteController@nuevoReporte')->name('nuevoReporte');
Route::get('verNoticia/{id}','RutasController@verNoticia')->name('verNoticia');


////////////////vistas admin


Route::group(['middleware' => ['role:administrador|docente']], function () {
Route::get('panelAdministrativo', 'RutasController@panel')->name('panelAdministrativo');
Route::get('usuarios', 'RutasController@usuariosPanel')->name('usuarios');
Route::get('crearPerfil', 'RutasController@crearPerfil')->name('crearPerfil');
Route::post('agregarUsuario', 'RutasController@agregarUsuario')->name('agregarUsuario');
Route::get('verPerfil/{id}','RutasController@verPerfil');
Route::get('editPerfil/{id}','RutasController@editPerfil');
Route::post('updatedPerfil/{id}','RutasController@updatedPerfil');
Route::delete('deletePerfil/{id}','RutasController@deletePerfil');
Route::resource('aviso','AvisoController');
Route::get('reporte','ReporteController@index')->name('reporte');
Route::delete('deleteReporte/{id}','ReporteController@eliminar');
Route::get('verReporte/{id}','ReporteController@ver');
Route::resource('noticia','NoticiaController');
    
});
