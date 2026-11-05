<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategorieRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            // Hné n9ollou Laravel: t'akked el slug unique, ama ena7i el catégorie li n'beddlouha taw
            'slug' => [
                'required', 'string', 'max:255',
                Rule::unique('categories', 'slug')->ignore($this->categorie),
            ],
        ];
    }
}