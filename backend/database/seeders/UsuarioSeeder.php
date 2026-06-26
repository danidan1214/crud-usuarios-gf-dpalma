<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Carga usuarios de ejemplo en la base de datos.
     */
    public function run(): void
    {
        // Registros base (idempotentes por identificacion).
        $base = [
            [
                'identificacion' => '1723456789',
                'nombre_usuario' => 'jgarcia',
                'apellidos' => 'Garcia Lopez',
                'nombres' => 'Juan',
                'fecha_nacimiento' => '1990-05-12',
                'celular' => '0987654321',
                'telefono' => '022123456',
                'correo_personal' => 'juan@example.com',
                'estado_civil' => 'soltero',
                'sexo' => 'masculino',
                'direccion' => 'Av. Amazonas 123, Quito',
            ],
            [
                'identificacion' => '1719876543',
                'nombre_usuario' => 'mperez',
                'apellidos' => 'Perez Mendoza',
                'nombres' => 'Maria',
                'fecha_nacimiento' => '1992-09-23',
                'celular' => '0991234567',
                'telefono' => null,
                'correo_personal' => 'maria@example.com',
                'estado_civil' => 'casado',
                'sexo' => 'femenino',
                'direccion' => 'Av. 6 de Diciembre 456',
            ],
            [
                'identificacion' => '1798765432',
                'nombre_usuario' => 'lvega',
                'apellidos' => 'Vega Torres',
                'nombres' => 'Luis',
                'fecha_nacimiento' => '1988-03-30',
                'celular' => '0967891234',
                'telefono' => '023456789',
                'correo_personal' => 'luis@example.com',
                'estado_civil' => 'union_libre',
                'sexo' => 'masculino',
                'direccion' => 'Calle Bolivar 789',
            ],
        ];

        foreach ($base as $datos) {
            Usuario::firstOrCreate(
                ['identificacion' => $datos['identificacion']],
                $datos
            );
        }

        // Registros adicionales aleatorios.
        Usuario::factory(5)->create();
    }
}