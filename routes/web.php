<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
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


/*Route::get('/', function () {
    return view('login');
});*/

Route::post('/',[LoginController::class,'login']);
Route::view('/','login')->middleware('guest')->name('login');

/*
 Vistas del rol de administrador

 */
/*
Route::get('/administrador',function(){
    $rol = session('rol');
    return view('Administrador/admin',['rol' => $rol]);

})->middleware('auth');
*/
Route::view('/','login')->middleware('guest')->name('login');



Route::post('/administrador',[AdminController::class,'logout'])->middleware('Auth');
Route::view('/administrador','Administrador/admin')->middleware('auth');

Route::view('/unidades','Administrador/unidades');
Route::view('/aspectoevaluacion','Administrador/AspectosEvaluacion');
Route::view('/valoracion','Administrador/valoracion');
Route::view('/empresa','Administrador/empresa');
Route::view('/genero','Administrador/genero');
Route::view('/rol','Administrador/rol');

Route::get('/recargar',function(){
    return Redirect::back();
   });


/*
 * Maestro  view
 * */
Route::view('/maestro','Maestro/maestro');
Route::view('/alumnosgrupo','Maestro/subpage/alumnosgrupo');
Route::view('/evidencia','Maestro/evidencia');
Route::view('/alumnoevidencia','Maestro/subpage/alumnoevidencia');
Route::view('/archivos','Maestro/subpage/archivo');
Route::view('/evaluacionasignada','Maestro/evaluacionasignada');
Route::view('/asignacion','Maestro/subpage/asignadas');

