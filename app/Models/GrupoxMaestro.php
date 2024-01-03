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

    protected $casts = [
        'IdGrupo' => 'string',
        'IdMaestro' => 'string'
    ];
    public function GruposMaestro(){
        return $this->hasOne(GrupoMaestro::class,'Identificacion','IdGrupo');
    }



}
