<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Permisos;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Permisos::create(['NombrePermiso'=>'Guardar Maestro','Ruta'=>'SaveTeacher','Icono'=>'null','Titulo'=>'Ninguno']);
        Permisos::create(['NombrePermiso'=>'Eliminar Maestro','Ruta'=>'teacher.destroy','Icono'=>'null','Titulo'=>'Ninguno']);
        Permisos::create(['NombrePermiso'=>'Guardar Estudiante','Ruta'=>'SaveStudent','Icono'=>'null','Titulo'=>'Ninguno']);
        Permisos::create(['NombrePermiso'=>'Eliminar Estudiante','Ruta'=>'student.destroy','Icono'=>'null','Titulo'=>'Ninguno']);
        Permisos::create(['NombrePermiso'=>'Guardar Centro de practica','Ruta'=>'SaveCompany','Icono'=>'null','Titulo'=>'Ninguno']);
        Permisos::create(['NombrePermiso'=>'Eliminar Centro de practica','Ruta'=>'empresa.destroy','Icono'=>'null','Titulo'=>'Ninguno']);
        Permisos::create(['NombrePermiso'=>'Guardar unidad','Ruta'=>'Adminstrador.Guardar.Unidad','Icono'=>'null','Titulo'=>'Ninguno']);
        Permisos::create(['NombrePermiso'=>'Eliminar unidad','Ruta'=>'unidad.destroy','Icono'=>'null','Titulo'=>'Ninguno']);
        Permisos::create(['NombrePermiso'=>'Guardar Categoria Evaluacion','Ruta'=>'Administrador.Guardar.CategoriaEvaluacion','Icono'=>'null','Titulo'=>'Ninguno']);
        Permisos::create(['NombrePermiso'=>'Eliminar Categoria Evaluacion','Ruta'=>'catevaluacion.destroy','Icono'=>'null','Titulo'=>'Ninguno']);
        Permisos::create(['NombrePermiso'=>'Guardar Categoria Supervision','Ruta'=>'Administrador.Guardar.CategoriaSupervision','Icono'=>'null','Titulo'=>'Ninguno']);
        Permisos::create(['NombrePermiso'=>'Eliminar Categoria Supervision','Ruta'=>'supervision.destroy','Icono'=>'null','Titulo'=>'Ninguno']);
        Permisos::create(['NombrePermiso'=>'Guardar Genero','Ruta'=>'SaveGenero','Icono'=>'null','Titulo'=>'Ninguno']);
        Permisos::create(['NombrePermiso'=>'Eliminar Genero','Ruta'=>'genero.destroy','Icono'=>'null','Titulo'=>'Ninguno']);
        Permisos::create(['NombrePermiso'=>'Guardar Rol','Ruta'=>'SaveRol','Icono'=>'null','Titulo'=>'Ninguno']);
        Permisos::create(['NombrePermiso'=>'Eliminar Rol','Ruta'=>'rol.destroy','Icono'=>'null','Titulo'=>'Ninguno']);

    }
}
