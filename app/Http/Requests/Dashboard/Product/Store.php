<?php

namespace App\Http\Requests\Dashboard\Product;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'description' => 'required|max:500',
            'short_description' => 'nullable|max:200',
            'slug' => 'required|unique:products,slug,' .$this->id,
            'categories' => 'required|array|min:1',
            'categories.*' => 'numeric|exists:categories,id',
            'tags' => 'required|array|min:1',
            'brand_id' => 'required',
            'tags.*' => 'numeric|exists:tags,id'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
