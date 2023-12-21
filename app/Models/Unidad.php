<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;
    protected $table = 'Tb_unidad';
    protected $primaryKey = 'IdUnidad';
    public $timestamps = false;
    protected $fillable= ['Nombre', 'Estado'];

}
