<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|string|max:255|unique:categories',
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'The category name must be a string.',
            'name.max' => 'The category name must not exceed 255 characters.',
            'name.unique' => 'The category name is already taken.',
        ];
    }
}
