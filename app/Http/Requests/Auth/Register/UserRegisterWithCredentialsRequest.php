<?php

namespace App\Http\Requests\Auth\Register;

use App\Helper\RestFullAPIHttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UserRegisterWithCredentialsRequest extends FormRequest
{


    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => __('auth.email_is_not_exist'),
            'email.email' => __('auth.email_is_invalid'),
            'password.required' => __('auth.password_is_not_exist'),
            'password.min' => __('auth.password_is_less_than_8_char'),
            'password.regex' => __('auth.password_is_week'),
        ];
    }

    public function failedValidation(Validator $validator)
    {
        RestFullAPIHttpResponseException::showException([
            'success' => false,
            'message' => $validator->errors(),
        ], 422, [
            "Content-Type" => "application/json"
        ]);
    }

}
