<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MaestroController;
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

Route::post('/',[LoginController::class,'login'])->middleware('guest');

/*
 Vistas del rol de administrador

 */
/*
Route::get('/administrador',function(){
    $rol = session('rol');
    return view('Administrador/admin',['rol' => $rol]);

})->middleware('auth');
*/
Route::view('/','login')->name('login');


;


Route::middleware(['Roles', 'cache.headers:private'])->group(function () {
    Route::view('/administrador','Administrador/admin');
    Route::post('/salir',[AdminController::class,'logout'])->name('salir');
    Route::view('/unidades','Administrador/unidades');
    Route::view('/aspectoevaluacion','Administrador/AspectosEvaluacion');
    Route::view('/valoracion','Administrador/valoracion');
    Route::view('/empresa','Administrador/empresa');
    Route::view('/genero','Administrador/genero');
    Route::get('/rol',[AdminController::class,'index'])->name('rol');
    Route::post('/rol',[AdminController::class,'GuardarRol'])->name('SaveRol');
    Route::delete('/rol/{IdRol}', [AdminController::class, 'destroy'])->name('rol.destroy');

});

///Session::get('rol');








/*
 * Maestro  view
 * */
Route::middleware(['maestro', 'cache.headers:private'])->group(function(){
    Route::view('/maestro','Maestro/maestro');
    Route::post('/logout',[MaestroController::class,'logoutMaestro'])->name('logoutDocente');
    Route::view('/alumnosgrupo','Maestro/subpage/alumnosgrupo');
    Route::view('/evidencia','Maestro/evidencia');
    Route::view('/alumnoevidencia','Maestro/subpage/alumnoevidencia');
    Route::view('/archivos','Maestro/subpage/archivo');
    Route::view('/evaluacionasignada','Maestro/evaluacionasignada');
    Route::view('/asignacion','Maestro/subpage/asignadas');
});





