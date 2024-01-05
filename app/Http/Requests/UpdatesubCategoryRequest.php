<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatesubCategoryRequest extends FormRequest
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
            'name' => "sometimes|string|max:255|unique:subCategories"
        ];
    }
    public function messages()
    {
        return [
            'name.string' => 'The Sub Category name must be a string.',
            'name.max' => 'The Sub category name must not exceed 255 characters.',
            'name.unique' => 'The Sub category name is already taken.',
        ];
    }
}
