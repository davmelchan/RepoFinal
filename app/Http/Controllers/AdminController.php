<?php

namespace App\Http\Controllers;

use App\Models\CatSupervisiones;
use App\Models\Empresa;
use App\Models\Evaluacion;
use App\Models\Genero;
use App\Models\Maestros;
use App\Models\Roles;
use App\Models\Unidad;
use App\Models\User;
use App\Models\Estudiante;
use Carbon\Carbon;
use Couchbase\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    public function logout(Request $request, Redirector $redirect)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }




///Rol
    public function indexRol()
    {

        $datos['roles'] = Roles::all();
        return view('Administrador/rol', $datos);
    }

    public function GuardarRol(Request $request)
    {

        if (isset($request->IdRol)) {
            $rol = Roles::find($request->IdRol);
            if (!$rol) {
                return back()->with('Fracaso', 'Rol no encontrado');
            }

            // Actualiza solo el campo 'nombre'
            $rol->update(['Nombre' => $request->NombreRol]);

            return back()->with('exito', 'Rol actualizado exitosamente');
        } else {

            $rol = ['Nombre' => $request->NombreRol, 'Estado' => 1];
            Roles::insert($rol);
            return back()->with('exito', 'Rol guardado exitosamente');
        }
    }

    public function destroy($id)
    {

        $rol = Roles::find($id);
        if (!$rol) {
            return response()->json(["error"=>"Rol no encontrado"]);

        }

        // Actualiza solo el campo 'nombre'
        $rol->update(['Estado' => 0]);
        return response()->json(["success"=>"Rol eliminado exitosamente"]);
    }


///Genero
    public function indexGenero(){
        $datos['genero'] = Genero::all();
        return view('Administrador/genero', $datos);
    }

    public function GuardarGenero(Request $request){
        if(isset($request->IdGenero)){
            $genero = Genero::find($request->IdGenero);
            if (!$genero) {
                return back()->with('Fracaso', 'Género no encontrado');
            }

            // Actualiza solo el campo 'nombre'
            $genero->update(['Nombre' => $request->NombreGenero]);

            return back()->with('exito', 'Género actualizado exitosamente');


        }
        $genero = ['Nombre' => $request->NombreGenero, 'Estado' => 1];
        Genero::insert($genero);
        return back()->with('exito', 'Género guardado exitosamente');
    }
    public function EliminarGenero($id){
        $genero = Genero::find($id);
        if (!$genero) {
            return response()->json(["error"=>"Género no encontrado"]);
        }

        // Actualiza solo el campo 'nombre'
        $genero->update(['Estado' => 0]);

        return response()->json(["success"=>"Género eliminado exitosamente"]);
    }


////Unidad
    public function indexUnidad(){
        $datos['unidades'] = Unidad::all();
        return view('Administrador/unidades', $datos);
    }
    public function GuardarUnidad(Request $request){
        if(isset($request->IdUnidad)){

            $unidad = Unidad::find($request->IdUnidad);
            if (!$unidad) {
                return back()->with('Fracaso', 'Unidad no encontrada');
            }

            // Actualiza solo el campo 'nombre'
            $unidad->update(['Nombre' => $request->NombreUnidad]);

            return back()->with('exito', 'Unidad actualizada exitosamente');


        }

        $unidad = ['Nombre' => $request->NombreUnidad, 'Estado' => 1];
        Unidad::insert($unidad);
        return back()->with('exito', 'Unidad guardada exitosamente');
    }
    public function EliminarUnidad($id){
        $unidad = Unidad::find($id);
        if (!$unidad) {
            return response()->json(["error"=>"Unidad no encontrada"]);
        }

        // Actualiza solo el campo 'nombre'
        $unidad->update(['Estado' => 0]);
        return response()->json(["success"=>"Unidad eliminada exitosamente"]);
    }


////Empresa
    public function indexEmpresa(){
        $datos['centros'] = Empresa::all();
        return view('Administrador/empresa',$datos);
    }
    public function GuardarEmpresa(Request $request){
        if(isset($request->IdEmpresa)){

            $empresa = Empresa::find($request->IdEmpresa);
            if (!$empresa) {
                return back()->with('Fracaso', 'Unidad no encontrada');
            }

            // Actualiza solo el campo 'nombre'
            $empresa->update(['Nombre' => $request->NombreEmpresa,'Descripcion'=>$request->Descripcion,
            'Responsable'=>$request->Responsable]);

            return back()->with('exito', 'Centro de práctica actualizado exitosamente');
        }


        $empresa = ['Nombre' => $request->NombreEmpresa, 'Descripcion'=> $request->Descripcion,
            'Responsable'=>$request->Responsable,'Estado' => 1];
        Empresa::insert($empresa);
        return back()->with('exito', 'Centro de prácticas guardado exitosamente');
    }

    public function EliminarEmpresa($id){
        $empresa = Empresa::find($id);
        if (!$empresa) {
            return response()->json(["error"=>"Centro de práctica no encontrado"]);
        }

        // Actualiza solo el campo 'nombre'
        $empresa->update(['Estado' => 0]);
        return response()->json(["success"=>"Centro de práctica eliminado exitosamente"]);

    }



////Categoria Evaluacion
    public function indexEvaluacion(){
        $datos['categorias'] = Evaluacion::all();
        return view('Administrador/AspectosEvaluacion',$datos);
    }
    public function GuardarEvaluacion(Request $request){
        if(isset($request->IdAspecto)){
            $evaluacion = Evaluacion::find($request->IdAspecto);
            if(!$evaluacion){
                return back()->with('fracaso', 'Categoría de evaluación no ha sido encontrada');
            }

            $evaluacion->update(['Nombre' => $request->NombreAspecto]);
            return back()->with('exito', 'Categoría de evaluación actualizada exitosamente');

        }


        $evaluacion = ['Nombre' => $request->NombreAspecto,'Estado' => 1];
        Evaluacion::insert($evaluacion);
        return back()->with('exito', 'Categoría de evaluación guardada exitosamente');
    }
    public function EliminarEvaluacion($id){
        $evaluacion = Evaluacion::find($id);
        if (!$evaluacion) {
            return response()->json(["error"=>"Categoría de evaluación no encontrada"]);

        }

        // Actualiza solo el campo 'nombre'
        $evaluacion->update(['Estado' => 0]);
        return response()->json(["success"=>"Categoría de evaluación eliminada exitosamente"]);
    }

////Categoria Supervision
    public function indexSupervision(){
        $datos['supervisiones']= CatSupervisiones::all();
        return view('Administrador/valoracion',$datos);
    }
    public function GuardarCatSupervision(Request $request){
        if(isset($request->IdValoracion)){
            $supervision = CatSupervisiones::find($request->IdValoracion);
            if(!$supervision){
                return back()->with('fracaso', 'Categoría de supervisión no ha sido encontrada');
            }

            $supervision->update(['Nombre' => $request->NombreValoracion]);
            return back()->with('exito', 'Categoría de supervisión actualizada exitosamente');

        }

        $supervision = ['Nombre'=>$request->NombreValoracion,"Estado"=>1];
        CatSupervisiones::insert($supervision);
        return back()->with('exito', 'Categoría de supervisión guardada exitosamente');
    }

    public function EliminarCatSupervision($id){
        $supervision = CatSupervisiones::find($id);
        if (!$supervision) {
            return response()->json(["error"=>"Categoría de supervisión no encontrada"]);
        }

        // Actualiza solo el campo 'nombre'
        $supervision->update(['Estado' => 0]);

        return response()->json(["success"=>"Categoría de supervisión eliminada exitosamente"]);

    }

    ///Maestros
    public function indexMaestro()
    {
        $maestros = Maestros::all();
        $generos = Genero::all();
        return view('Administrador/admin',compact('maestros'),compact('generos'));
    }


    public function SaveMaestro(Request $request){
        $verificar = Maestros::find($request->identificador);
        $user= User::where('Identificacion', $request->identificador)->first();
        if(!$verificar){
            $fechaHoy = Carbon::now();
            $fechaFormateada = $fechaHoy->format('Y-m-d');

            $usuario = ['Identificacion'=>$request->identificador,'password'=>md5($request->Clave)
                ,'FechaCreacion'=>$fechaFormateada,'Estado'=>1,'IdRol'=>26];
            User::insert($usuario);



            $maestro =['Identificacion'=>$request->identificador,'especialidad'=>$request->Especialidad
                ,'IdGenero'=>$request->IdGenero,'Estado'=>1,'Nombres'=>$request->NombreMaestro,'Apellidos'=>$request->ApellidoMaestro];
            Maestros::insert($maestro);

            return back()->with('exito', 'Maestro almacenado exitosamente');



        }

        if(isset($request->Clave)){

            $verificar->update(['especialidad' => $request->Especialidad,'idGenero'=>$request->IdGenero,
                'Nombres'=>$request->NombreMaestro,'Apellidos'=>$request->ApellidoMaestro]);

            $user->update(['password' => md5($request->Clave)]);
            return back()->with('exito', 'Maestro actualizado exitosamente');

        }else{

            $verificar->update(['especialidad' => $request->Especialidad,'idGenero'=>$request->IdGenero,
                'Nombres'=>$request->NombreMaestro,'Apellidos'=>$request->ApellidoMaestro]);
            return back()->with('exito', 'Maestro actualizado exitosamente');
        }





    }


    public function EliminarMaestro($id){
        $user= User::where('Identificacion', $id)->first();
        $maestro = Maestros::find($id);
        if (!$user) {
            return response()->json(["error"=>"Maestro no encontrado"]);

        }

        // Actualiza solo el campo 'nombre'
        $user->update(['Estado' => 0]);
        $maestro->update(['Estado'=> 0]);
        return response()->json(["success"=>"Maestro eliminado exitosamente"]);


    }





    ///crud estudiante
    public function indexEstudiante(){
        $estudiantes = Estudiante::all();
        $generos = Genero::all();
        $empresas = Empresa::all();
        return view('Administrador/estudiante',compact('estudiantes'),compact('generos','empresas'));

    }

    public function GuardarEstudiante(Request $request){
        $verificar = Estudiante::find($request->identificador);
        $user= User::where('Identificacion', $request->identificador)->first();
        if(!$verificar){
            $fechaHoy = Carbon::now();
            $fechaFormateada = $fechaHoy->format('Y-m-d');

            $usuario = ['Identificacion'=>$request->identificador,'password'=>md5($request->Clave)
                ,'FechaCreacion'=>$fechaFormateada,'Estado'=>1,'IdRol'=>27];
            User::insert($usuario);



            $estudiante =['Identificacion'=>$request->identificador,'Direccion'=>$request->Direccion,'idEmpresa'=>$request->Empresa
                ,'idGenero'=>$request->Genero,'Estado'=>1,'Nombres'=>$request->NombreEstudiante,'Apellidos'=>$request->ApellidoEstudiante,'Telefono'=>$request->Telefono];
            Estudiante::insert($estudiante);

            return back()->with('exito', 'Estudiante almacenado exitosamente');


        }

        if(isset($request->Clave)){

            $verificar->update(['Identificacion'=>$request->identificador,'Direccion'=>$request->Direccion,'idEmpresa'=>$request->Empresa
                ,'idGenero'=>$request->Genero,'Estado'=>1,'Nombres'=>$request->NombreEstudiante,'Apellidos'=>$request->ApellidoEstudiante,'Telefono'=>$request->Telefono]);
            $user->update(['password'=>md5($request->Clave)]);
            return back()->with('exito', 'Estudiante actualizado exitosamente');

        }else{

            $verificar->update(['Identificacion'=>$request->identificador,'Direccion'=>$request->Direccion,'idEmpresa'=>$request->Empresa
                ,'idGenero'=>$request->Genero,'Estado'=>1,'Nombres'=>$request->NombreEstudiante,'Apellidos'=>$request->ApellidoEstudiante,'Telefono'=>$request->Telefono]);
            return back()->with('exito', 'Estudiante actualizado exitosamente');
        }





    }

public function EliminarEstudiante($id){


    $user= User::where('Identificacion', $id)->first();
    $estudiante = Estudiante::find($id);
    if (!$user) {
        return response()->json(["error"=>"Estudiante no encontrado"]);
    }

    // Actualiza solo el campo 'nombre'
    $user->update(['Estado' => 0]);
    $estudiante->update(['Estado'=> 0]);
    return response()->json(["success"=>"Estudiante eliminado exitosamente"]);

}



}
