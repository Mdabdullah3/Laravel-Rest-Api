<?php
// app/Http/Requests/UpdateSubCategoryRequest.php

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
            'name' => 'sometimes|string|max:255|unique:sub_categories',
        ];
    }

    public function messages(): array
    {
        return [
            'name.string' => 'The Sub Category name must be a string.',
            'name.max' => 'The Sub category name must not exceed 255 characters.',
            'name.unique' => 'The Sub category name is already taken.',
        ];
    }
}
