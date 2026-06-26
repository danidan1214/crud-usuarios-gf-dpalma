<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Http\Resources\UsuarioResource;
use App\Models\Usuario;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class UsuarioController extends Controller
{
    /**
     * Listar usuarios.
     */
    public function index(): AnonymousResourceCollection
    {
        return UsuarioResource::collection(
            Usuario::orderBy('id', 'desc')->get()
        );
    }

    /**
     * Crear un usuario.
     */
    public function store(StoreUsuarioRequest $request): JsonResponse
    {
        $usuario = Usuario::create($request->validated());

        return (new UsuarioResource($usuario))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Consultar un usuario.
     */
    public function show(Usuario $usuario): UsuarioResource
    {
        return new UsuarioResource($usuario);
    }

    /**
     * Actualizar un usuario.
     */
    public function update(UpdateUsuarioRequest $request, Usuario $usuario): UsuarioResource
    {
        $usuario->update($request->validated());

        return new UsuarioResource($usuario);
    }

    /**
     * Eliminar un usuario.
     */
    public function destroy(Usuario $usuario): Response
    {
        $usuario->delete();

        return response()->noContent();
    }
}