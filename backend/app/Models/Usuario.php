<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    /**
     * Tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * Atributos asignables masivamente.
     *
     * @var list<string>
     */
    protected $fillable = [
        'identificacion',
        'nombre_usuario',
        'apellidos',
        'nombres',
        'fecha_nacimiento',
        'celular',
        'telefono',
        'correo_personal',
        'estado_civil',
        'sexo',
        'direccion',
    ];

    /**
     * Atributos ocultos en la serializacion.
     *
     * @var list<string>
     */
    protected $hidden = [];

    /**
     * Conversion de tipos de los atributos.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'fecha_nacimiento' => 'date',
        ];
    }
}