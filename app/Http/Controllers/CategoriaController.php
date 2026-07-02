<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Http\Resources\CategoriaResource;
use App\Services\CategoriaService;

class CategoriaController extends Controller
{
    public function __construct(
        private CategoriaService $service
    ) {}

    public function index()
    {
        return CategoriaResource::collection($this->service->obtenerTodos());
    }

    public function store(InsertCategoriaRequest $request)
    {
        $categoria = $this->service->crear($request->validated());
        return new CategoriaResource($categoria);
    }

    public function show(string $id)
    {
        $categoria = $this->service->obtenerPorId($id);

        if (!$categoria) {
            return response()->json(['mensaje' => 'Categoría no encontrada'], 404);
        }

        return new CategoriaResource($categoria);
    }

    public function update(UpdateCategoriaRequest $request, string $id)
    {
        $categoria = $this->service->actualizar($id, $request->validated());

        if (!$categoria) {
            return response()->json(['mensaje' => 'Categoría no encontrada'], 404);
        }

        return new CategoriaResource($categoria);
    }

    public function destroy(string $id)
    {
        $eliminado = $this->service->eliminar($id);

        if (!$eliminado) {
            return response()->json(['mensaje' => 'Categoría no encontrada'], 404);
        }

        return response()->json(['mensaje' => 'Categoría eliminada']);
    }
}
