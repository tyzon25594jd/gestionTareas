<?php
namespace App\Repositories;
use App\Models\Tarea;

class TareaRepository
{
    public function todos()
    {
        return Tarea::all();
    }

    public function buscarPorId(int $id)
    {
        return Tarea::find($id);
    }

    public function crear(array $datos)
    {
        return Tarea::create($datos);
    }

    public function actualizar(Tarea $tarea, array $datos)
    {
        $tarea->update($datos);
        return $tarea;
    }

    public function eliminar(Tarea $tarea)
    {
        $tarea->delete();
    }
}
