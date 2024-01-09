<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Evaluaciones;
use App\Models\GrupoMaestro;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        return view('Estudiante/index',compact('empresas','resultado','evaluaciones'));

    }

    public function comprobar(Request $request)
    {
        if($request->IdForm==1) {
            if (empty($request->Empresa)) {

                $campo=[
                    "EmpresaName"=>'required|string',
                    "Descripcion"=>'required|string',
                    "Responsable"=>'required|string',
                    "IdGrupo"=>'required|string'
                ];

                $vacios = Validator::make($request->all(),$campo);
                if ($vacios->fails()) {
                    return response()->json(['errors' => "Digite lo espacios en blanco"],422);
                }




                $nuevoRegistro = new Empresa;
                $nuevoRegistro->Nombre = $request->EmpresaName;
                $nuevoRegistro->Descripcion = $request->Descripcion;
                $nuevoRegistro->Responsable = $request->Responsable;
                $nuevoRegistro->Estado = 1;
                $nuevoRegistro->save();
                $idRegistro = $nuevoRegistro->IdEmpresa;
                $estudiante = Estudiante::find(session('datos')->first()->Identificacion);
                $info = ['idEmpresa' => $idRegistro ];
                $estudiante->update($info);
                $verificar = GrupoMaestro::find($request->IdGrupo);
                if (!$verificar) {
                    return response()->json(['errors' => "Grupo no encontrado"],422);

                } else {
                    if ($verificar->Estado == 1) {




                        $info = ['idGrupo' => $request->IdGrupo ];
                        $estudiante->update($info);
                        return response()->json(['success' => "Datos almacenados exitosamente"]);
                    }


                }

            }else {
                $campo=[
                    "Empresa"=>'required',
                    "IdGrupo"=>'required|string'
                ];

                $vacios = Validator::make($request->all(),$campo);
                if ($vacios->fails()) {
                    return response()->json(['errors' => "Digite lo espacios en blanco"],422);
                }



                $estudiante = Estudiante::find(session('datos')->first()->Identificacion);
                $info = ['idEmpresa' => $request->Empresa];
                $estudiante->update($info);


                $verificar = GrupoMaestro::find($request->IdGrupo);
                if (!$verificar) {
                    return response()->json(['errors' => "Grupo no encontrado"],422);

                } else {
                    if ($verificar->Estado == 1) {




                        $info = ['idGrupo' => $request->IdGrupo ];
                        $estudiante->update($info);
                        return response()->json(['success' => "Datos almacenados exitosamente"]);
                    }
                    return response()->json(['errors' => "Grupo no activo"],422);

                }




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

            } else {
                if ($verificar->Estado == 1) {


                    $estudiante = Estudiante::find(session('datos')->first()->Identificacion);

                    $info = ['idGrupo' => $request->IdGrupo];
                    $estudiante->update($info);
                    return response()->json(['success' => "Datos almacenados exitosamente"]);
                }
                return response()->json(['errors' => "Grupo no activo"],422);



            }

        }


        return response()->json(['error' => "Datos no han sido almacenados "]);

    }



    public function indexEvidencia(){


        return view('Estudiante/estudianteEvidencia');

    }
    public function indexSupervision(){


        return view('Estudiante/indexsupervision');

    }
    public function indexSetting(){

        return view('Estudiante/setting');

    }

    public function logoutAlumno (Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


}
