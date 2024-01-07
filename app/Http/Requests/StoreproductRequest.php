<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreproductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'subCategory_id' => 'required|exists:sub_categories,id',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'quantity' => 'required|integer',
            'sprice' => 'required|numeric',
            'pprice' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'size_id' => 'required|exists:sizes,id',
            'user_id' => 'required|exists:users,id',
            'images' => 'required|array',
            'images.*.image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'images.*.filename' => 'required|string',
        ];
    }
    public function messages(): array
    {
        return [
            'category_id.required' => 'The category is required.',
            'category_id.exists' => 'The selected category does not exist.',
            'subCategory_id.required' => 'The subcategory is required.',
            'subCategory_id.exists' => 'The selected subcategory does not exist.',
            // Add messages for other rules...

            'images.required' => 'At least one image is required.',
            'images.array' => 'The images must be an array.',
            'images.*.image' => 'Each image must be a valid image file (jpeg, png, jpg, gif).',
            'images.*.filename.required' => 'Each image must have a filename.',
            'images.*.filename.string' => 'Each image filename must be a string.',
        ];
    }
}
