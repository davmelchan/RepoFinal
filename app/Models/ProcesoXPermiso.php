<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcesoXPermiso extends Model
{
    use HasFactory;
    protected $table = 'ProcesosXPermiso';
    protected $primaryKey = 'IdProcesoXPermiso';
    public $timestamps = false;
    protected $fillable= ['Proceso_Id', 'Permiso_Id'];
}
