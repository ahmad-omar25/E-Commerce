<?php

namespace App\Http\Requests\Dashboard\Product;

use Illuminate\Foundation\Http\FormRequest;

class Stock extends FormRequest
{
    public function rules()
    {
        return [
            'sku' => 'nullable|min:3|max:10',
            'product_id' => 'required|exists:products,id',
            'manage_stock' => 'required|in:0,1',
            'in_stock' => 'required|in:0,1',
            'quantity' => 'required_if:manage_stock,==,1'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
