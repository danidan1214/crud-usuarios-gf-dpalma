<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define el estado por defecto del modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $estadoCivil = $this->faker->randomElement(['soltero', 'casado', 'divorciado', 'viudo', 'union_libre']);
        $sexo = $this->faker->randomElement(['masculino', 'femenino', 'otro']);

        return [
            'identificacion' => $this->faker->unique()->numerify('17########'),
            'nombre_usuario' => $this->faker->unique()->userName(),
            'apellidos' => $this->faker->lastName().' '.$this->faker->lastName(),
            'nombres' => $this->faker->firstName(),
            'fecha_nacimiento' => $this->faker->date('Y-m-d', '2005-12-31'),
            'celular' => $this->faker->numerify('0#########'),
            'telefono' => $this->faker->optional(0.6)->numerify('0#######'),
            'correo_personal' => $this->faker->unique()->safeEmail(),
            'estado_civil' => $estadoCivil,
            'sexo' => $sexo,
            'direccion' => $this->faker->optional(0.8)->streetAddress(),
        ];
    }
}