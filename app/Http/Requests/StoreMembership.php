<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMembership extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'unique:memberships,name'],
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'duration' => ['required', 'numeric', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El Nombre de la membresía es obligatoria',
            'name.unique' => 'El Nombre de la membresía ya existe',
            'name.max' => 'El Nombre de la membresía no debe ser mayor a 255 caracteres',
            'name.string' => 'El Nombre de la membresía debe ser una cadena de texto',
            'description.required' => 'La Descripción es obligatoria',
            'description.max' => 'La Descripción no debe ser mayor a 255 caracteres',
            'description.string' => 'La Descripción debe ser una cadena de texto',
            'price.required' => 'El Precio de la membresia es obligatoria',
            'price.numeric' => 'El Precio de la membresia debe ser un número',
            'price.min' => 'El Precio de la membresia debe ser mayor o igual a 0',
            'duration.min' => 'La Duración de la membresia debe ser mayor o igual a 0',
            'duration.numeric' => 'La Duración de la membresia debe ser un número',
            'duration.required' => 'La Duración de la membresia es obligatoria',
        ];
    }
}
