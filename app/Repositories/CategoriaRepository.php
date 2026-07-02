<?php
namespace App\Repositories;
use App\Models\Categoria;

class CategoriaRepository
{
    public function todos()
    {
        return Categoria::all();
    }

    public function buscarPorId(int $id)
    {
        return Categoria::find($id);
    }

    public function crear(array $datos)
    {
        return Categoria::create($datos);
    }

    public function actualizar(Categoria $categoria, array $datos)
    {
        $categoria->update($datos);
        return $categoria;
    }

    public function eliminar(Categoria $categoria)
    {
        $categoria->delete();
    }
}