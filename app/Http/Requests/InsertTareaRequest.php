<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertTareaRequest extends FormRequest
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
            'usuario_id'    => 'required|exists:users,id',
            'categoria_id'  => 'required|exists:categorias,id',
            'titulo'        => 'required|string|max:255',
            'descripcion'   => 'nullable|string',
            'fecha_inicio'  => 'required|date',
            'fecha_fin'     => 'required|date|after_or_equal:fecha_inicio',
            'fecha_cierre'  => 'nullable|date',
            'estado'        => 'nullable|in:pendiente,en_progreso,completada,cancelada',
        ];
    }
}
