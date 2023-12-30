<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MaestroController extends Controller
{

    public function logoutMaestro(Request $request,Redirector $redirect){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function indexGrupo(){
        $datos['grupos'] = Grupo::all();
        return view('Maestro/maestro',$datos);
    }


    public function GuardarGrupo(Request $request){

        $campos=[
            "NombreGrupo"=>'required|string|max:50',
            "fotoGrupo"=>'max:10000|mimes:jpeg,png,jpg|file',


        ];
        $mensaje=[
            'required'=>'El :attribute es obligatorio',
            'imagen.file' => 'El archivo debe ser una imagen válida.',
            'imagen.mimes' => 'La imagen debe ser de formato JPG, JPEG o PNG.',
            'imagen.max' => 'La imagen no puede ser mayor de 100 MB.',
        ];
        $validator = Validator::make($request->all(), $campos, $mensaje);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Procesa el archivo si la validación es exitosa
        // ...

        $longitud = 8;
        $caracteres= "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";

        $codigo = Str::random($longitud);
        $archivo=$request->file("fotoGrupo");

        while (Grupo::where('IdGrupo', $codigo)->exists()) {
            // Si el código ya existe, genera otro código
            $codigo = Str::random($longitud);
        }
        $foto="";
        if($request->hasFile('fotoGrupo')){
            $foto = $archivo->storeAs('Grupo', $archivo->getClientOriginalName());
        }



        $grupo = ['IdGrupo'=>$codigo,'Nombre'=>$request->NombreGrupo,'RutaImagen'=>$foto,'Estado'=>1];
        Grupo::insert($grupo);
        return response()->json(['success' => "Grupo almacenado exitosamente"]);







    }


}
