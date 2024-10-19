<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsUpdateRequest extends FormRequest
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
            'products' => 'array',
            'products.*.id' => 'nullable|exists:products,id',
            'products.*.name' => 'required',
            'products.*.stock' => 'required|integer|min:0',
            'products.*.price' => 'required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'products.*.name.required' => 'Поле Наименование продукта обязательно для заполнения',
            'products.*.stock.required' => 'Поле Количество обязательно для заполнения',
            'products.*.price.required' => 'Поле Стоимость продукта обязательно для заполнения',
        ];
    }
}
