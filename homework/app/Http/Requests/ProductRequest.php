<?php

namespace App\Http\Requests;

use App\Models\Product;
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
            'image' => [
                'nullable', 'file', 'image'
            ]
        ];
    }

    function validatedWithImage() {
        $data = $this->validated();
        if($this->hasFile('image')) {
            /**
             * @var Product $product
             */
            if($product = $this->route('product')) {
                $product->deleteImage();
            }
            $data['image_path'] = $this->file('image')->store('public/images');
        }

        return $data;
    }
}
