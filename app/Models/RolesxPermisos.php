<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesxPermisos extends Model
{
    use HasFactory;
    protected $table = 'RolesXPermisos';
    protected $primaryKey = 'idRolesXPermisos';
    public $timestamps = false;
    protected $fillable= ['Permisos_Id', 'Roles_id'];

    public function permisos(){
        return $this->hasOne(Permisos::class,'Id','Permisos_Id');
    }
}
