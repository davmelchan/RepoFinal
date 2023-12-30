<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoxMaestro extends Model
{
    use HasFactory;
    protected $table = 'GrupoXMaestro';
    protected $primaryKey = 'IdgrupoMaestro';
    public $timestamps = false;
    protected $fillable= ['IdGrupo', 'IdMaestro','Estado'];



}
