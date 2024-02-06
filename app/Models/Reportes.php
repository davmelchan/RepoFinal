<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reportes extends Model
{
    use HasFactory;
    protected $table = 'ReportesTb';
    protected $primaryKey = 'IdReporte';
    public $timestamps = false;
    protected $fillable= ['IdAlumno', 'IdMaestro', 'HoraEntrada','HoraSalida','Observacion','Area','RolAsignado'];
}
