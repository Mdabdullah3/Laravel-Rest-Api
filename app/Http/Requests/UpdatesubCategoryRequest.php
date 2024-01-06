<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255|unique:sub_categories,name,' . $this->route('subcategories'),
            'category_id' => 'sometimes|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'The Sub Category name must be a string.',
            'name.max' => 'The Sub category name must not exceed 255 characters.',
            'name.unique' => 'The Sub category name is already taken.',
            'category_id.exists' => 'The selected category is invalid.',
        ];
    }
}
