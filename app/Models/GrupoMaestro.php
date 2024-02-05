<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoMaestro extends Model
{
    use HasFactory;
    protected $table = 'Grupos';
    protected $primaryKey = 'Identificacion';
    public $timestamps = false;
    protected $fillable= ['Identificacion', 'Nombre','RutaImagen','Estado'];

    protected $casts = [
      'Identificacion' => 'string'
    ];

}
