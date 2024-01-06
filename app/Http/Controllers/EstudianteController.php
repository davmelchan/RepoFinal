<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstudianteController extends Controller
{
    public function index(){


        return view('Estudiante/index');

    }

    public function indexEvidencia(){


        return view('Estudiante/estudianteEvidencia');

    }
    public function indexSupervision(){


        return view('Estudiante/indexsupervision');

    }
    public function indexSetting(){

        return view('Estudiante/setting');

    }

    public function logoutAlumno (Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


}
