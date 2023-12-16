<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    public function login(Request $request){

        $user = User::where('carnet',$request->identificacion)->first();
        if(isset($user->IdRol)){
            if($user->IdRol == 1){

                if($user->password === md5($request->clave)){
                    Auth::login($user);
                    $user->update(['password' => Hash::make($request->clave)]);
                    $request->session()->regenerate();
                    Session::put('rol',$user->IdRol );
                    return redirect()->intended('administrador');

                }
                if(Hash::check($request->clave, $user->password)){
                    Auth::login($user);
                    $user->update(['password' => Hash::make($request->clave)]);
                    $request->session()->regenerate();
                    Session::put('rol',$user->IdRol );
                    return redirect()->intended('administrador');//->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');

                }


            }

            if($user->IdRol == 2){

                if($user->password === md5($request->clave)){
                    Auth::login($user);
                    $user->update(['password' => Hash::make($request->clave)]);
                    $request->session()->regenerate();
                    Session::put('rol',$user->IdRol );
                    return redirect()->intended('maestro');

                }
                if(Hash::check($request->clave, $user->password)){
                    Auth::login($user);
                    $user->update(['password' => Hash::make($request->clave)]);
                    $request->session()->regenerate();
                    Session::put('rol',$user->IdRol );
                    return redirect()->intended('maestro');

                }


            }

        }
        return redirect('/');






/*

        if(Auth::attempt($request->only('carnet','password'))){
          return "Logiado";
            /*  $request->session()->regenerate();
            return redirect()->intended('welcome');

          }
       */
        //return redirect()->intended('welcome');
  //      return redirect()->intended('/');

    }
}
