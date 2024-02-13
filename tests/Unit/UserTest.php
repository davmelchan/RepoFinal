<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function CrearUsuario(): void
    {
        $usuarioAlumno= factory(User::create([
            'Identificacion' => 21212121,
            'password' => '2878ccbbb2c9bc2a72575404b3abb825',
            'FechaCreacion'=>'2024-02-8',
            'Estado'=> 1,
            'IdRol' => 26
        ]));

        $this->assertDatabaseHas('usuario',[
            'Identificacion' => 21212121,
            'password' => '2878ccbbb2c9bc2a72575404b3abb825',
            'FechaCreacion'=>'2024-02-8',
            'Estado'=> 1,
            'IdRol' => 26
        ]);



    }
}
