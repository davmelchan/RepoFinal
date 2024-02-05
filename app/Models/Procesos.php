<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procesos extends Model
{
    use HasFactory;

    protected $table = 'Procesos';
    protected $primaryKey = 'IdProceso';
    public $timestamps = false;
    protected $fillable= ['NombrePermiso', 'Ruta'];
}
