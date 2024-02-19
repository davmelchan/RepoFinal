<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class loginfixer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard=null): Response
    { $reponse = $next($request);
        if(Auth::check()) {

            $rutaActual = $request->route()->getName();

            if($request->getPathInfo()=='/'){
                $verify = DB::table('RolesXPermisos')
                    ->join('Permisos', 'RolesXpermisos.Permisos_Id', '=', 'Permisos.Id')
                    ->where('RolesXpermisos.Roles_id', '=', auth()->user()->IdRol)
                    ->where('Permisos.Ruta', '=', $rutaActual)->first();
                if(isset($verify)) {
                    $redirectUrl = Session::get('redirect_url');

                    // Modificar la URL de redirección en la solicitud
                    if ($redirectUrl) {
                        $request->headers->set('referer', $redirectUrl);
                    }

                    return $next($request);
                }
            }
            return $next($request);
        }
        $reponse = $next($request);
        $reponse->header('Cache-Control', 'no-cache, no-store, must-revalidate');
        $reponse->header('Pragma', 'no-cache');
        return $reponse;




    }
}
