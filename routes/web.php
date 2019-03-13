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

/* Admin system */
Route::get('/admin', 'AdminController@admin')    
    ->middleware('is_admin')    
    ->name('admin');

Route::get('/empleados/{id}/baja', 'EmpleadosController@darBaja')    
    ->middleware('is_admin');

Route::get('/empleados/{id}/reactivacion', 'EmpleadosController@reactivar')    
    ->middleware('is_admin');

Route::resource('empleados', 'EmpleadosController')    
    ->middleware('is_admin');

Route::get('/areas/{id}/borrar', 'AreasController@delete')    
    ->middleware('is_admin');

Route::resource('areas', 'AreasController')    
    ->middleware('is_admin');

Route::get('/puestos/{id}/borrar', 'PuestosController@delete')    
    ->middleware('is_admin');

Route::resource('puestos', 'PuestosController')    
    ->middleware('is_admin');

Route::get('/tipos-nomina/{id}/borrar', 'TiposNominaController@delete')    
    ->middleware('is_admin');

Route::resource('tipos-nomina', 'TiposNominaController')    
    ->middleware('is_admin');

Route::get('/nomina/{id}/borrar', 'NominaController@delete')    
    ->middleware('is_admin');

Route::resource('nomina', 'NominaController')    
    ->middleware('is_admin');