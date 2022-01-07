<?php

namespace App\Http\Validation;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class CreateProductValidation extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_name'       => 'required|string|min:2|max:30',
            'product_price'      => 'required|numeric|not_in:0',
            'product_category'   => 'required|string|min:2|max:30',
           // 'product_image'      => 'image',
            'product_tag'        => 'required|string|max:30',
            'product_description' => 'required|string|min:10',
        ];
    }
    public function messages()
    {
        return [
            'product_name.required' => 'Product Name field is Required.',
            'product_name.string'=>'Product Name should be string.',
            'product_name.max'=>'Product Name should not be maximum 30 Character.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
       // throw new HttpResponseException();
     throw new HttpResponseException(response(json_encode(array('validation'=>$validator->errors()))));
    }
}
