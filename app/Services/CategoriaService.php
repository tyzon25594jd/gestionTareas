<?php

namespace App\Services;

use App\Repositories\CategoriaRepository;

class CategoriaService
{
    public function __construct(
        private CategoriaRepository $repository
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
        $categoria = $this->repository->buscarPorId($id);

        if (!$categoria) {
            return null;
        }

        return $this->repository->actualizar($categoria, $datos);
    }

    public function eliminar(int $id)
    {
        $categoria = $this->repository->buscarPorId($id);

        if (!$categoria) {
            return false;
        }

        $this->repository->eliminar($categoria);
        return true;
    }
}