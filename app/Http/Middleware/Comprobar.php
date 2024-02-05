<?php

namespace App\Http\Middleware;

use App\Models\RolesxPermisos;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;


class Comprobar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            $rutaActual = $request->route()->getName();
            $verify = DB::table('RolesXPermisos')
                ->join('Permisos','RolesXpermisos.Permisos_Id','=','Permisos.Id')
                ->where('RolesXpermisos.Roles_id','=', auth()->user()->IdRol)
                ->where('Permisos.Ruta','=', $rutaActual)->first();

            $verifyProceso = DB::table('ProcesoXPermiso')
                ->join('Procesos','ProcesoXPermiso.Proceso_Id','=','Procesos.IdProceso')
                ->where('Procesos.Ruta','=', $rutaActual)->first();



            if(isset($verify)){

                $reponse =$next($request);
                $reponse->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
                return $reponse;
            }
            if(isset($verifyProceso)){
                $reponse =$next($request);
                $reponse->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
                return $reponse;
            }



            return redirect()->back();
        }

        return redirect()->to('/');


    }
}
