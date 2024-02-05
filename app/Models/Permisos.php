<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
    use HasFactory;

    protected $table = 'Permisos';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable= ['NombrePermiso', 'Ruta','Icono'];

    public function permisos(){
        return $this->hasOne(ProcesoXPermiso::class,'Permisos_Id','Id');
    }

}
