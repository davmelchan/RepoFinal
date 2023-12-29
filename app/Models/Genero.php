<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;
    protected $table = 'Tb_genero';
    protected $primaryKey = 'IdGenero';
    public $timestamps = false;
    protected $fillable= ['Nombre', 'Estado'];

    public function maestros(){
        return $this->belongsTo(Maestros::class,'idGenero');
    }
}
