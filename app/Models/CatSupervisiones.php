<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatSupervisiones extends Model
{
    use HasFactory;
    protected $table = 'Cat_supervision';
    protected $primaryKey = 'IdCatSupervision';
    public $timestamps = false;
    protected $fillable= ['Nombre','Estado'];
}
