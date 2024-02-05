<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'Estudiante';
    protected $primaryKey = 'Identificacion';
    public $timestamps = false;
    protected $fillable= ['Identificacion', 'Direccion','idGenero','idGrupo','idEmpresa',
        'rutaImagen','Estado','Nombres','Apellidos','Telefono'];

    public function Genero(){
        return $this->hasOne(Genero::class,'IdGenero','idGenero');
    }
    public function Empresa(){
        return $this->hasOne(Empresa::class,'IdEmpresa','idEmpresa');
    }

    public function notasVer(){
        return $this->hasOne(EvaluacionXNotas::class,'idEstudiante','Identificacion');
    }


}
