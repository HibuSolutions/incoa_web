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
Route::get('editarPerfil', 'RutasController@editarPerfil')->name('editarPerfil');
Route::post('actualizarPerfil', 'RutasController@actualizarPerfil')->name('actualizarPerfil');
Route::post('nuevoReporte', 'ReporteController@nuevoReporte')->name('nuevoReporte');
Route::get('verNoticia/{id}','RutasController@verNoticia')->name('verNoticia');
Route::get('verNotas','RutasController@verNotas')->name('verNotas');
Route::post('estudianteNotas','Controller@estudianteNotas')->name('estudianteNotas');
Route::get('deleteMy','Controller@delete')->name('deleteMy');
Route::get('desarrolladores',function(){
	return view('desarrolladores');
});

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
Route::post('crear/{id}','ComentarioController@crear');
Route::delete('deleteComentario/{id}','ComentarioController@eliminar');
Route::get('comentarios','ComentarioController@index')->name('comentarios');
////////////gestion de notas
Route::get('estudiantes','RutasController@estudiantes')->name('estudiantes');
Route::get('aggNota/{id}','RutasController@aggNota');
Route::get('editNota/{id}','RutasController@modificarNota');
Route::get('activarC/{id}','RutasController@activarCiclo');
Route::get('terminarC/{id}','RutasController@cicloTerminado');
Route::post('editarC/{id}','RutasController@editarCiclo');
Route::get('seccion','RutasController@seccion')->name('seccion');
Route::post('crearSeccion','RutasController@crearSeccion')->name('crearSeccion');
Route::get('supenderS/{id}','RutasController@desactivarSeccion');
Route::get('deleteS/{id}','RutasController@eliminarSeccion');
Route::post('crearNivel','NivelController@crear')->name('crearNivel');
Route::get('eliminarN/{id}','NivelController@delete');
Route::post('editarNivel/{id}','NivelController@edit');
Route::get('suspenderNivel/{id}','NivelController@desactivarNivel');
Route::resource('historial','HistorialController');
Route::get('culminar/{id}','RutasController@culminar');
Route::get('eliminarHistorial/{id}','RutasController@eliminarHistorial');
Route::get('honores/{id}','RutasController@honores');
Route::post('honoresControl/{id}','RutasController@honoresControl');


////////////reportes PDF y EXCEL/////////////////////



});
Route::get('imprimir/{id}','Controller@imprimir');
