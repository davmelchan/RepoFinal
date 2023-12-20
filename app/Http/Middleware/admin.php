<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session()->has('rol')){
            if(session()->get('rol') == 1){
                $reponse =$next($request);
                $reponse->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
                return $reponse;
            }else{
                return redirect()->back();
            }
        }
        return redirect()->to('/');
    }
}
