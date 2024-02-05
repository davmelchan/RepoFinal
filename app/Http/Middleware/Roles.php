<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Exception;
use Symfony\Component\HttpFoundation\Response;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        if(isset(auth()->user()->IdRol) && isset(auth()->user()->Estado)){

            if(auth()->user()->IdRol == 1 && auth()->user()->Estado == 1){
                $reponse =$next($request);
                $reponse->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
                return $reponse;
            }
            return redirect()->back();





        }else{
            return redirect()->to('/');
        }

    }
}
