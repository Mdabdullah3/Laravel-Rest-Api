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
}
