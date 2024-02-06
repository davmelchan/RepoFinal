<?php

namespace App\Http\Controllers;

use App\Models\CatSupervisiones;
use App\Models\Evaluacion;
use App\Models\EvaluacionCentro;
use App\Models\Evaluaciones;
use App\Models\EvaluacionXNotas;
use App\Models\Grupo;
use App\Models\GrupoMaestro;
use App\Models\Grupos;
use App\Models\GrupoxMaestro;
use App\Models\Maestros;
use App\Models\Reportes;
use App\Models\RolesxPermisos;
use App\Models\Supervisiones;
use App\Models\Unidad;
use App\Models\Estudiante;
use App\Models\EvidenciaEstudiante;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;
use Doctrine\DBAL\Exception;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Str;

    class MaestroController extends Controller
    {

        public function logoutMaestro(Request $request,Redirector $redirect){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }

        public function indexGrupo(){

            $datos= GrupoxMaestro::where('IdMaestro', '=',session('datos')->first()->Identificacion)->get();
            foreach ($datos as $dato) {
                $dato->conteo = Estudiante::where('idGrupo', '=', $dato->IdGrupo)->count();
            }
            $rol = Session::get('rol');
            $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();

            return view('Maestro/maestro',compact('datos','secciones'));
        }

        public function listadoAlumno ($id){
            $verificacion = GrupoxMaestro::where('IdGrupo','=',$id)->where('IdMaestro','=',session('datos')->first()->Identificacion)
                ->where('Estado','=',1)->first();

            if(empty($verificacion)){
                return redirect()->back();
            }
            $resultado = GrupoMaestro::where('Identificacion', '=', $id)->first();
            $alumnos= Estudiante::where('idGrupo', '=', $id)->get();
            $rol = Session::get('rol');
            $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();

            return view('Maestro/subpage/alumnosgrupo',compact('resultado','alumnos','secciones'));

        }

        public function indexEvaluaciones(){

            $datos= GrupoxMaestro::where('IdMaestro', '=',session('datos')->first()->infoUser->Identificacion )->get();
            foreach ($datos as $dato) {
                $dato->conteo = Estudiante::where('idGrupo', '=', $dato->IdGrupo)->count();
            }
            $rol = Session::get('rol');
            $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();
            return view('Maestro/evaluacionasignada',compact('datos','secciones'));
        }

        public function indexSupervisiones(){
            $datos= GrupoxMaestro::where('IdMaestro', '=',session('datos')->first()->Identificacion)->get();
            foreach ($datos as $dato) {
                $dato->conteo = Estudiante::where('idGrupo', '=', $dato->IdGrupo)->count();
            }
            $rol = Session::get('rol');
            $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();
            return view('Maestro/supervisiones',compact('datos','secciones'));

        }

      public function ReporteGrupo(){
          $datos= GrupoxMaestro::where('IdMaestro', '=',session('datos')->first()->Identificacion)->get();
          foreach ($datos as $dato) {
              $dato->conteo = Estudiante::where('idGrupo', '=', $dato->IdGrupo)->count();
          }
          $rol = Session::get('rol');
          $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();
          return view('Maestro/ReporteGrupo',compact('datos','secciones'));
      }

      public function ReporteListado($id){
          $verificacion = GrupoxMaestro::where('IdGrupo','=',$id)->where('IdMaestro','=',session('datos')->first()->Identificacion)
              ->where('Estado','=',1)->first();

          if(empty($verificacion)){
              return redirect()->back();
          }
          $resultado = GrupoMaestro::where('Identificacion', '=', $id)->first();
          $alumnos= Estudiante::where('idGrupo', '=', $id)->get();
          $rol = Session::get('rol');
          $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();
          return view('Maestro/subpage/ListadoReporte',compact('resultado','alumnos','secciones'));


      }
      public function infoPdf($id){
          $consulta = Estudiante::where('Identificacion','=',$id)->first();
          $verificacion = GrupoxMaestro::where('IdMaestro','=',session('datos')->first()->Identificacion)
              ->where('IdGrupo','=',$consulta->idGrupo)
              ->where('Estado','=',1)->first();
          if(empty($verificacion)){
              return redirect()->back();
          }

          $datosProf = Maestros::where('Identificacion','=',session('datos')->first()->Identificacion)->first();
            $nomProf= $datosProf->Nombres.' '.$datosProf->Apellidos;
            $especialidad = $datosProf->especialidad;
          Date::setLocale('es');
          $empreEv = EvaluacionCentro::where('IdEstudiante','=',$id)->first();


          $fechaCompleta = ucfirst(Date::now()->format('l, j F Y'));
          $conteoNotas =  DB::table('EvaluacionXNotas')
              ->join('Tb_Evaluaciones', 'EvaluacionXNotas.idEvaluacion', '=', 'Tb_Evaluaciones.IdEvaluacion')
              ->where('EvaluacionXNotas.idEstudiante', $id)
              ->where('Tb_Evaluaciones.Estado','=',1)
              ->count() + 1;
          $conteoEvidencias =  DB::table('EvidenciasXEstudiante')
                  ->join('Evidencias_Tb', 'EvidenciasXEstudiante.idEvidencia', '=', 'Evidencias_Tb.idEvidencia')
                  ->where('EvidenciasXEstudiante.idEstudiante', $id)
                  ->where('EvidenciasXEstudiante.Estado','=',1)
                  ->count();
          $conteoSupervision = Supervisiones::where('idEstudiante','=',$id)->where('idDocente','=',session('datos')->first()->Identificacion)
              ->where('Estado','=',1)->count();

          $infoReporte = Reportes::where('IdAlumno','=',$id)->where('IdMaestro','=',session('datos')->first()->Identificacion)
              ->first();

          $pdf = Pdf::loadView('Maestro/subpage/reportePdf',compact('fechaCompleta','nomProf','especialidad','consulta','empreEv','conteoNotas','conteoEvidencias','conteoSupervision','infoReporte'));
          return $pdf->stream();
            return view('Maestro/subpage/reportePdf');

      }

      public function GeneratePdf(Request $request){
          $horarios=[
              "HoraEntrada"=>'required',
              "HoraSalida"=>'required',

          ];

          $validator = Validator::make($request->all(), $horarios);
          if($validator->fails()){
              return response()->json(['errors' => "Horario no ingresado"],422);
          }
          $dateTime1 = \DateTime::createFromFormat('g:ia', $request->HoraEntrada);
          $dateTime2 = \DateTime::createFromFormat('g:ia', $request->HoraSalida);
          if ($dateTime1 === false) {
              return response()->json(['errors' => "El campo hora de entrada no tiene un formato correcto"],422);

          }
          if ($dateTime2 === false) {
              return response()->json(['errors' => "El campo hora de salida no tiene un formato correcto"],422);

          }


          if ($dateTime1 > $dateTime2) {
              return response()->json(['errors' => "El campo hora de entrada no puede ser mayor al campo hora de salida"],422);
          }


          if($request->HoraEntrada == $request->HoraSalida){
              return response()->json(['errors' => "El campo hora de entrada no puede tener el mismo valor que el del campo horario de salida"],422);
          }

          $campo=[
              "Area"=>'required|string',
              "RolAsignado"=>'required|string',
              "Observacion"=>'required|string',

          ];
          $validacion = Validator::make($request->all(), $campo);
          if($validacion->fails()){
              return response()->json(['errors' => "Digite los campos vacios"],422);
          }

          $verify = Reportes::where('IdAlumno', $request->IdEstudiante)
              ->where('IdMaestro',session('datos')->first()->Identificacion)
              ->first();

          if(!$verify){
              $supervision=['IdAlumno'=>$request->IdEstudiante, 'IdMaestro' =>$request->IdDocente
                  ,'HoraEntrada'=>$request->HoraEntrada,'HoraSalida'=>$request->HoraSalida,'Area'=>$request->Area
                  ,'Observacion'=>$request->Observacion, 'RolAsignado'=>$request->RolAsignado];

              Reportes::insert($supervision);

              return response()->json(['success'=>'Reporte creado de manera exitosa']);

          }
          $supervision=['IdAlumno'=>$request->IdEstudiante, 'IdMaestro' =>$request->IdDocente
              ,'HoraEntrada'=>$request->HoraEntrada,'HoraSalida'=>$request->HoraSalida,'Area'=>$request->Area
              ,'Observacion'=>$request->Observacion, 'RolAsignado'=>$request->RolAsignado];
          $verify->update($supervision);
          return response()->json(['success'=>'Reporte actualizado de manera exitosa']);

        }
        public function indexEvidencia(){
            $datos= GrupoxMaestro::where('IdMaestro', '=',session('datos')->first()->Identificacion)->get();
            foreach ($datos as $dato) {
                $dato->conteo = Estudiante::where('idGrupo', '=', $dato->IdGrupo)->count();
            }
            $rol = Session::get('rol');
            $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();
            return view('Maestro/evidencia',compact('datos','secciones'));

        }


        public function indexasignaciones($id){
            $verificacion = GrupoxMaestro::where('IdGrupo','=',$id)->where('IdMaestro','=',session('datos')->first()->Identificacion)
            ->where('Estado','=',1)->first();
            if(!$verificacion){
                return redirect()->back();
            }
            $idGrupo = $id;
            $unidades = Unidad::all();
            $tipoUnidad = Evaluacion::all();
            $datos= Evaluaciones::where('IdGrupo', '=',$id)->get();
            $puntos = Evaluaciones::where('IdGrupo', '=',$id)->where('Estado','=',1)->sum('Puntaje');
            foreach ($datos as $evaluacion) {
                $fechaNacimiento = $evaluacion->FechaCreacion;
                $evaluacion->FechaCreacion = Carbon::parse($fechaNacimiento)->format('d/m/Y');

            }
            $rol = Session::get('rol');
            $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();
            return view('Maestro/subpage/asignadas',compact('idGrupo','unidades','tipoUnidad','datos','secciones','puntos'));

        }


        public function SupervisionListado($id){
            $verificacion = GrupoxMaestro::where('IdGrupo','=',$id)->where('IdMaestro','=',session('datos')->first()->Identificacion)
                ->where('Estado','=',1)->first();

            if(empty($verificacion)){
                return redirect()->back();
            }
            $resultado = GrupoMaestro::where('Identificacion', '=', $id)->first();
            $alumnos= Estudiante::where('idGrupo', '=', $id)->get();
            $rol = Session::get('rol');
            $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();
            return view('Maestro/subpage/ListadoSupervision',compact('resultado','alumnos','secciones'));


        }

        public function EvidenciaListado($id){
            $verificacion = GrupoxMaestro::where('IdGrupo','=',$id)->where('IdMaestro','=',session('datos')->first()->Identificacion)
                ->where('Estado','=',1)->first();

            if(empty($verificacion)){
                return redirect()->back();
            }
            $resultado = GrupoMaestro::where('Identificacion', '=', $id)->first();
            $alumnos= Estudiante::where('idGrupo', '=', $id)->get();
            $rol = Session::get('rol');
            $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();
            return view('Maestro/subpage/ListadoEvidencia',compact('resultado','alumnos','secciones'));

        }

        public function EvidenciaVista($id){

            $consulta = Estudiante::where('Identificacion','=',$id)->first();
            $verificacion = GrupoxMaestro::where('IdMaestro','=',session('datos')->first()->Identificacion)
                ->where('IdGrupo','=',$consulta->idGrupo)
                ->where('Estado','=',1)->first();
            if(empty($verificacion)){
                return redirect()->back();
            }
            $evidencias = EvidenciaEstudiante::where('idEstudiante','=', $id)->get();
            foreach ($evidencias as $evidencia) {
                $fecha = $evidencia->EvidenciasBusqueda->Fecha;
                $evidencia->EvidenciasBusqueda->Fecha = Carbon::parse($fecha)->format('d/m/Y');

            }
            $rol = Session::get('rol');
            $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();
            return view('Maestro/subpage/EvideciaView',compact('evidencias','secciones'));

        }


        public function SupervisionVista($id){
            $resultado = Estudiante::where('Identificacion' , '=' , $id)->first();

            $verificacion = GrupoxMaestro::where('IdMaestro','=',session('datos')->first()->Identificacion)
                ->where('IdGrupo','=',$resultado->idGrupo)
                ->where('Estado','=',1)->first();
            if(empty($verificacion)){
                return redirect()->back();
            }

            $identificador= $id;
            $tipoSupervision = CatSupervisiones::all();
            $informaciones= Supervisiones::where('idEstudiante', '=',$identificador)->get();
            foreach ($informaciones as $supervision) {
                $fecha = $supervision->FechaSupervision;
                $supervision->FechaSupervision = Carbon::parse($fecha)->format('d/m/Y');

            }
            $rol = Session::get('rol');
            $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();
            return view('Maestro/subpage/SupervisionView',compact('resultado','informaciones','identificador','tipoSupervision','secciones'));

        }

            public function indexEvaCorregida(){

                $datos= GrupoxMaestro::where('IdMaestro', '=',session('datos')->first()->Identificacion)->get();
                foreach ($datos as $dato) {
                    $dato->conteo = Estudiante::where('idGrupo', '=', $dato->IdGrupo)->count();
                }
                $rol = Session::get('rol');
                $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();


                return view('Maestro/evaluacioncorregida',compact('datos','secciones'));
            }


            public function CorreccionCalificacion($id){

                $verificacion = GrupoxMaestro::where('IdGrupo','=',$id)->where('IdMaestro','=',session('datos')->first()->Identificacion)
                    ->where('Estado','=',1)->first();

                if(empty($verificacion)){
                    return redirect()->back();
                }else{
                $estudiantes =Estudiante::where('idGrupo',$id)->get();
                $datos= Evaluaciones::where('IdGrupo', '=',$id)->get();
                $rol = Session::get('rol');
                $secciones = RolesXPermisos::where('Roles_id',$rol)->orderBy('Permisos_Id','asc')->get();


                $i = 1;
                $t = 1;
                $idgrupo = $id;
                return view('Maestro/subpage/corregidas',compact('estudiantes','datos','i','idgrupo','t'
               ,'secciones' ));
                }
            }

            public function CorreccionGuardar(Request $request){
                $calificaciones = $request->all('notas');


                $count = count($calificaciones);

                foreach ($calificaciones as $calificacion){
                    foreach ($calificacion as $item){

                        foreach ($item as $d){

                                if(isset($d['notacion'])){
                                    $id=$d['notacion'];
                                    $registro = EvaluacionXNotas::where('id', $id)->first();
                                    $notas =$d['nota'];
                                    if ($registro) {
                                        $registro->nota = $notas;
                                        $registro->save();
                                    }




                                }else{
                                    $campos = ['idEstudiante'=>$d['Identificacion'],'idEvaluacion'=>$d['IdEvaluacion'],'nota'=>$d['nota']];
                                    EvaluacionXNotas::insert($campos);
                                }







                        }



                    }


                }


                return back()->with('exito', 'Calificaciones guardadas exitosamente');














            }


            public function notaCentro(Request $request){
                $campo=[
                    "Fechainicio"=>'required|date',
                    "Fechafinal"=>'required|date',
                    "Nota"=>'required|numeric'
                ];
                $vacios = Validator::make($request->all(),$campo);
                if ($vacios->fails()) {
                    return response()->json(['errors' => "Digite lo espacios en blanco"],422);
                }
                $fechaInicio = Carbon::parse($request->Fechainicio);
                $fechaFin = Carbon::parse($request->Fechafinal);
                $diferenciaEnDias = $fechaInicio->diffInDays($fechaFin);

                if($fechaInicio->greaterThan($fechaFin)){
                    return response()->json(['errors' => "El campo fecha de inicio debe ser menor al campo de fecha de finalización"],422);
                }

                if($diferenciaEnDias < 30 ){
                    return response()->json(['errors' => "El tiempo de pasantía debe ser minimo de 30 dias"],422);
                }

                $nota=[
                    "Nota"=>'numeric|min:60|max:100'
                ];
                $minmax = Validator::make($request->all(),$nota);
                if ($minmax->fails()) {
                    return response()->json(['errors' => "El campo puntaje solo admite como valor minimo 60 y valor maximo 100"],422);
                }

                $verificacion = EvaluacionCentro::where('IdEstudiante',$request->IdMaestro)
                    ->where('IdMaestro',$request->IdEstudiante)->where('IdEmpresa',$request->IdEmpresa)->first();

                if(empty($verificacion)){
                    $datos = ['IdEstudiante'=>$request->IdMaestro,'IdMaestro'=>$request->IdEstudiante,'IdEmpresa'=>$request->IdEmpresa,
                        'FechaInicio'=>$request->Fechainicio,'FechaFinal'=>$request->Fechafinal,'Nota'=>$request->Nota];
                    EvaluacionCentro::insert($datos);
                    return response()->json(['success'=>"Datos almacenados correctamente"]);
                }else{
                    $datos = ['IdEstudiante'=>$request->IdMaestro,'IdMaestro'=>$request->IdEstudiante,'IdEmpresa'=>$request->IdEmpresa,
                        'FechaInicio'=>$fechaInicio,'FechaFinal'=>$fechaFin,'Nota'=>$request->Nota];
                    $verificacion->update($datos);
                    return response()->json(['success'=>"Datos actualizados correctamente"]);
                }




            }

        public function GuardarGrupoMaestro(Request $request){

            $imagen=[
                "fotoGrupo"=>'max:10000|mimes:jpeg,png,jpg|file',
            ];
            $mensaje=[
                'imagen.file' => 'El archivo debe ser una imagen válida.',
                'imagen.mimes' => 'La imagen debe ser de formato JPG, JPEG o PNG.',
                'imagen.max' => 'La imagen no puede ser mayor de 100 MB.',
            ];

            $campo=[
                "NombreGrupo"=>'required|string|max:50',
            ];
            $validator = Validator::make($request->all(), $imagen, $mensaje);

            $vacios = Validator::make($request->all(),$campo,$mensaje);

            if ($vacios->fails()) {
                return response()->json(['errors' => "Digite lo espacios en blanco"],422);
            }
            if($validator->fails()) {
                return response()->json(['errors' => "Formato de archivo no compatible"],422);
            }

            if(isset($request->IdGrupo)){
                $grupito =GrupoMaestro::find($request->IdGrupo);
                if($request->hasFile('fotoGrupo')){
                    $archivo=$request->file("fotoGrupo");
                    $foto = $archivo->storeAs('public/Grupos', $archivo->getClientOriginalName());
                    $grupo = ['Nombre'=>$request->NombreGrupo ,'RutaImagen'=>$foto];
                    $grupito->update($grupo);
                    return response()->json(['success' => "Grupo actualizado exitosamente"]);
                }
                $grupo = ['Nombre'=>$request->NombreGrupo];
                $grupito->update($grupo);
                return response()->json(['success' => "Grupo actualizado exitosamente"]);

            }

            $longitud = 8;
            $caracteres= "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";

            $codigo = Str::random($longitud);

            $archivo=$request->file("fotoGrupo");

            while (GrupoMaestro::where('Identificacion', $codigo)->exists()) {
                // Si el código ya existe, genera otro código
                $codigo = Str::random($longitud);
            }
            $foto="";
            $maestroId=session('datos')->first()->Identificacion;
            if($request->hasFile('fotoGrupo')){
                $foto = $archivo->storeAs('public/Grupos', $archivo->getClientOriginalName());

                $grupo = ['Identificacion' => $codigo ,'Nombre'=>$request->NombreGrupo ,'Estado' => 1,'RutaImagen'=>$foto];
                GrupoMaestro::insert($grupo);

                $grupoMaestro =['IdGrupo'=>$codigo,'IdMaestro'=>$maestroId,'Estado'=>1];
                GrupoxMaestro::insert($grupoMaestro);
                return response()->json(['success' => "Grupo almacenado exitosamente"]);
            }
            $grupo = ['Identificacion' => $codigo ,'Nombre'=>$request->NombreGrupo ,'Estado' => 1];
            GrupoMaestro::insert($grupo);
           $grupoMaestro =['IdGrupo'=>$codigo,'IdMaestro'=>$maestroId,'Estado'=>1];
            GrupoxMaestro::insert($grupoMaestro);

            return response()->json(['success' => "Grupo almacenado exitosamente"]);








        }

        public function GrupoEliminar($id){
       ////     return session('datos')->first()->Nombres;
            $grupito = GrupoMaestro::find($id);
            $grupitoXMaestro= GrupoxMaestro::where('IdGrupo', $id)->first();
            if (!$grupito) {
                return back()->with('Fracaso', 'Grupo no encontrado');
            }

            // Actualiza solo el campo 'nombre'
            $grupito->update(['Estado' => 0]);
            $grupitoXMaestro->update(['Estado' => 0]);
            return back()->with('exito', 'Grupo eliminado exitosamente');
        }

        public function GuardarEvaluaciones(Request $request,$id){
            $tipo=[
                "TipoId" => "required"
            ];
            $unidad=[
                "UnidadId" => "required",
            ];
            $mensaje=[
                'imagen.file' => 'El archivo debe ser una imagen válida.',
                'imagen.mimes' => 'La imagen debe ser de formato JPG, JPEG o PNG.',
                'imagen.max' => 'La imagen no puede ser mayor de 100 MB.',
            ];

            $campo=[
                "Titulo"=>'required|string|max:50',
                "Descripcion"=>'required|string',
                "puntaje"=>'min:1 | required',

            ];
            $puntaje=[
                "puntaje"=>'numeric|between:0,20',

            ];


            $validator = Validator::make($request->all(), $tipo, $mensaje);
            $validatorUnidad = Validator::make($request->all(), $unidad, $mensaje);


            $vacios = Validator::make($request->all(),$campo,$mensaje);
            $puntos = Validator::make($request->all(),$puntaje,$mensaje);

            if ($vacios->fails()) {
                return response()->json(['errors' => "Digite lo espacios en blanco"],422);
            }
            if($validatorUnidad->fails()) {
                return response()->json(['errors' => "No ha seleccionado la unidad"],422);
            }
            if($validator->fails()) {
                return response()->json(['errors' => "No ha seleccionado el tipo de evaluación"],422);
            }
            if($puntos->fails()) {
                return response()->json(['errors' => "El campo puntaje debe guardarse entre 0 y 20"],422);
            }
            $puntuacion = Evaluaciones::where('IdGrupo', '=',$id)->where('Estado','=',1)->sum('Puntaje');
            if(isset($request->IdEvaluacion)){

                $suma = $puntuacion + $request->puntaje;
                if($suma>100){
                    return response()->json(['errors' => "No puede sobrepasar la puntuacion maxima de 100 puntos "],422);
                }


                $evaluacion= Evaluaciones::find($request->IdEvaluacion);
                $parametros = ['Nombre'=>$request->Titulo,'Descripcion'=>$request->Descripcion
                    ,'IdUnidad'=>$request->UnidadId,'IdTipo'=>$request->TipoId,'Puntaje'=>$request->puntaje];
                $evaluacion->update($parametros);
                return response()->json(['success' => "Evaluación actualizada exitosamente"]);



            }

            $suma = $puntuacion + $request->puntaje;
            if($suma>100){
                $restante = 100 - $puntuacion;
                return response()->json(['errors' => "No puede sobrepasar la puntuacion maxima de 100 puntos solo puedes realizar una evaluación con un puntaje de ".$restante],422);
            }

            $fechaHoy = Carbon::now();
            $fechaFormateada = $fechaHoy->format('Y-m-d');
            $evaluacion=['Nombre'=>$request->Titulo,'Descripcion'=>$request->Descripcion
            ,'IdUnidad'=>$request->UnidadId,'IdTipo'=>$request->TipoId,'IdGrupo'=>$request->grupoId
            ,'FechaCreacion'=>$fechaFormateada,'Puntaje'=>$request->puntaje,'Estado'=>1];

            Evaluaciones::insert($evaluacion);
            return response()->json(["success"=>"Evaluación almacenada de manera exitosa"]);
        }

        public function GuardarSupervision(Request $request){
            $campo=[
                "Observacion"=>'required|string',
                "FechaAgregar"=>'required'
            ];

            $validator = Validator::make($request->all(), $campo);

            if($validator->fails()) {
                return response()->json(['errors' => "Digite lo espacios en blanco"],422);
            }

            $company=[
                "IdEmpresa"=>'required'
            ];

            $validation = Validator::make($request->all(), $company);

            if($validation->fails()) {
                return response()->json(['errors' => "Estudiante no tiene centro de practica disponible"],422);
            }



            if(empty($request->IdSupervision)){
                $fechacarbon = Carbon::parse($request->FechaAgregar);
                $fechaFormateada = $fechacarbon->format('Y-m-d');
                $supervision=['idEstudiante'=>$request->IdEstudiante, 'idDocente' =>$request->IdDocente
                    ,'IdTipoSupervision'=>$request->TipoSupervision,'IdEmpresa'=>$request->IdEmpresa,'FechaSupervision'=>$fechaFormateada
                    ,'Observacion'=>$request->Observacion, 'Estado'=>1];

                Supervisiones::insert($supervision);
                return response()->json(["success"=>"Supervisión almacenada de manera exitosa"]);

            }else{
                $fechacarbon = Carbon::parse($request->FechaAgregar);
                $fechaFormateada = $fechacarbon->format('Y-m-d');
                $supervision= Supervisiones::find($request->IdSupervision);
                $parametros = ['idEstudiante'=>$request->IdEstudiante, 'idDocente' =>$request->IdDocente
                    ,'IdTipoSupervision'=>$request->TipoSupervision,'IdEmpresa'=>$request->IdEmpresa,'FechaSupervision'=>$fechaFormateada
                    ,'Observacion'=>$request->Observacion, 'Estado'=>1];
                $supervision->update($parametros);
                return response()->json(['success' => "Supervision actualizada exitosamente"]);







            }






        }

        public function EliminarSupervision($id){
            $supervision = Supervisiones::find($id);
            if (!$supervision) {
                return response()->json(['errors'=>'Supervisión no encontrada',422]);

            }

            // Actualiza solo el campo 'nombre'
            $supervision->update(['Estado' => 0]);

            return response()->json(['success'=>'Supervisión eliminada exitosamente']);

        }

        public function EvaluacionEliminar($id){

            $evaluacion = Evaluaciones::find($id);
            if (!$evaluacion) {
                return back()->with('Fracaso', 'Evaluación no encontrada');
            }

            // Actualiza solo el campo 'nombre'
            $evaluacion->update(['Estado' => 0]);
            return back()->with('exito', 'Evaluación eliminada exitosamente');
        }

    }
