<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Evaluaciones;
use App\Models\EvaluacionXNotas;
use App\Models\EvidenciaEstudiante;
use App\Models\GrupoMaestro;
use App\Models\Estudiante;
use App\Models\Evidencias;
use App\Models\GrupoxMaestro;
use App\Models\RolesxPermisos;
use App\Models\Supervisiones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class EstudianteController extends Controller
{
    public function index(){
        $empresas = Empresa::all();
        $resultado = Estudiante::where('Identificacion', '=', session('datos')->first()->Identificacion)->first();
        $evaluaciones = Evaluaciones::where('IdGrupo', '=', $resultado->idGrupo)->get();
        foreach ($evaluaciones as $evaluacion) {
            $fecha = $evaluacion->FechaCreacion;
            $evaluacion->FechaCreacion = Carbon::parse($fecha)->format('d/m/Y');
        }
        $rol = Session::get('rol');
        $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();
        return view('Estudiante/index',compact('empresas','secciones','resultado','evaluaciones'));

    }

    public function comprobar(Request $request)
    {
        if($request->IdForm==1) {
            if (empty($request->Empresa)) {

                $campo=[
                    "EmpresaName"=>'required|string',
                    "Descripcion"=>'required|string',
                    "Responsable"=>'required|string',
                    "IdGrupo"=>'required|string',
                    "Telefono"=>'required',

                ];

                $cellphone =[
                    "Telefono"=>'min:8'
                ];

                $vacios = Validator::make($request->all(),$campo);
                if ($vacios->fails()) {
                    return response()->json(['errors' => "Digite lo espacios en blanco"],422);
                }

                $cellphoneVerify = Validator::make($request->all(),$cellphone);
                if ($cellphoneVerify->fails()) {
                    return response()->json(['errors' => "El campo teléfono minimo debe tener 8 digitos minimo "],422);
                }

                $verificar = GrupoMaestro::find($request->IdGrupo);
                if (!$verificar) {
                    return response()->json(['errors' => "Grupo no encontrado"],422);

                }
                if($verificar->Estado != 1){

                    return response()->json(['errors' => "Grupo no activo"],422);
                }


                $nuevoRegistro = new Empresa;
                $nuevoRegistro->Nombre = $request->EmpresaName;
                $nuevoRegistro->Descripcion = $request->Descripcion;
                $nuevoRegistro->Responsable = $request->Responsable;
                $nuevoRegistro->TelResponsable = $request->Telefono;
                $nuevoRegistro->Estado = 1;
                $nuevoRegistro->save();
                $idRegistro = $nuevoRegistro->IdEmpresa;
                $estudiante = Estudiante::find(session('datos')->first()->Identificacion);
                $info = ['idEmpresa' => $idRegistro ];
                $estudiante->update($info);

                        $info = ['idGrupo' => $request->IdGrupo ];
                        $estudiante->update($info);
                        return response()->json(['success' => "Datos almacenados exitosamente"]);





            }else {
                $campo=[
                    "Empresa"=>'required',
                    "IdGrupo"=>'required|string'
                ];

                $vacios = Validator::make($request->all(),$campo);
                $verificar = GrupoMaestro::find($request->IdGrupo);                if ($vacios->fails()) {
                    return response()->json(['errors' => "Digite lo espacios en blanco"],422);
                }
                if (!$verificar) {
                    return response()->json(['errors' => "Grupo no encontrado"],422);

                }
                if($verificar->Estado != 1){

                    return response()->json(['errors' => "Grupo no activo"],422);
                }


                $estudiante = Estudiante::find(session('datos')->first()->Identificacion);
                $info = ['idEmpresa' => $request->Empresa];
                $estudiante->update($info);



                        $info = ['idGrupo' => $request->IdGrupo ];
                        $estudiante->update($info);
                        return response()->json(['success' => "Datos almacenados exitosamente"]);



                }






        }

        if ($request->IdForm == 2) {
            $campo=[
                "IdGrupo"=>'required|string'
            ];

            $vacios = Validator::make($request->all(),$campo);
            if ($vacios->fails()) {
                return response()->json(['errors' => "Digite lo espacios en blanco"],422);
            }



            $verificar = GrupoMaestro::find($request->IdGrupo);
            if (!$verificar) {
                return response()->json(['errors' => "Grupo no encontrado"],422);

            }


                if ($verificar->Estado != 1) {
                    return response()->json(['errors' => "Grupo no activo"], 422);
                }

                    $estudiante = Estudiante::find(session('datos')->first()->Identificacion);

                    $info = ['idGrupo' => $request->IdGrupo];
                    $estudiante->update($info);
                    return response()->json(['success' => "Datos almacenados exitosamente"]);





            }




        return response()->json(['error' => "Datos no han sido almacenados "]);

    }



    public function indexEvidencia(){
        $empresas = Empresa::all();
        $resultado = Estudiante::where('Identificacion', '=', session('datos')->first()->Identificacion)->first();

        $rol = Session::get('rol');
        $evidencias = EvidenciaEstudiante::where('idEstudiante','=', session('datos')->first()->Identificacion)->get();
        foreach ($evidencias as $evidencia) {
            $fecha = $evidencia->EvidenciasBusqueda->Fecha;
            $evidencia->EvidenciasBusqueda->Fecha = Carbon::parse($fecha)->format('d/m/Y');

        }
        $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();
        return view('Estudiante/estudianteEvidencia',compact('evidencias','empresas','secciones','resultado'));

    }
    public function indexSupervision(){
        $empresas = Empresa::all();
        $resultado = Estudiante::where('Identificacion', '=', session('datos')->first()->Identificacion)->first();
        $rol = Session::get('rol');
        $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();
        $id=  session('datos')->first()->Identificacion;

      $informaciones = Supervisiones::where('idEstudiante','=',$id)->get();
        foreach ($informaciones as $supervision) {
            $fecha = $supervision->FechaSupervision;
            $supervision->FechaSupervision = Carbon::parse($fecha)->format('d/m/Y');

        }

        return view('Estudiante/indexsupervision',compact('informaciones','empresas','resultado','secciones'));

    }
    public function indexSetting(){
        $trap = Estudiante::where('Identificacion','=',session('datos')->first()->Identificacion)->first();
        if(!$trap){
            return redirect()->back();
        }
        $empresas = Empresa::all();
        $estudiante = Estudiante::where('Identificacion', '=', session('datos')->first()->Identificacion)->first();

        $resultado = Estudiante::where('Identificacion', '=', session('datos')->first()->Identificacion)->first();
        $rol = Session::get('rol');
        $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();
        return view('Estudiante/setting',compact('secciones','resultado','empresas','estudiante'));

    }

    public function SaveImg(Request $request,$id){
        $imag=[
            "imagen"=>'required|image|mimes:png,jpg|max:5120',
        ];
        $validator = Validator::make($request->all(), $imag);
        if($validator->fails()) {
            return response()->json(['errors' => "Formato de archivo no compatible"],422);
        }

        $ruta= Estudiante::where('Identificacion',$id)->first();

        if(isset($ruta->rutaImagen)){

            $archivo=$request->file("imagen");
            $nombreOriginal = $archivo->getClientOriginalName();
            $foto = $archivo->store('uploads','public');
            $grupo = ['rutaImagen'=>$foto];
            $ruta->update($grupo);
            return response()->json(['success' => 'Foto actualizada exitosamente']);



        }else{
            $archivo=$request->file("imagen");
            $nombreOriginal = $archivo->getClientOriginalName();
            $foto = $archivo->store('storage/Fotografia',$nombreOriginal);
            $grupo = ['rutaImagen'=>$foto];
            $ruta->update($grupo);
            return response()->json(['success' => 'Foto guardada exitosamente']);
        }

    }
   public function SaveInfoUser($id,Request $request){



       $campo=[
           "inputTelefono"=>'required|string',
           "Direccion"=>'required|string',
       ];
       $validator = Validator::make($request->all(), $campo);


       if ($validator->fails()) {
           return response()->json(['errors' => "Digite lo espacios en blanco"],422);
       }



       $celular= [
           "inputTelefono"=>'required|max:8|min:8',
           ];
       $tel = Validator::make($request->all(), $celular);


       if ($tel->fails()) {
           return response()->json(['errors' => "El campo telefono debe contener 8 digitos"],422);
       }


        $verificar = Estudiante::where('Identificacion','=',$id)->first();
        $campos= ['Direccion'=>$request->Direccion,'Telefono'=>$request->inputTelefono];
        $verificar->update($campos);
       return response()->json(['success'=>'Datos almacenados exitosamente']);


   }


    public function logoutAlumno (Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


    public function GuardarEvidencia(Request $request){

        if(empty($request->IdEvidencia))
        {
            $archivos=[
            "Archivos"=>'max:10000|mimes:jpeg,png,jpg,docx|file|required',
            ];
            $campo=[
                "IdEmpresa"=>'required',
                "NombreEvidencia"=>'required',
                "FechaAgregar"=>'required',
                "Descripcion"=>'required',
            ];

            $validator = Validator::make($request->all(), $archivos);

            $vacios = Validator::make($request->all(),$campo);

            if ($vacios->fails()) {
                return response()->json(['errors' => "Digite lo espacios en blanco"],422);
            }
            if($validator->fails()) {
                return response()->json(['errors' => "Formato de archivo no compatible"],422);
            }
            $archivo=$request->file("Archivos");
            $nombreArchivo= $archivo->getClientOriginalName();
            $file= $archivo->storeAs('public/Archivero', $archivo->getClientOriginalName());
            $fechaHoy = Carbon::parse($request->FechaAgregar);
            $fechaFormateada = $fechaHoy->format('Y-m-d');

            $nuevoRegistro = new Evidencias();
            $nuevoRegistro->Nombre = $request->NombreEvidencia;
            $nuevoRegistro->Descripcion = $request->Descripcion;
            $nuevoRegistro->idEmpresa = $request->IdEmpresa;
            $nuevoRegistro->Fecha = $fechaFormateada;
            $nuevoRegistro->RutaArchivo = $file;
            $nuevoRegistro->Estado = 1;
            $nuevoRegistro->NombreArchivo = $nombreArchivo;
            $nuevoRegistro->save();
            $idRegistro = $nuevoRegistro->idEvidencia;
            $evidenciaAlumno = ['idEvidencia' => $idRegistro ,'idEstudiante'=>session('datos')->first()->Identificacion ,'Estado' => 1];
           EvidenciaEstudiante::insert($evidenciaAlumno);
           return response()->json(['success'=>'Evidencia almacenada exitosamente']);

        }

        $archivos=[
            "Archivos"=>'max:10000|mimes:jpeg,png,jpg,docx|file',
        ];
        $campo=[
            "IdEmpresa"=>'required',
            "NombreEvidencia"=>'required',
            "FechaAgregar"=>'required',
            "Descripcion"=>'required',
        ];

        $validator = Validator::make($request->all(), $archivos);

        $vacios = Validator::make($request->all(),$campo);

        if ($vacios->fails()) {
            return response()->json(['errors' => "Digite lo espacios en blanco"],422);
        }
        if($validator->fails()) {
            return response()->json(['errors' => "Formato de archivo no compatible"],422);
        }

       if($request->hasFile('Archivos')) {
           $archivo=$request->file("Archivos");
           $nombreArchivo= $archivo->getClientOriginalName();
           $file= $archivo->storeAs('public/Archivero', $archivo->getClientOriginalName());
           $fechaHoy = Carbon::parse($request->FechaAgregar);
           $fechaFormateada = $fechaHoy->format('Y-m-d');

            $actualizacion = Evidencias::find($request->IdEvidencia);
            $parametros = ["Nombre"=>$request->NombreEvidencia,"Descripcion"=>$request->Descripcion,
                "idEmpresa"=>$request->IdEmpresa,"Fecha"=>$fechaFormateada,"RutaArchivo"=>"$file","Estado "=> 1,"NombreArchivo"=>$nombreArchivo];
          $actualizacion->update($parametros);
           return response()->json(['success'=>'Evidencia actualizada exitosamente']);


       }else{
           $fechaHoy = Carbon::parse($request->FechaAgregar);
           $fechaFormateada = $fechaHoy->format('Y-m-d');
           $actualizacion = Evidencias::find($request->IdEvidencia);
           $parametros = ["Nombre"=>$request->NombreEvidencia,"Descripcion"=>$request->Descripcion,
               "idEmpresa"=>$request->IdEmpresa,"Fecha"=>$fechaFormateada,"Estado "=> 1];
           $actualizacion->update($parametros);
           return response()->json(['success'=>'Evidencia actualizada exitosamente']);

       }








    }

    public function  EliminarEvidencia($id)
    {
        $verificar = Evidencias::find($id);
        if (!$verificar) {
            return response()->json(['errors', 'Evidencia no encontrada',422]) ;
        }

        // Actualiza solo el campo 'nombre'
        $verificar->update(['Estado' => 0]);
        return response()->json(['success'=>'Evidencia eliminada exitosamente']);

    }

}
