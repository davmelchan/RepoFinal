<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
    use HasFactory;
    protected $table = 'Tb_Tracker';
    protected $primaryKey = 'IdTracker';
    public $timestamps = false;
    protected $fillable= ['Titulo', 'Estado','Activo','Activo','IdEstudiante','FechaInicio','FechaFinalizacion'];

}
