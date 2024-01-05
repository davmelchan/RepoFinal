<?php

namespace App\Http\Controllers;

use App\Models\Evaluacion;
use App\Models\Evaluaciones;
use App\Models\Grupo;
use App\Models\GrupoMaestro;
use App\Models\Grupos;
use App\Models\GrupoxMaestro;
use App\Models\Unidad;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
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

            return view('Maestro/maestro',compact('datos'));
        }

        public function indexEvaluaciones(){
            $datos= GrupoxMaestro::where('IdMaestro', '=',session('datos')->first()->Identificacion)->get();
            return view('Maestro/evaluacionasignada',compact('datos'));
        }
        public function indexasignaciones($id){

            $idGrupo = $id;
            $unidades = Unidad::all();
            $tipoUnidad = Evaluacion::all();
            $datos= Evaluaciones::where('IdGrupo', '=',$id)->get();
            foreach ($datos as $evaluacion) {
                $fechaNacimiento = $evaluacion->FechaCreacion;
                $evaluacion->FechaCreacion = Carbon::parse($fechaNacimiento)->format('d/m/Y');

            }
            return view('Maestro/subpage/asignadas',compact('idGrupo','unidades','tipoUnidad','datos'));

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
                "Descripcion"=>'required|string|max:50'
            ];
            $validator = Validator::make($request->all(), $tipo, $mensaje);
            $validatorUnidad = Validator::make($request->all(), $unidad, $mensaje);


            $vacios = Validator::make($request->all(),$campo,$mensaje);

            if ($vacios->fails()) {
                return response()->json(['errors' => "Digite lo espacios en blanco"],422);
            }
            if($validatorUnidad->fails()) {
                return response()->json(['errors' => "No ha seleccionado la unidad"],422);
            }
            if($validator->fails()) {
                return response()->json(['errors' => "No ha seleccionado el tipo de evaluación"],422);
            }


            if(isset($request->IdEvaluacion)){
                $evaluacion= Evaluaciones::find($request->IdEvaluacion);
                $parametros = ['Nombre'=>$request->Titulo,'Descripcion'=>$request->Descripcion
                    ,'IdUnidad'=>$request->UnidadId,'IdTipo'=>$request->TipoId];
                $evaluacion->update($parametros);
                return response()->json(['success' => "Evaluación actualizada exitosamente"]);



            }

            $fechaHoy = Carbon::now();
            $fechaFormateada = $fechaHoy->format('Y-m-d');
            $evaluacion=['Nombre'=>$request->Titulo,'Descripcion'=>$request->Descripcion
            ,'IdUnidad'=>$request->UnidadId,'IdTipo'=>$request->TipoId,'IdGrupo'=>$request->grupoId
            ,'FechaCreacion'=>$fechaFormateada,'Estado'=>1];

            Evaluaciones::insert($evaluacion);
            return response()->json(["success"=>"Evaluación almacenada de manera exitosa"]);
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
