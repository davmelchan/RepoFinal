<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Maestros;
use App\Models\User;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    public function login(Request $request){

        $user = User::where('Identificacion',$request->identificacion)->first();

        if(isset($user->IdRol)){
            if($user->IdRol == 1){
                if($user->Estado == 1){
                if($user->password === md5($request->clave)){
                    Auth::login($user);
                    $user->update(['password' => Hash::make($request->clave)]);
                    $request->session()->regenerate();
                    Session::put('rol',$user->IdRol );
                    return redirect()->intended('administrador');

                }
                    if(Hash::needsRehash($user->password)){

                        return redirect('/')->with("mensaje","Identificación y contraseña no coinciden");

                    }else {
                        if (Hash::check($request->clave, $user->password)) {
                            Auth::login($user);
                            $user->update(['password' => Hash::make($request->clave)]);
                            $request->session()->regenerate();
                            Session::put('rol', $user->IdRol);
                            return redirect()->intended('administrador');//->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');

                        }
                    }

                    return redirect('/')->with("mensaje","Identificación y contraseña no coinciden");

                }else{
                    return redirect('/')->with("mensaje","Usuario no activo");
                }

            }

            if($user->IdRol == 26){
                if($user->Estado == 1) {
                    if ($user->password === md5($request->clave)) {
                        Auth::login($user);
                        $user->update(['password' => Hash::make($request->clave)]);
                        $request->session()->regenerate();
                        Session::put('rol', $user->IdRol);
                        $resultados = Maestros::where('Identificacion', $request->identificacion)->get();
                        Session::put('datos',$resultados);
                        return redirect()->intended('maestro');

                    }
                    if(Hash::needsRehash($user->password)){

                        return redirect('/')->with("mensaje","Identificación y contraseña no coinciden");

                    }else{

                        if (Hash::check($request->clave, $user->password)) {
                            Auth::login($user);
                            $user->update(['password' => Hash::make($request->clave)]);
                            $request->session()->regenerate();
                            Session::put('rol', $user->IdRol);
                            $resultados = Maestros::where('Identificacion', $request->identificacion)->get();
                            Session::put('datos',$resultados);
                            return redirect()->intended('maestro');

                        }


                    }

                    return redirect('/')->with("mensaje","Identificación y contraseña no coinciden");


                }else{
                    return redirect('/')->with("mensaje","Usuario no activo");
                }

            }

            if($user->IdRol == 29){
                if($user->Estado == 1) {
                    if ($user->password === md5($request->clave)) {
                        Auth::login($user);
                        $user->update(['password' => Hash::make($request->clave)]);
                        $request->session()->regenerate();
                        Session::put('rol', $user->IdRol);
                        $resultados = Estudiante::where('Identificacion',$request->identificacion)->get();
                        Session::put('datos',$resultados);
                        return redirect()->intended('EstudianteView');

                    }

                    if(Hash::needsRehash($user->password)){

                        return redirect('/')->with("mensaje","Identificación y contraseña no coinciden");

                    }else {
                        if (Hash::check($request->clave, $user->password)) {
                            Auth::login($user);
                            $user->update(['password' => Hash::make($request->clave)]);
                            $request->session()->regenerate();
                            Session::put('rol', $user->IdRol);
                            $resultados = Estudiante::where('Identificacion', $request->identificacion)->get();
                            Session::put('datos', $resultados);
                            return redirect()->intended('EstudianteView');

                        }
                    }
                    return redirect('/')->with("mensaje","Identificación y contraseña no coinciden");

                }else{
                    return redirect('/')->with("mensaje","Usuario no activo");
                }

            }

        }else{
            return redirect('/')->with("mensaje","Usuario no registrado");
        }

        return redirect('/')->with("mensaje","Usuario no encontrado");





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
