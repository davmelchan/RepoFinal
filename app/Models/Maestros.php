<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maestros extends Model
{
    use HasFactory;
    protected $table = 'Maestro';
    protected $primaryKey = 'Identificacion';
    public $timestamps = false;
    protected $fillable= ['Identificacion', 'especialidad','idGenero',
        'FotoRuta','Estado','Nombres','Apellidos'];

    public function Genero(){
        return $this->hasOne(Genero::class,'IdGenero','idGenero');
    }
    public function infoUsuario(){
        return $this->hasOne(User::class,'Identificacion','Identificacion');
    }
}
