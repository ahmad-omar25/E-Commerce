<?php

namespace App\Http\Requests\Dashboard\Brand;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:200',
            'logo' => 'required_without:id|image|mimes:jpg,jpeg,png'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
