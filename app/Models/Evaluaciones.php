<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluaciones extends Model
{
    use HasFactory;

    protected $table = 'Tb_Evaluaciones';
    protected $primaryKey = 'IdEvaluacion';
    public $timestamps = false;
    protected $fillable= ['Nombre','Descripcion','IdUnidad','IdTipo','IdGrupo','FechaCreacion','Estado'];

    public function UnidadesEvaluacion(){
        return $this->hasOne(Unidad::class,'IdUnidad','IdUnidad');
    }
    public function TipoEvaluacion(){
        return $this->hasOne(Evaluacion::class,'IdCatEvaluacion','IdTipo');

    }

}
