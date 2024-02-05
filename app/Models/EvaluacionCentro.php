<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionCentro extends Model
{
    use HasFactory;
    protected $table = 'EvaluacionCentro';
    protected $primaryKey = 'idEvaluacionCentro';
    public $timestamps = false;
    protected $fillable= ['IdEstudiante','IdMaestro','IdEmpresa','FechaInicio','FechaFinal','Nota'];

}
