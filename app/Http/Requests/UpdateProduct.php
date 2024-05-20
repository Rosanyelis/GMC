<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProduct extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'unique:products,name,' . $this->id],
            'description' => ['required', 'string', 'max:255'],
            'category_id' => ['required'],
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del producto es obligatorio.',
            'name.unique' => 'El nombre del producto ya existe.',
            'name.max' => 'El nombre del producto no puede ser mayor a 255 caracteres.',
            'description.max' => 'La descripción del producto no puede ser mayor a 255 caracteres.',
            'description.required' => 'La descripción del producto es obligatoria.',
            'category_id.required' => 'La categoría del producto es obligatoria.',
            'price.required' => 'El precio del proyecto es obligatorio.',
            'price.min' => 'El precio del proyecto debe ser mayor o igual a 0.',
            'price.numeric' => 'El precio del proyecto debe ser un valor numérico.',
            'image.image' => 'La imagen del proyecto debe ser una imagen.',
            'image.mimes' => 'La imagen del proyecto debe ser una imagen de tipo: jpeg, png, jpg, gif o svg.',
            'image.max' => 'La imagen del proyecto no debe ser mayor a 2048 kilobytes.',
        ];
    }
}
