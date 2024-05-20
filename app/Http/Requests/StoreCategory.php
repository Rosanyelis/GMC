<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategory extends FormRequest
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
            'name' => ['required', 'string', 'unique:'.Category::class],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "El nombre de Categoria es obligatorio.",
            'name.string' => "El nombre de Categoria debe de ser un texto.",
            'name.unique' => "El nombre de Categoria ya se encuentra registrado.",
        ];
    }
}
