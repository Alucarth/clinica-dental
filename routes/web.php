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
Route::group(['middleware' => 'auth'], function () {
   

    Route::resource('pacientes','PacienteController');
    Route::resource('odontologos','OdontologoController');
    Route::resource('tratamientos','TratamientoController');
    // Route::resource('citas','CitaController');
    // Route::resource('odontograma','OdontogramaController');
    
    Route::get('/home', 'HomeController@index');
    
    Route::get('paciente/historial/{id}','PacienteController@historial');
    
    Route::get('paciente/odontograma/{id}','PacienteController@odontograma');
    Route::get('paciente/anamnesis/{id}','PacienteController@anamnesis');
    Route::get('paciente/pagos/{id}','PacienteController@pagos');
    
    Route::get('paciente/tratamientos/{id}','TratamientoController@tratamientos');
    Route::get('paciente/tratamientos/crear/{id}','TratamientoController@crear');
    // Route::post('anamnesis','PacienteController@storeAnamnesis');
    // Route::post('tratamientos','PacienteController@storeTratamientos');
    // Route::post('pagos','PacienteController@storePagos');
    
    
    //reportes rutas
    
    Route::get('reporte_historial/{id}','PacienteController@reporte_historial');
    
    
});
    
