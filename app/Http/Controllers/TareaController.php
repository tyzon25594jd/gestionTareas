<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertTareaRequest;
use App\Http\Requests\UpdateTareaRequest;
use App\Http\Resources\TareaResource;
use App\Services\TareaService;

class TareaController extends Controller
{
    public function __construct(
        private TareaService $service
    ) {}

    public function index()
    {
        return TareaResource::collection($this->service->obtenerTodos());
    }

    public function store(InsertTareaRequest $request)
    {
        $tarea = $this->service->crear($request->validated());
        return new TareaResource($tarea);
    }

    public function show(string $id)
    {
        $tarea = $this->service->obtenerPorId($id);

        if (!$tarea) {
            return response()->json(['mensaje' => 'Tarea no encontrada'], 404);
        }

        return new TareaResource($tarea);
    }

    public function update(UpdateTareaRequest $request, string $id)
    {
        $tarea = $this->service->actualizar($id, $request->validated());

        if (!$tarea) {
            return response()->json(['mensaje' => 'Tarea no encontrada'], 404);
        }

        return new TareaResource($tarea);
    }

    public function destroy(string $id)
    {
        $eliminado = $this->service->eliminar($id);

        if (!$eliminado) {
            return response()->json(['mensaje' => 'Tarea no encontrada'], 404);
        }

        return response()->json(['mensaje' => 'Tarea eliminada']);
    }
}
