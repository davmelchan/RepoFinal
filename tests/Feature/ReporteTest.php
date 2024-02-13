<?php

namespace Tests\Feature;

use App\Models\Reportes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReporteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {

        $reporte= new Reportes([
            'IdAlumno'=>'69696969' ,
            'IdMaestro'=>'87878787' ,
            'HoraEntrada'=>'6:00am' ,
            'HoraSalida'=>'7:30am' ,
            'Observacion'=>'Se realizo todo de manera exitosa' ,
            'Area'=>'Aulas de secundaria' ,
            'RolAsignado'=>'Docente de ingles' ,

        ]);
        $reporte->save();

        $this->assertDatabaseHas('ReportesTb',[
            'IdAlumno'=>'69696969' ,
            'IdMaestro'=>'87878787' ,
            'HoraEntrada'=>'6:00am' ,
            'HoraSalida'=>'7:30am' ,
            'Observacion'=>'Se realizo todo de manera exitosa' ,
            'Area'=>'Aulas de secundaria' ,
            'RolAsignado'=>'Docente de ingles' ,
        ]);
    }

    public function test_actualizacion(): void
    {

        $verificar= Reportes::where('IdAlumno','=','69696969')->where('IdMaestro','=','87878787') ->first();
        $verificar->update([
            'HoraEntrada'=>'6:00am' ,
            'HoraSalida'=>'7:30am' ,
        ]);

        $this->assertDatabaseHas('Tb_unidad',[
            'IdUnidad'=> 7,
            'Nombre'=>'Writing Avanzado'
        ]);

    }


}
