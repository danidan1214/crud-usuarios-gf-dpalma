<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsuarioRequest extends StoreUsuarioRequest
{
    /**
     * Reglas de validacion para actualizar un usuario.
     *
     * Omite el propio registro de las restricciones unique para permitir
     * guardar los campos sin cambios.
     *
     * @return array<string, array<int, string|\Illuminate\Validation\Rule>>
     */
    public function rules(): array
    {
        return $this->rulesFor($this->route('usuario'));
    }
}