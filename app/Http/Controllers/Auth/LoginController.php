<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Maestros;
use App\Models\RolesxPermisos;
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



                if($user->Estado == 1) {
                    if ($user->password === md5($request->clave)) {
                        Auth::login($user);
                        $user->update(['password' => Hash::make($request->clave)]);
                        $request->session()->regenerate();
                        Session::put('rol', $user->IdRol);
                        $resultados = User::where('Identificacion', $request->identificacion)->get();
                        Session::put('datos',$resultados);
                        $url = RolesxPermisos::where('Roles_id','=',$user->IdRol)->orderBy('Permisos_Id','asc')->first();
                        $redireccion = route($url->permisos->Ruta);
                        return redirect()->intended($redireccion);

                    }
                    if(Hash::needsRehash($user->password)){

                        return redirect('/')->with("mensaje","Identificación y contraseña no coinciden");

                    }else{

                        if (Hash::check($request->clave, $user->password)) {
                            Auth::login($user);
                            $user->update(['password' => Hash::make($request->clave)]);
                            $request->session()->regenerate();
                            Session::put('rol', $user->IdRol);
                            $resultados = User::where('Identificacion', $request->identificacion)->get();
                            Session::put('datos',$resultados);
                            $url = RolesxPermisos::where('Roles_id','=',$user->IdRol)->orderBy('Permisos_Id','asc')->first();
                            $redireccion = route($url->permisos->Ruta);
                            return redirect()->intended($redireccion);

                        }


                    }

                    return redirect('/')->with("mensaje","Identificación y contraseña no coinciden");


                }else{
                    return redirect('/')->with("mensaje","Usuario no activo");
                }





        }else{
            return redirect('/')->with("mensaje","Usuario no registrado");
        }







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
