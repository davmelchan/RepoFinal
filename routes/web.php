<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::view('/administrador','Administrador/admin');

Route::view('/unidades','Administrador/unidades');
Route::view('/aspectoevaluacion','Administrador/AspectosEvaluacion');
Route::view('/valoracion','Administrador/valoracion');
Route::view('/empresa','Administrador/empresa');
Route::view('/genero','Administrador/genero');
Route::view('/rol','Administrador/rol');


/*
 * Maestro  view
 * */
Route::view('/maestro','Maestro/maestro');
Route::view('/alumnosgrupo','Maestro/subpage/alumnosgrupo');
Route::view('/evidencia','Maestro/evidencia');
Route::view('/alumnoevidencia','Maestro/subpage/alumnoevidencia');
Route::view('/archivos','Maestro/subpage/archivo');

