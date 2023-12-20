<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Couchbase\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    public function logout(Request $request,Redirector $redirect){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function index(){

        $datos['roles'] = Roles::all();
        return view('Administrador/rol',$datos);
    }

    public function GuardarRol  (Request $request){
        $rol = ['Nombre'=>$request->NombreRol,'Estado'=>1];
        Roles::insert($rol);
        Return back()->with('exito','Rol guardado exitosamente');

    }

    public function destroy($id){
        $rol = Roles::find($id);
        if (!$rol) {
            Return back()->with('Fracaso','Rol no encontrado');
        }

        // Actualiza solo el campo 'nombre'
        $rol->update(['Estado' => 0]);

        Return back()->with('exito','Rol eliminado exitosamente');
    }
   public function eliminar($id){
        return $id;
        $rol = Roles::find($id);
       if (!$rol) {
          Return back()->with('Fracaso','Rol no encontrado');
       }

       // Actualiza solo el campo 'nombre'
       $rol->update(['Estado' => 0]);

       Return back()->with('exito','Rol eliminado exitosamente');
   }
}
