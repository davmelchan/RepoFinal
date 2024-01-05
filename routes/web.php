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
    //Crud maestros
    Route::get('/administrador',[AdminController::class,'indexMaestro']);
    Route::post('/administrador',[AdminController::class,'SaveMaestro']);
    Route::delete('/administrador/{id}',[AdminController::class,'EliminarMaestro'])->name("teacher.destroy");

    //Crud estudiantes
    Route::get('/estudiante',[AdminController::class,'indexEstudiante']);
    Route::post('/estudiante',[AdminController::class,'GuardarEstudiante']);
    Route::delete('/estudiante/{id}',[AdminController::class,'EliminarEstudiante'])->name("student.destroy");

    Route::post('/salir',[AdminController::class,'logout'])->name('salir');



    Route::view('/empresa','Administrador/empresa');

    ///Crud Empresa
    Route::get('/empresa',[AdminController::class,'indexEmpresa']);
    Route::post('/empresa',[AdminController::class,'GuardarEmpresa']);
    Route::delete('/empresa/{id}',[AdminController::class,'EliminarEmpresa'])->name('empresa.destroy');



    ////Crud de unidades
    Route::get('/unidades',[AdminController::class,'indexUnidad']);
    Route::post('/unidades',[AdminController::class,'GuardarUnidad']);
    Route::delete('/unidades/{id}',[AdminController::class,'EliminarUnidad'])->name('unidad.destroy');

    ////Crud del genero
    Route::get('/genero',[AdminController::class,'indexGenero'])->name('genero');
    Route::post('/genero',[AdminController::class,'GuardarGenero'])->name('SaveGenero');
    Route::delete('/genero/{id}', [AdminController::class, 'EliminarGenero'])->name('genero.destroy');


    ////Crud del rol
    Route::get('/rol',[AdminController::class,'indexRol'])->name('rol');
    Route::post('/rol',[AdminController::class,'GuardarRol'])->name('SaveRol');
    Route::delete('/rol/{id}', [AdminController::class, 'destroy'])->name('rol.destroy');

    ////Crud de categoria evaluacion
    Route::get('/categoriaEvaluacion',[AdminController::class,'indexEvaluacion']);
    Route::post('/categoriaEvaluacion',[AdminController::class,'GuardarEvaluacion']);
    Route::delete('/categoriaEvaluacion/{id}',[AdminController::class,'EliminarEvaluacion'])->name("catevaluacion.destroy");

    ///Crud de categoria supervision
    Route::get('/categoriaSupervision',[AdminController::class,'indexSupervision']);
    Route::post('/categoriaSupervision',[AdminController::class,'GuardarCatSupervision']);
    Route::delete('/categoriaSupervision/{id}',[AdminController::class,'EliminarCatSupervision'])->name('supervision.destroy');

});

///Session::get('rol');








/*
 * Maestro  view
 * */
Route::middleware(['maestro', 'cache.headers:private'])->group(function(){
    Route::get('/maestro',[MaestroController::class,'indexGrupo']);
    Route::post('/maestro',[MaestroController::class,'GuardarGrupoMaestro'])->name('GrupoSave');
    Route::delete('/maestro/{id}',[MaestroController::class,'GrupoEliminar'])->name('Grupodelete');

    Route::get('/evaluacionasignada',[MaestroController::class,'indexEvaluaciones']);
    Route::get('/asignacion/{id}',[MaestroController::class,'indexasignaciones']);
    Route::post('/asignacion/{id}/guardar',[MaestroController::class,'GuardarEvaluaciones'])->name('AsignacionSave');
    Route::delete('/asignacion/{id}',[MaestroController::class,'EvaluacionEliminar']);

    Route::post('/logout',[MaestroController::class,'logoutMaestro'])->name('logoutDocente');
    Route::view('/alumnosgrupo','Maestro/subpage/alumnosgrupo');
    Route::view('/evidencia','Maestro/evidencia');
    Route::view('/alumnoevidencia','Maestro/subpage/alumnoevidencia');
    Route::view('/archivos','Maestro/subpage/archivo');


});

Route::view('/EstudianteView','Estudiante/index');
Route::view('/EstudianteSupervision','Estudiante/indexsupervision');
Route::view('/EstudianteEvidencia','Estudiante/estudianteEvidencia');





