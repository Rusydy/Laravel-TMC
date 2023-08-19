<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'sku' => 'required|unique:products,sku',
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'sku.required' => 'sku is empty',
            'sku.unique' => 'sku is unique',
            'name.required' => 'name is empty',
            'name.max' => 'name length must not more than 255 characters',
            'price.required' => 'price is empty',
            'price.numeric' => 'price must be numeric',
            'price.min' => 'price must not negative',
            'stock.required' => 'stock is empty',
            'stock.numeric' => 'stock must be numeric',
            'stock.min' => 'stock must not negative',
            'categoryId.required' => 'categoryId is empty',
            'categoryId.exists' => 'categoryId is not exists',
        ];
    }
}
