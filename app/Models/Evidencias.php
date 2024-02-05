<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidencias extends Model
{
    use HasFactory;

    protected $table = 'Evidencias_Tb';
    protected $primaryKey = 'idEvidencia';
    public $timestamps = false;
    protected $fillable= ['Nombre', 'Descripcion','idEmpresa','Fecha','RutaArchivo','Estado','NombreArchivo'];
    public function EvidenciasEstudiante(){
        return $this->hasOne(Evidencias::class,'idEvidencia','idEvidencia');
    }
}
