<?php

namespace App\Services;

use App\Repositories\TareaRepository;

class TareaService
{
    public function __construct(
        private TareaRepository $repository
    ) {}

    public function obtenerTodos()
    {
        return $this->repository->todos();
    }

    public function obtenerPorId(int $id)
    {
        return $this->repository->buscarPorId($id);
    }

    public function crear(array $datos)
    {
        return $this->repository->crear($datos);
    }

    public function actualizar(int $id, array $datos)
    {
        $tarea = $this->repository->buscarPorId($id);

        if (!$tarea) {
            return null;
        }

        return $this->repository->actualizar($tarea, $datos);
    }

    public function eliminar(int $id)
    {
        $tarea = $this->repository->buscarPorId($id);

        if (!$tarea) {
            return false;
        }

        $this->repository->eliminar($tarea);
        return true;
    }
}
