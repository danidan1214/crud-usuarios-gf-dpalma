<?php

namespace App\Http\Requests;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUsuarioRequest extends FormRequest
{
    /**
     * Determina si el usuario esta autorizado para hacer esta peticion.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validacion para crear un usuario.
     *
     * @return array<string, array<int, string|Rule>>
     */
    public function rules(): array
    {
        return $this->rulesFor(null);
    }

    /**
     * Reglas compartidas entre alta y actualizacion.
     *
     * @param  Model|null  $ignore  Modelo a ignorar en las reglas unique (edicion).
     * @return array<string, array<int, string|Rule>>
     */
    protected function rulesFor(?Model $ignore = null): array
    {
        $phoneRegex = '/^[0-9+\-\s()]+$/';

        return [
            'identificacion' => ['required', 'string', 'max:20', Rule::unique('usuarios', 'identificacion')->ignore($ignore)],
            'nombre_usuario' => ['required', 'string', 'max:50', Rule::unique('usuarios', 'nombre_usuario')->ignore($ignore)],
            'apellidos' => ['required', 'string', 'max:100'],
            'nombres' => ['required', 'string', 'max:100'],
            'fecha_nacimiento' => ['required', 'date', 'before:today'],
            'celular' => ['required', 'string', 'max:20', 'regex:'.$phoneRegex],
            'telefono' => ['nullable', 'string', 'max:20', 'regex:'.$phoneRegex],
            'correo_personal' => ['required', 'email', 'max:150', Rule::unique('usuarios', 'correo_personal')->ignore($ignore)],
            'estado_civil' => ['required', 'in:soltero,casado,divorciado,viudo,union_libre'],
            'sexo' => ['required', 'in:masculino,femenino,otro'],
            'direccion' => ['nullable', 'string', 'max:255'],
        ];
    }

    /**
     * Nombres legibles de los atributos para los mensajes de error.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'identificacion' => 'identificacion',
            'nombre_usuario' => 'nombre de usuario',
            'apellidos' => 'apellidos',
            'nombres' => 'nombres',
            'fecha_nacimiento' => 'fecha de nacimiento',
            'celular' => 'celular',
            'telefono' => 'telefono',
            'correo_personal' => 'correo personal',
            'estado_civil' => 'estado civil',
            'sexo' => 'sexo',
            'direccion' => 'direccion',
        ];
    }
}