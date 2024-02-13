<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class PruebaUsuario extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $usuarioAlumno= new User([
            'Identificacion' => 45678912,
            'password' => '2878ccbbb2c9bc2a72575404b3abb825',
            'FechaCreacion'=> '8-02-2024',
            'Estado'=> 1,
            'IdRol' => 26
        ]);
        $usuarioAlumno->save();

        $this->assertDatabaseHas('usuario',[
            'Identificacion' => 45678912,
            'password' => '2878ccbbb2c9bc2a72575404b3abb825',
            'FechaCreacion'=> '8-02-2024',
            'Estado'=> 1,
            'IdRol' => 26
        ]);
    }
}
