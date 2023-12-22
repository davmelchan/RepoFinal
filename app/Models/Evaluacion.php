<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;
    protected $table = 'Cat_evaluacion';
    protected $primaryKey = 'IdCatEvaluacion';
    public $timestamps = false;
    protected $fillable= ['Nombre','Estado'];
}
