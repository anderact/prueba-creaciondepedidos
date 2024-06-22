<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
			'name' => 'required|string',
			'description' => 'required|string',
            'sku' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0.01',
            'is_active' => 'required|boolean',
            'weight' => 'nullable|numeric|min:0.01',
            'dimensions' => 'nullable|array',
            'dimensions.length' => 'nullable|numeric|min:0.01',
            'dimensions.width' => 'nullable|numeric|min:0.01',
            'dimensions.height' => 'nullable|numeric|min:0.01',
            'image' => 'nullable|string|max:255',
        ];
    }
}
