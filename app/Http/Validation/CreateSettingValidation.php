<?php

namespace App\Http\Validation;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CreateSettingValidation extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
            return [
                'facebook'          => 'required|string|max:50',
                'instagram'         => 'required|string|max:50',
                'linkedin'          => 'required|string|max:50',
                'email'             => 'required|email|max:30',
                'youtube'           => 'required|string|max:50',
                'twitter'           => 'required|string|max:50',
            ];
       
    }
    public function messages()
    {
        return [
            'facebook.required'  => 'Facebook Name field is Required.',
            'facebook.string'    => 'Facebook Name should be string.',
            'facebook.max'       => 'Facebook Name should not be maximum 50 Character.',
            'instagram.required'  => 'Instagram Name field is Required.',
            'instagram.string'    => 'Instagram Name should be string.',
            'instagram.max'       => 'Instagram Name should not be maximum 50 Character.',
            'linkedin.required'  => 'Linkedin Name field is Required.',
            'linkedin.string'    => 'Linkedin Name should be string.',
            'linkedin.max'       => 'Linkedin Name should not be maximum 50 Character.',
            'youtube.required'  => 'Youtube Name field is Required.',
            'youtube.string'    => 'Youtube Name should be string.',
            'youtube.max'       => 'Youtube Name should not be maximum 50 Character.',
            'twitter.required'  => 'Twitter Name field is Required.',
            'twitter.string'    => 'Twitter Name should be string.',
            'twitter.max'       => 'Twitter Name should not be maximum 50 Character.',
          
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        // throw new HttpResponseException();
        throw new HttpResponseException(response(json_encode(array('validation' => $validator->errors()))));
    }
}
