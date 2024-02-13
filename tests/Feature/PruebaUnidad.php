<?php

namespace Tests\Feature;

use App\Models\Unidad;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PruebaUnidad extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {

        $unidad= new Unidad([
            'Nombre'=>'Listening' ,
            'Estado' => 1
        ]);
        $unidad->save();

        $this->assertDatabaseHas('Tb_unidad',[
            'Nombre'=>'Listening' ,
            'Estado' => 1
        ]);
    }

    /**
      @return void
     */
    public function test_actualizacion(): void
    {

        $verificar= Unidad::where('IdUnidad','=',7)->first();
        $verificar->update([
            'Nombre'=>'Writing Avanzado'
        ]);

        $this->assertDatabaseHas('Tb_unidad',[
           'IdUnidad'=> 7,
           'Nombre'=>'Writing Avanzado'
        ]);

    }
    public function test_eliminacion():void
    {

        $verificar= Unidad::where('IdUnidad','=',11)->first();
        $verificar->update([
            'Estado'=> '0'
        ]);

        $this->assertDatabaseHas('Tb_unidad',[
            'IdUnidad'=> 11,
            'Estado'=> 0
        ]);

    }



    }

