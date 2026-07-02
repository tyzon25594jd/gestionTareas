<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTareaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'usuario_id'    => 'sometimes|exists:users,id',
            'categoria_id'  => 'sometimes|exists:categorias,id',
            'titulo'        => 'sometimes|string|max:255',
            'descripcion'   => 'nullable|string',
            'fecha_inicio'  => 'sometimes|date',
            'fecha_fin'     => 'sometimes|date|after_or_equal:fecha_inicio',
            'fecha_cierre'  => 'nullable|date',
            'estado'        => 'sometimes|in:pendiente,en_progreso,completada,cancelada',
        ];
    }
}
