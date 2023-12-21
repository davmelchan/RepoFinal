<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Roles;
use App\Models\Unidad;
use Couchbase\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    public function logout(Request $request, Redirector $redirect)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }




///Rol
    public function indexRol()
    {

        $datos['roles'] = Roles::all();
        return view('Administrador/rol', $datos);
    }

    public function GuardarRol(Request $request)
    {

        if (isset($request->IdRol)) {
            $rol = Roles::find($request->IdRol);
            if (!$rol) {
                return back()->with('Fracaso', 'Rol no encontrado');
            }

            // Actualiza solo el campo 'nombre'
            $rol->update(['Nombre' => $request->NombreRol]);

            return back()->with('exito', 'Rol actualizado exitosamente');
        } else {

            $rol = ['Nombre' => $request->NombreRol, 'Estado' => 1];
            Roles::insert($rol);
            return back()->with('exito', 'Rol guardado exitosamente');
        }
    }

    public function destroy($id)
    {
        $rol = Roles::find($id);
        if (!$rol) {
            return back()->with('Fracaso', 'Rol no encontrado');
        }

        // Actualiza solo el campo 'nombre'
        $rol->update(['Estado' => 0]);

        return back()->with('exito', 'Rol eliminado exitosamente');
    }


///Genero
    public function indexGenero(){
        $datos['genero'] = Genero::all();
        return view('Administrador/genero', $datos);
    }

    public function GuardarGenero(Request $request){
        if(isset($request->IdGenero)){
            $genero = Genero::find($request->IdGenero);
            if (!$genero) {
                return back()->with('Fracaso', 'Género no encontrado');
            }

            // Actualiza solo el campo 'nombre'
            $genero->update(['Nombre' => $request->NombreGenero]);

            return back()->with('exito', 'Género actualizado exitosamente');


        }
        $genero = ['Nombre' => $request->NombreGenero, 'Estado' => 1];
        Genero::insert($genero);
        return back()->with('exito', 'Género guardado exitosamente');
    }
    public function EliminarGenero($id){
        $genero = Genero::find($id);
        if (!$genero) {
            return back()->with('Fracaso', 'Género no encontrado');
        }

        // Actualiza solo el campo 'nombre'
        $genero->update(['Estado' => 0]);

        return back()->with('exito', 'Género eliminado exitosamente');
    }


////Unidad
    public function indexUnidad(){
        $datos['unidades'] = Unidad::all();
        return view('Administrador/unidades', $datos);
    }
    public function GuardarUnidad(Request $request){
        if(isset($request->IdUnidad)){

            $unidad = Unidad::find($request->IdUnidad);
            if (!$unidad) {
                return back()->with('Fracaso', 'Unidad no encontrada');
            }

            // Actualiza solo el campo 'nombre'
            $unidad->update(['Nombre' => $request->NombreUnidad]);

            return back()->with('exito', 'Unidad actualizada exitosamente');


        }

        $unidad = ['Nombre' => $request->NombreUnidad, 'Estado' => 1];
        Unidad::insert($unidad);
        return back()->with('exito', 'Unidad guardada exitosamente');
    }
    public function EliminarUnidad($id){
        $unidad = Unidad::find($id);
        if (!$unidad) {
            return back()->with('Fracaso', 'Unidad no encontrada');
        }

        // Actualiza solo el campo 'nombre'
        $unidad->update(['Estado' => 0]);

        return back()->with('exito', 'Unidad eliminada exitosamente');
    }


////Empresa
    public function indexEmpresa(){
       // $datos['centros'] = Empresa::all();
        return view('Administrador/empresa');
    }

}
