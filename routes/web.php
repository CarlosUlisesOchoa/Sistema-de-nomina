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

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mis-nominas', 'HomeController@myPaysheets')->name('mis-nominas');

Route::get('/mi-nomina/{id}', 'HomeController@showMyPaysheet');

Route::get('/mi-perfil', 'HomeController@profile')->name('profile');

Route::patch('/actualizar-perfil', 'HomeController@updateProfile')->name('update-profile');

/* Admin system */
Route::get('/admin', 'AdminController@admin')->name('admin');

Route::get('/empleados/{id}/baja', 'EmpleadosController@darBaja');

Route::get('/empleados/{id}/reactivacion', 'EmpleadosController@reactivar');

Route::resource('empleados', 'EmpleadosController');

Route::get('/areas/{id}/borrar', 'AreasController@delete');

Route::resource('areas', 'AreasController');

Route::get('/puestos/{id}/borrar', 'PuestosController@delete');

Route::resource('puestos', 'PuestosController');

Route::get('/tipos-nomina/{id}/borrar', 'TiposNominaController@delete');

Route::resource('tipos-nomina', 'TiposNominaController');

Route::get('/tipos-contrato/{id}/borrar', 'TiposContratoController@delete');

Route::resource('tipos-contrato', 'TiposContratoController');

Route::get('/nomina/{id}/borrar', 'NominaController@delete');

Route::get('/nomina/generar/{id_Empleado}', 'NominaController@generar');

Route::resource('nomina', 'NominaController');