<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EstudianteController;
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



Route::middleware(['Comprobar', 'cache.headers:private'])->group(function () {

    //Crud maestros
    Route::get('/administrador',[AdminController::class,'indexMaestro'])->name('Administrador.Ver.Maestro');
    Route::post('/administrador',[AdminController::class,'SaveMaestro'])->name('SaveTeacher');
    Route::delete('/administrador/{id}',[AdminController::class,'EliminarMaestro'])->name("teacher.destroy");

    //Crud estudiantes
    Route::get('/estudiante',[AdminController::class,'indexEstudiante'])->name('Administrador.Ver.Estudiante');
    Route::post('/estudiante',[AdminController::class,'GuardarEstudiante'])->name('SaveStudent');
    Route::delete('/estudiante/{id}',[AdminController::class,'EliminarEstudiante'])->name("student.destroy");






    ///Crud Empresa
    Route::get('/empresa',[AdminController::class,'indexEmpresa'])->name('Administrador.Ver.CentroPractica');
    Route::post('/empresa',[AdminController::class,'GuardarEmpresa'])->name('SaveCompany');
    Route::delete('/empresa/{id}',[AdminController::class,'EliminarEmpresa'])->name('empresa.destroy');



    ////Crud de unidades
    Route::get('/unidades',[AdminController::class,'indexUnidad'])->name('Administrador.Ver.Unidad');
    Route::post('/unidades',[AdminController::class,'GuardarUnidad'])->name('Adminstrador.Guardar.Unidad');
    Route::delete('/unidades/{id}',[AdminController::class,'EliminarUnidad'])->name('unidad.destroy');

    ////Crud del genero
    Route::get('/genero',[AdminController::class,'indexGenero'])->name('Administrador.Ver.Genero');
    Route::post('/genero',[AdminController::class,'GuardarGenero'])->name('SaveGenero');
    Route::delete('/genero/{id}', [AdminController::class, 'EliminarGenero'])->name('genero.destroy');


    ////Crud del rol
    Route::get('/rol',[AdminController::class,'indexRol'])->name('Administrador.Ver.Rol');
    Route::post('/rol',[AdminController::class,'GuardarRol'])->name('SaveRol');
    Route::delete('/rol/{id}', [AdminController::class, 'destroy'])->name('rol.destroy');

    ///Crud de permisos



    ////Crud de categoria evaluacion
    Route::get('/categoriaEvaluacion',[AdminController::class,'indexEvaluacion'])->name('Administrador.Ver.CategoriaEvaluacion');
    Route::post('/categoriaEvaluacion',[AdminController::class,'GuardarEvaluacion'])->name('Administrador.Guardar.CategoriaEvaluacion');
    Route::delete('/categoriaEvaluacion/{id}',[AdminController::class,'EliminarEvaluacion'])->name("catevaluacion.destroy");

    ///Crud de categoria supervision
    Route::get('/categoriaSupervision',[AdminController::class,'indexSupervision'])->name('Administrador.Ver.CategoriaSupervision');
    Route::post('/categoriaSupervision',[AdminController::class,'GuardarCatSupervision'])->name('Administrador.Guardar.CategoriaSupervision');
    Route::delete('/categoriaSupervision/{id}',[AdminController::class,'EliminarCatSupervision'])->name('supervision.destroy');

//////////////////////////////////VISTAS MAESTRO//////////////////////////////////////
    Route::get('/maestro',[MaestroController::class,'indexGrupo'])->name('Maestro.Ver.Grupo');
    Route::post('/maestro',[MaestroController::class,'GuardarGrupoMaestro'])->name('GrupoSave');
    Route::delete('/maestro/{id}',[MaestroController::class,'GrupoEliminar'])->name('Grupodelete');

    Route::get('/evaluacionasignada',[MaestroController::class,'indexEvaluaciones'])->name('Maestro.Ver.Asignadas');
    Route::get('/asignacion/{id}',[MaestroController::class,'indexasignaciones'])->name('Maestro.Listar.Asignacion');
    Route::post('/asignacion/{id}/guardar',[MaestroController::class,'GuardarEvaluaciones'])->name('AsignacionSave');
    Route::delete('/asignacion/{id}',[MaestroController::class,'EvaluacionEliminar'])->name('destroy.asignacion');

    Route::get('/evaluacioncorregida',[MaestroController::class,'indexEvaCorregida'])->name('Maestro.Ver.Completadas');
    Route::get('/calificaciones/{id}',[MaestroController::class,'CorreccionCalificacion'])->name('Maestro.Listar.Corregidas');
    Route::post('/calificaciones/{id}/guardar',[MaestroController::class,'CorreccionGuardar'])->name('CorreccionSave');


    Route::get('/alumnosgrupo/{id}',[MaestroController::class,'listadoAlumno'])->name('AlumnoListado');
    Route::get('/Supervision',[MaestroController::class,'indexSupervisiones'])->name('Maestro.Ver.Supervision');
    Route::get('/Supervisionlistado/{id}',[MaestroController::class,'SupervisionListado'])->name('Maestro.Ver.SupervisionListado');
    Route::get('/SupervisionVista/{id}',[MaestroController::class,'SupervisionVista'])->name('ViewSupervision');
    Route::post('/SupervisionVista/guardar',[MaestroController::class,'GuardarSupervision'])->name('SaveSupervision');
    Route::delete('/SupervisionVista/{id}',[MaestroController::class,'EliminarSupervision'])->name('SupervisionDestroy');

    Route::get('/evidencia',[MaestroController::class,'indexEvidencia'])->name('Maestro.Ver.Evidencia');
    Route::get('/Evidencialistado/{id}',[MaestroController::class,'EvidenciaListado'])->name('Maestro.Listado.Evidencia');
    Route::view('/alumnoevidencia','Maestro/subpage/alumnoevidencia');
    Route::get('/EvidenciaVista/{id}',[MaestroController::class,'EvidenciaVista'])->name('ViewEvidencia');
    Route::view('/reportes','Maestro/subpage/reporte');
    Route::view('/archivos','Maestro/subpage/archivo');
/////////////////////////////////////////////VISTAS ESTUDIANTES/////////////////////////////////////
    ///vista
    Route::get('/EstudianteView',[EstudianteController::class,'index'])->name('Estudiante.Ver');

    ////Metodo
    Route::post('/EstudianteView',[EstudianteController::class,'comprobar'])->name("Estudiante.corroborar");
    ///Vista
    Route::get('/EstudianteSupervision',[EstudianteController::class,'indexSupervision'])->name('Estudiante.Supervision');
    Route::get('/EstudianteEvidencia',[EstudianteController::class,'indexEvidencia'])->name('Estudiante.Evidencia');
   //Metodo
    Route::post('/EstudianteEvidencia',[EstudianteController::class,'GuardarEvidencia'])->name('Estudiante.EvidenciaSave');
    Route::delete('/EstudianteEvidencia/{id}',[EstudianteController::class,'EliminarEvidencia'])->name('Estudiante.EvidenciaDestroy');


    Route::get('/Maestro/ReporteGrupo',[MaestroController::class,'ReporteGrupo'])->name('Maestro.Ver.GrupoReporte');
    Route::get('/Reportelistado/{id}',[MaestroController::class,'ReporteListado'])->name('Maestro.Ver.ReporteListado');
    Route::get('/infoReporte/{id}',[MaestroController::class,'infoPdf'])->name('Maestro.Ver.ReportePdf');
    Route::post('/infoReporte',[MaestroController::class,'GeneratePdf'])->name('Maestro.Guardar.ReportePdf');

    Route::post('/ValoracionCentro',[MaestroController::class,'notaCentro'])->name('Maestro.Guardar.NotaCentro');

    Route::post('/permisos', [AdminController::class, 'permisosView'])->name('Administrador.permisos.guardar');


});

Route::middleware(['auth','cache.headers:private'])->group(function(){
    Route::get('/setting',[EstudianteController::class,'indexSetting'])->name('Setting');
    Route::post('/setting/{id}',[EstudianteController::class,'SaveImg'])->name('GuardarImg');
    Route::post('/ajustesInfo/{id}',[EstudianteController::class,'SaveInfoUser'])->name('SaveSettings');

    Route::get('/config',[MaestroController::class,'indexConfiguracion'])->name('Config');
    Route::post('/config/{id}',[MaestroController::class,'ImagenConfig'])->name('ImgConfig');






    Route::post('/salir',[AdminController::class,'logout'])->name('salir');
    Route::post('/logout',[MaestroController::class,'logoutMaestro'])->name('logoutDocente');
    Route::post('/out',[EstudianteController::class,'logoutAlumno'])->name('logoutAlumno');
});







