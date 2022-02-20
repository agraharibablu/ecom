<?php

namespace App\Http\Validation;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class CreateTestimonialValidation extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'         => 'required|string|min:2|max:30', 
            'title'        => 'required|string|min:2|max:30',
            'designation'  => 'required|string|min:2|max:30',
            'description'  => 'nullable|string', 
        ];
    }
    public function messages()
    {
        return [
            'name.required'        =>'Name field is Required.',
            'name.string'          =>'Name should be string.',
            'name.max'             =>'Name should not be maximum 30 Character.',
            'title.required'       =>'Title field is Required.',
            'title.string'         =>'Title should be string.',
            'title.max'            =>'Title should not be maximum 30 Character.',
            'designation.required' =>'Designation field is Required.',
            'designation.string'   =>'Designation should be string.',
            'designation.max'      =>'Designation should not be maximum 30 Character.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
       // throw new HttpResponseException();
     throw new HttpResponseException(response(json_encode(array('validation'=>$validator->errors()))));
    }
}
