<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TareaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'usuario_id'    => $this->usuario_id,
            'categoria_id'  => $this->categoria_id,
            'titulo'        => $this->titulo,
            'descripcion'   => $this->descripcion,
            'fecha_inicio'  => $this->fecha_inicio,
            'fecha_fin'     => $this->fecha_fin,
            'fecha_cierre'  => $this->fecha_cierre,
            'estado'        => $this->estado,
            'creado_en'     => $this->created_at->format('d/m/Y H:i'),
        ];
    }
}
