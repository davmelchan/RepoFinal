<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisiones extends Model
{
    use HasFactory;
    protected $table = 'Supervision_Tb';
    protected $primaryKey = 'idSupervision';
    public $timestamps = false;
    protected $fillable= ['idEstudiante', 'idDocente','idEmpresa','FechaSupervision','Observacion','Estado','IdTipoSupervision'];

    protected $casts = [
        'idEstudiante' => 'string',
        'idDocente' => 'string',
    ];

    public function catSupervision()
    {
        return $this->hasOne(CatSupervisiones::class,'IdCatSupervision','IdTipoSupervision');
    }
    public function Maestros()
    {
        return $this->hasOne(Maestros::class,'Identificacion','idDocente');
    }

    public function Company()
    {
        return $this->hasOne(Empresa::class,'IdEmpresa','idEmpresa');
    }

}
