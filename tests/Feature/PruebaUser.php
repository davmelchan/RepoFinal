<?php

namespace Tests\Feature;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PruebaUser extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $fechaHoy = Carbon::now();
        $usuarioAlumno= new User([
            'Identificacion' => 45678911,
            'password' => '2878ccbbb2c9bc2a72575404b3abb825',
            'FechaCreacion'=> $fechaHoy,
            'Estado'=> 1,
            'IdRol' => 26
        ]);
        $usuarioAlumno->save();

        $this->assertDatabaseHas('usuario',[
            'Identificacion' => 45678911,
            'password' => '2878ccbbb2c9bc2a72575404b3abb825',
            'FechaCreacion'=> $fechaHoy,
            'Estado'=> 1,
            'IdRol' => 26
        ]);
    }
}
