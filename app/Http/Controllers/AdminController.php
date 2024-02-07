<?php

namespace App\Http\Controllers;

use App\Models\CatSupervisiones;
use App\Models\Empresa;
use App\Models\Evaluacion;
use App\Models\Evaluaciones;
use App\Models\Genero;
use App\Models\Maestros;
use App\Models\Permisos;
use App\Models\Roles;
use App\Models\Supervisiones;
use App\Models\Unidad;
use App\Models\RolesXPermisos;
use App\Models\User;
use App\Models\Estudiante;
use Carbon\Carbon;
use Couchbase\Role;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    private $parametro = 0;
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
        $trap = Maestros::where('Identificacion','=',session('datos')->first()->Identificacion)->first();

        $datos = Roles::all();
        $rol = Session::get('rol');
        $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();
        $datosFiltrados =  Permisos::all();
        $dataPermiso = $datosFiltrados->reject(function ($dato) {
            return Str::startsWith($dato->Ruta, 'Estudiante.');
        });
        $y=1;
        return view('Administrador/rol',compact('secciones','y','dataPermiso' ,'datos','trap'),['param'=>$this->parametro]);
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
        $usuarios = User::where('IdRol', $id)->where('Estado',1)->get();
        if (!$rol) {
            return response()->json(["Error"=>"Rol no encontrado"]);

        }
        if ($usuarios->isNotEmpty()) {
            return response()->json(["Error"=>"Rol no se ha podido eliminar" ],500);
        }
        $rol->update(['Estado' => 0]);
        return response()->json(["success"=>"Rol eliminado exitosamente"]);



    }

    public function permisosView(Request $request){

        $rolId = $request->input('pID');
        $variables = $request->input('notas');
        $valoresPosibles = Permisos::pluck('Id')->all();

        if(!empty($variables)){
            $opcionesNoSeleccionadas = array_diff($valoresPosibles, $variables);


            foreach ($opcionesNoSeleccionadas as $noSeleccion){
                $verify= RolesXPermisos::where('Permisos_Id','=',$noSeleccion)
                    ->where('Roles_id','=',$rolId)->first();
                if(isset($verify)){
                    RolesXPermisos::where('Permisos_Id','=',$noSeleccion)
                        ->where('Roles_id','=',$rolId)->delete();
                }
            }



        foreach ($variables as $seleccion) {
            $verifySeleccion = RolesXPermisos::where('Permisos_Id', '=', $seleccion)
                ->where('Roles_id', '=', $rolId)->first();

            if (!$verifySeleccion)
            {

                $nuevoRegistro = new RolesXPermisos;
                $nuevoRegistro->Permisos_Id = $seleccion;
                $nuevoRegistro->Roles_id = $rolId;
                // Agrega otros campos según sea necesario
                $nuevoRegistro->save();


            }

        }

            return back()->with('exito', 'Permisos asignados exitosamente');

        }else{

            RolesXPermisos::where('Roles_id','=',$rolId)->delete();
        }






        return back()->with('exito', 'Permisos asignados exitosamente');

    }




///Genero
    public function indexGenero(){
        $trap = Maestros::where('Identificacion','=',session('datos')->first()->Identificacion)->first();

        $datos['genero'] = Genero::all();
        $rol = Session::get('rol');
        $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();
        return view('Administrador/genero', $datos,compact('secciones','trap'));
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
        $usuariosM = Maestros::where('idGenero', $id)->where('Estado',1)->get();
        $usuariosE = Estudiante::where('idGenero',$id)->where('Estado',1)->get();
        if (!$genero) {
            return response()->json(["error"=>"Género no encontrado"]);
        }

        if ($usuariosM->isNotEmpty()) {
            return response()->json(["error"=>"Género no se ha podido eliminar" ],500);
        }
        if ($usuariosE->isNotEmpty()) {
            return response()->json(["error"=>"Género no se ha podido eliminar" ],500);
        }

        $genero->update(['Estado' => 0]);
        return response()->json(["success"=>"Género eliminado exitosamente"]);



    }


////Unidad
    public function indexUnidad(){
        $trap = Maestros::where('Identificacion','=',session('datos')->first()->Identificacion)->first();

        $datos['unidades'] = Unidad::all();
        $rol = Session::get('rol');
        $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();
        return view('Administrador/unidades', $datos,compact('secciones','trap'));
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
        $checkEvaluacion = Evaluaciones::where('IdUnidad',$id)->where('Estado',1)->get();
        if (!$unidad) {
            return response()->json(["error"=>"Unidad no encontrada"]);
        }
        if($checkEvaluacion->isNotEmpty()){
            return response()->json(["error"=>"Unidad no se ha podido eliminar" ],500);

        }


        $unidad->update(['Estado' => 0]);
        return response()->json(["success"=>"Unidad eliminada exitosamente"]);
    }


////Empresa
    public function indexEmpresa(){
        $trap = Maestros::where('Identificacion','=',session('datos')->first()->Identificacion)->first();

        $datos['centros'] = Empresa::all();
        $rol = Session::get('rol');
        $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();
        return view('Administrador/empresa',$datos,compact('secciones','trap'));
    }
    public function GuardarEmpresa(Request $request){

        if(isset($request->IdEmpresa)){

        $campos=[
        "NombreEmpresa"=>'required|string',
        "Descripcion"=>'required|string',
        "Responsable"=>'required|string',
        "Telefono"=>'required'
        ];

        $cellphone =[
            "Telefono"=>'min:8'
        ];

            $vacios = Validator::make($request->all(),$campos);
            if ($vacios->fails()) {
                return response()->json(['errors' => "Digite lo espacios en blanco"],422);
            }

            $cellphoneVerify = Validator::make($request->all(),$cellphone);
            if ($cellphoneVerify->fails()) {
                return response()->json(['errors' => "El campo teléfono debe contener 8 digitos"],422);
            }




            $empresa = Empresa::find($request->IdEmpresa);
            if (!$empresa) {
                return response()->json(['errors' => "Centro de prácticas no se ha encontrado"],422);
            }

            // Actualiza solo el campo 'nombre'
            $empresa->update(['Nombre' => $request->NombreEmpresa,'Descripcion'=>$request->Descripcion,
            'Responsable'=>$request->Responsable,'TelResponsable'=>$request->Telefono]);
            return response()->json(['success'=>"Centro de prácticas actualizado exitosamente"]);
        }

        $campos=[
            "NombreEmpresa"=>'required|string',
            "Descripcion"=>'required|string',
            "Responsable"=>'required|string',
            "Telefono"=>'required'
        ];

        $cellphone =[
            "Telefono"=>'min:8'
        ];

        $vacios = Validator::make($request->all(),$campos);
        if ($vacios->fails()) {
            return response()->json(['errors' => "Digite lo espacios en blanco"],422);
        }

        $cellphoneVerify = Validator::make($request->all(),$cellphone);
        if ($cellphoneVerify->fails()) {
            return response()->json(['errors' => "El campo teléfono debe contener 8 digitos"],422);
        }

        $empresa = ['Nombre' => $request->NombreEmpresa, 'Descripcion'=> $request->Descripcion,
            'Responsable'=>$request->Responsable,'TelResponsable'=>$request->Telefono,'Estado' => 1];
        Empresa::insert($empresa);
        return response()->json(['success'=>"Centro de prácticas guardado exitosamente"]);
    }

    public function EliminarEmpresa($id){
        $empresa = Empresa::find($id);
        $usuariosE = Estudiante::where('idEmpresa',$id)->where('Estado',1)->get();
        if (!$empresa) {
            return response()->json(["error"=>"Centro de práctica no encontrado"]);
        }
        if ($usuariosE->isNotEmpty()) {
            return response()->json(["error"=>"Centro de prácticas no se ha podido eliminar" ],500);
        }



        $empresa->update(['Estado' => 0]);
        return response()->json(["success"=>"Centro de práctica eliminado exitosamente"]);

    }



////Categoria Evaluacion
    public function indexEvaluacion(){
        $trap = Maestros::where('Identificacion','=',session('datos')->first()->Identificacion)->first();

        $datos['categorias'] = Evaluacion::all();
        $rol = Session::get('rol');
        $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();
        return view('Administrador/AspectosEvaluacion',$datos,compact('secciones','trap'));
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
        $checkEvaluacion = Evaluaciones::where('IdTipo',$id)->where('Estado',1)->get();
        if (!$evaluacion) {
            return response()->json(["error"=>"Categoría de evaluación no encontrada"]);

        }
        if($checkEvaluacion->isNotEmpty()){

            return response()->json(["error"=>"Categoría de evaluación no se ha podido eliminar" ],500);


        }


        // Actualiza solo el campo 'nombre'
        $evaluacion->update(['Estado' => 0]);
        return response()->json(["success"=>"Categoría de evaluación eliminada exitosamente"]);
    }

////Categoria Supervision
    public function indexSupervision(){
        $trap = Maestros::where('Identificacion','=',session('datos')->first()->Identificacion)->first();
        $datos['supervisiones']= CatSupervisiones::all();
        $rol = Session::get('rol');
        $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();
        return view('Administrador/valoracion',$datos,compact('secciones','trap'));
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
        $sup = Supervisiones::where('IdTipoSupervision',$id)->where('Estado',1)->get();
        if (!$supervision) {
            return response()->json(["error"=>"Categoría de supervisión no encontrada"]);
        }


        if ($sup->isNotEmpty()) {
            return response()->json(["error"=>"Categoría supervisión no se ha podido eliminar" ],500);
        }

        $supervision->update(['Estado' => 0]);

        return response()->json(["success"=>"Categoría de supervisión eliminada exitosamente"]);

    }

    ///Maestros
    public function indexMaestro()
    {
        $trap = Maestros::where('Identificacion','=',session('datos')->first()->Identificacion)->first();

        $maestros = Maestros::all();
        $generos = Genero::all();
        $roles = Roles::all();
        $rol = Session::get('rol');
        $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();
        return view('Administrador/admin',compact('maestros'),compact('generos','roles','secciones','trap'));
    }


    public function SaveMaestro(Request $request){

        if(empty($request->idform)){

            $verificar = Maestros::find($request->identificador);
            $user= User::where('Identificacion', $request->identificador)->first();


            $campos=[

            "NombreMaestro"=>'required|string',
            "ApellidoMaestro"=>'required|string',
            "IdGenero"=>'required',
            "Especialidad"=>'required|string',
            "identificador"=>'required|string',
                "Roles"=>'required'
            ];
            $identidad = [
                "identificador"=>'min:8',
            ];


            $vacios = Validator::make($request->all(),$campos);
            if ($vacios->fails()) {
                return response()->json(['errors' => "Digite lo espacios en blanco"],422);
            }


            $verify = Validator::make($request->all(),$identidad);
            if ($verify->fails()) {
                return response()->json(['errors' => "El campo identificacion debe tener minimo 8 caracteres"],422);
            }
            if(isset($request->Clave)){

                $verificar->update(['especialidad' => $request->Especialidad,'idGenero'=>$request->IdGenero,
                    'Nombres'=>$request->NombreMaestro,'Apellidos'=>$request->ApellidoMaestro]);

                $user->update(['password' => md5($request->Clave)]);
                return response()->json(['success'=> 'Usuario actualizado exitosamente']);

            }else{

                $verificar->update(['especialidad' => $request->Especialidad,'idGenero'=>$request->IdGenero,
                    'Nombres'=>$request->NombreMaestro,'Apellidos'=>$request->ApellidoMaestro]);

                return response()->json(['success'=> 'Usuario actualizado exitosamente']);
            }


        }
        else{
            $verificar = Maestros::find($request->identificador);
            $campos=[

                "NombreMaestro"=>'required|string',
                "ApellidoMaestro"=>'required|string',
                "IdGenero"=>'required',
                "Especialidad"=>'required|string',
                "identificador"=>'required|string',
                "Clave"=>'required',
                "Roles"=>'required'
            ];

            $identidad = [
                "identificador"=>'min:8',
            ];

            $vacios = Validator::make($request->all(),$campos);
            if ($vacios->fails()) {
                return response()->json(['errors' => "Digite lo espacios en blanco"],422);
            }

            $verify = Validator::make($request->all(),$identidad);
            if ($verify->fails()) {
                return response()->json(['errors' => "El campo identificacion debe tener minimo 8 caracteres"],422);
            }





            if(!$verificar){
                $fechaHoy = Carbon::now();
                $fechaFormateada = $fechaHoy->format('Y-m-d');

                $usuario = ['Identificacion'=>$request->identificador,'password'=>md5($request->Clave)
                    ,'FechaCreacion'=>$fechaFormateada,'Estado'=>1,'IdRol'=>$request->Roles];
                User::insert($usuario);



                $maestro =['Identificacion'=>$request->identificador,'especialidad'=>$request->Especialidad
                    ,'IdGenero'=>$request->IdGenero,'Estado'=>1,'Nombres'=>$request->NombreMaestro,'Apellidos'=>$request->ApellidoMaestro];
                Maestros::insert($maestro);
                return response()->json(['success'=> 'Usuario almacenado exitosamente']);

            }else{

                return response()->json(['errors' => "Usuario ya existente"],422);
            }



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
        $trap = Maestros::where('Identificacion','=',session('datos')->first()->Identificacion)->first();

        $estudiantes = Estudiante::all();
        $generos = Genero::all();
        $empresas = Empresa::all();
        $rol = Session::get('rol');
        $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();
        return view('Administrador/estudiante',compact('estudiantes'),compact('generos','secciones','empresas','trap'));

    }

    public function GuardarEstudiante(Request $request){

        if(empty($request->idform)){
            $verificar = Estudiante::find($request->identificador);
            $user= User::where('Identificacion', $request->identificador)->first();
            if(isset($request->Clave)){
                $campo=[
                    "NombreEstudiante"=>'required|string',
                    "ApellidoEstudiante"=>'required|string',
                    "Direccion"=>'required|string',
                    "Genero"=>'required',
                    "identificador"=>'required|string',
                    "Clave"=>'required|string',
                    "Telefono"=>'required',
                ];
                $cellphone =[
                    "Telefono"=>'min:8'
                ];
                $identidad = [
                    "identificador"=>'min:8',
                ];
                $vacios = Validator::make($request->all(),$campo);
                if ($vacios->fails()) {
                    return response()->json(['errors' => "Digite lo espacios en blanco"],422);
                }
                $verify = Validator::make($request->all(),$identidad);
                if ($verify->fails()) {
                    return response()->json(['errors' => "El campo identificacion debe tener minimo 8 caracteres"],422);
                }



                $cellphoneVerify = Validator::make($request->all(),$cellphone);
                if ($cellphoneVerify->fails()) {
                    return response()->json(['errors' => "El campo teléfono debe contener 8 digitos"],422);
                }







                $verificar->update(['Identificacion'=>$request->identificador,'Direccion'=>$request->Direccion,'idEmpresa'=>$request->Empresa
                    ,'idGenero'=>$request->Genero,'Estado'=>1,'Nombres'=>$request->NombreEstudiante,'Apellidos'=>$request->ApellidoEstudiante,'Telefono'=>$request->Telefono]);
                $user->update(['password'=>md5($request->Clave)]);
                return response()->json(['success'=>'Estudiante actualizado exitosamente']);


            }
            else{

                $campo=[
                    "NombreEstudiante"=>'required|string',
                    "ApellidoEstudiante"=>'required|string',
                    "Direccion"=>'required|string',
                    "Genero"=>'required',
                    "identificador"=>'required|string',
                    "Telefono"=>'required',
                ];
                $cellphone =[
                    "Telefono"=>'min:8'
                ];
                $identidad = [
                    "identificador"=>'min:8',
                ];
                $vacios = Validator::make($request->all(),$campo);
                if ($vacios->fails()) {
                    return response()->json(['errors' => "Digite lo espacios en blanco"],422);
                }

                $cellphoneVerify = Validator::make($request->all(),$cellphone);
                if ($cellphoneVerify->fails()) {
                    return response()->json(['errors' => "El campo teléfono debe contener 8 digitos"],422);
                }

                $verify = Validator::make($request->all(),$identidad);
                if ($verify->fails()) {
                    return response()->json(['errors' => "El campo identificacion debe tener minimo 8 caracteres"],422);
                }

                $verificar->update(['Identificacion'=>$request->identificador,'Direccion'=>$request->Direccion,'idEmpresa'=>$request->Empresa
                    ,'idGenero'=>$request->Genero,'Estado'=>1,'Nombres'=>$request->NombreEstudiante,'Apellidos'=>$request->ApellidoEstudiante,'Telefono'=>$request->Telefono]);
                return response()->json(['success'=>'Estudiante actualizado exitosamente']);
            }





        }else{
            $verificar = Estudiante::find($request->identificador);
            if($verificar){
                return response()->json(['errors' => "Este usuario ya existe"],422);
            }

            $campo=[
                "NombreEstudiante"=>'required|string',
                "ApellidoEstudiante"=>'required|string',
                "Direccion"=>'required|string',
                "Genero"=>'required',
                "identificador"=>'required|string',
                "Clave"=>'required|string',
                "Telefono"=>'required',
            ];
            $cellphone =[
                "Telefono"=>'min:8'
            ];
            $identidad = [
                "identificador"=>'min:8',
            ];
            $vacios = Validator::make($request->all(),$campo);
            if ($vacios->fails()) {
                return response()->json(['errors' => "Digite lo espacios en blanco"],422);
            }

            $cellphoneVerify = Validator::make($request->all(),$cellphone);
            if ($cellphoneVerify->fails()) {
                return response()->json(['errors' => "El campo teléfono debe contener 8 digitos"],422);
            }
            $verify = Validator::make($request->all(),$identidad);
            if ($verify->fails()) {
                return response()->json(['errors' => "El campo identificacion debe tener minimo 8 caracteres"],422);
            }


            $fechaHoy = Carbon::now();
            $fechaFormateada = $fechaHoy->format('Y-m-d');

            $usuario = ['Identificacion'=>$request->identificador,'password'=>md5($request->Clave)
                ,'FechaCreacion'=>$fechaFormateada,'Estado'=>1,'IdRol'=>$request->Roles];
            User::insert($usuario);



            $estudiante =['Identificacion'=>$request->identificador,'Direccion'=>$request->Direccion,'idEmpresa'=>$request->Empresa
                ,'idGenero'=>$request->Genero,'Estado'=>1,'Nombres'=>$request->NombreEstudiante,'Apellidos'=>$request->ApellidoEstudiante,'Telefono'=>$request->Telefono];
            Estudiante::insert($estudiante);
            return response()->json(['success'=>'Estudiante almacenado exitosamente']);

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
