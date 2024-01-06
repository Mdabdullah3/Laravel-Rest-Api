<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoresizeRequest extends FormRequest
{
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
            'size' => [
                'required',
                'string',
                'max:20',
            ],
        ];
    }
}
