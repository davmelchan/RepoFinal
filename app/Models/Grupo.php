<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $table = 'Tb_grupo';
    protected $primaryKey = 'IdGrupo';
    public $timestamps = false;
    protected $fillable= ['Nombre', 'Estado','rutaImagen'];


}
