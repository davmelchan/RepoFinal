<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvidenciaEstudiante extends Model
{
    use HasFactory;

    protected $table = 'EvidenciasXEstudiante';
    protected $primaryKey = 'IdEvidenciaXEstudiante';
    public $timestamps = false;
    protected $fillable= ['idEvidencia', 'idEstudiante','Estado'];

    protected $casts = [
        'idEstudiante' => 'string',

    ];


    public function EvidenciasBusqueda(){
        return $this->hasOne(Evidencias::class,'idEvidencia','idEvidencia');
    }

}
