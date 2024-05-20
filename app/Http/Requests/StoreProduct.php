<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'unique:products,name'],
            'description' => ['required', 'string', 'max:255'],
            'category_id' => ['required'],
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
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
            'price.required' => 'El precio del producto es obligatorio.',
            'price.min' => 'El precio del producto debe ser mayor o igual a 0.',
            'price.numeric' => 'El precio del producto debe ser un valor numérico.',
            'image.required' => 'La imagen del producto es requerida.',
            'image.image' => 'La imagen del producto debe ser una imagen.',
            'image.mimes' => 'La imagen del producto debe ser una imagen de tipo: jpeg, png, jpg, gif o svg.',
            'image.max' => 'La imagen del producto no debe ser mayor a 2048 kilobytes.',
        ];
    }
}
