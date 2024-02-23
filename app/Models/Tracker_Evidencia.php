<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracker_Evidencia extends Model
{
    use HasFactory;
    protected $table = 'Tracker_Evidencia';
    protected $primaryKey = 'IdTracker';
    public $timestamps = false;
    protected $fillable= ['TrackerId', 'EvidenciaId'];


}
