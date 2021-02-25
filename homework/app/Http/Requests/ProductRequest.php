<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function rules()
    {
        return [
            'product_name'=> [
                'required', 'string', 'max:50'
            ],
            'product_description' => [
                'required', 'string', 'max:255'
            ],
            'product_creator' => [
                'required', 'string', 'max:50'
            ],
        ];
    }
}
