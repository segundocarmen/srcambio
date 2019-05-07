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


Route::get('/', 'SystemController@ShowSystem');
Route::get('/ayuda', 'SystemController@ShowSystem');
Route::get('/contacto', 'SystemController@ShowSystem');
Route::get('/login', 'SystemController@ShowSystem')->name('login');
//$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
Auth::routes();

Route::post('/Logearse', 'LoginController@Logearse');
Route::get('/logout', 'LoginController@Logout');
Route::get('/GetCambio', 'SystemController@GetCambio');
Route::get('/IsLoged', 'SystemController@IsLoged');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cambiar', 'SystemController@ShowSystem')->middleware('auth');
Route::post('/SaveTransferenciaStep1','TransaccionController@SaveTransferenciaStep1')->middleware('auth');
Route::get('/transferencia', 'SystemController@ShowSystem')->middleware('auth');

Route::post('/CancelarOperacion', 'TransaccionController@CancelarOperacion')->middleware('auth');
Route::post('/SaveCodigoVerificacion', 'TransaccionController@SaveCodigoVerificacion')->middleware('auth');

Route::get('/verificando', 'SystemController@ShowSystem')->middleware('auth');
Route::get('/verificacion-enviada', 'SystemController@ShowSystem')->middleware('auth');
Route::get('/datos-de-cuenta', 'SystemController@ShowSystem')->middleware('auth');
Route::get('/cuentas-bancarias', 'SystemController@ShowSystem')->middleware('auth');
Route::get('/historial', 'SystemController@ShowSystem')->middleware('auth');

Route::get('/GetDatosCambiar', 'TransaccionController@GetDatosCambiar')->middleware('auth');
Route::get('/GetDatosTransferencia', 'TransaccionController@GetDatosTransferencia')->middleware('auth');