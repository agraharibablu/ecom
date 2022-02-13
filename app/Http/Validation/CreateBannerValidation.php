<?php

namespace App\Http\Validation;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class CreateBannerValidation extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'  => 'required|string|min:2|max:30', 
            'find'  => 'nullable|string',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Banner Name field is Required.',
            'name.string'=>'Banner Name should be string.',
            'name.max'=>'Banner Name should not be maximum 30 Character.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
       // throw new HttpResponseException();
     throw new HttpResponseException(response(json_encode(array('validation'=>$validator->errors()))));
    }
}
