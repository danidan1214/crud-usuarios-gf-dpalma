<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioResource extends JsonResource
{
    /**
     * Transforma el recurso en un array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'identificacion' => $this->identificacion,
            'nombre_usuario' => $this->nombre_usuario,
            'apellidos' => $this->apellidos,
            'nombres' => $this->nombres,
            'fecha_nacimiento' => $this->fecha_nacimiento?->toDateString(),
            'celular' => $this->celular,
            'telefono' => $this->telefono,
            'correo_personal' => $this->correo_personal,
            'estado_civil' => $this->estado_civil,
            'sexo' => $this->sexo,
            'direccion' => $this->direccion,
            'created_at' => $this->created_at?->toIso8601String(),
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}