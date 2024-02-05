<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'Tb_empresa';
    protected $primaryKey = 'IdEmpresa';
    public $timestamps = false;
    protected $fillable= ['Nombre', 'Descripcion','Responsable','Estado','TelResponsable'];
}
