<?php

namespace App\Http\Requests\Dashboard\Product;

use Illuminate\Foundation\Http\FormRequest;

class Price extends FormRequest
{
    public function rules()
    {
        return [
            'price' => 'required|min:0|numeric',
            'product_id' => 'required|exists:products,id',
            'special_price' => 'nullable|numeric',
            'special_price_type' => 'required_with:special_price|in:fixed,percent',
            'special_price_start' => 'required_with:special_price',
            'special_price_end' => 'required_with:special_price',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
