<?php

namespace App\Http\Requests\Dashboard\Product;

use Illuminate\Foundation\Http\FormRequest;

class Image extends FormRequest
{
    public function rules()
    {
        return [
            'product_id' => 'required|exists:products,id',
            'document' => 'required|array|min:1',
            'document.*' => 'required|string',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
