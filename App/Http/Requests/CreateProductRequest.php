<?php

namespace App\Http\Requests;

use Libraries\Request\Form\FormRequest;

class CreateProductRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => function ($value) {
                if ($value === null) {
                    return $this->fail('Name must not be empty');
                }
            },
            'size' => function ($value) {
                if ($value === null) {
                    return $this->fail('Size must not be empty');
                }
            },
            'price' => function ($value) {
                if ($value === null) {
                    return $this->fail('Price must not be empty');
                }
            },
        ];
    }


}