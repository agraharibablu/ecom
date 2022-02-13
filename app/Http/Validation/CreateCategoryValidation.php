<?php

namespace App\Http\Validation;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryValidation extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_name'  => 'required|string|min:2|max:30', 
            'meta_title'        => 'nullable|string',
            'meta_keyword'      => 'nullable|string',
            'meta_description'  => 'nullable|string', 
        ];
    }
    public function messages()
    {
        return [
            'category_name.required' => 'Category Name field is Required.',
            'category_name.string'=>'Category Name should be string.',
            'category_name.max'=>'Category Name should not be maximum 30 Character.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
       // throw new HttpResponseException();
     throw new HttpResponseException(response(json_encode(array('validation'=>$validator->errors()))));
    }
}
