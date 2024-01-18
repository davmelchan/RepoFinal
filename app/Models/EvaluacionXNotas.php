<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionXNotas extends Model
{
    use HasFactory;
    protected $table = 'EvaluacionXNotas';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable= ['idEstudiante', 'idEvaluacion','Nota'];

    protected $casts = [
        'idEstudiante' => 'string',
    ];



}
