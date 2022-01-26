<?php

namespace App\Http\Validation;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class CreateTemplateValidation extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'             => 'required|string|min:2|max:50',
            'template'          => 'required',
            'meta_title'        => 'nullable|string',
            'meta_keyword'      => 'nullable|string',
            'meta_description'  => 'nullable|string',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Title Name field is Required.',
            'title.string'   =>'Title Name should be string.',
            'title.max'      =>'Title Name should not be maximum 50 Character.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
       // throw new HttpResponseException();
     throw new HttpResponseException(response(json_encode(array('validation'=>$validator->errors()))));
    }
}
