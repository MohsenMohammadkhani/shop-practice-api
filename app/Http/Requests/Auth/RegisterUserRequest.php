<?php

namespace App\Http\Requests\Auth;

use App\Helper\RestFullAPIHttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RegisterUserRequest extends FormRequest {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'email' => 'required|email',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/',
        ];
    }

    public function messages() {
        return [
            'email.required' => __('auth.email_is_not_exist'),
            'email.email' => __('auth.email_is_invalid'),
            'password.required' => __('auth.password_is_not_exist'),
            'password.min' => __('auth.password_is_less_than_8_char'),
            'password.regex' => __('auth.password_is_week'),
        ];
    }

    public function failedValidation(Validator $validator) {
        RestFullAPIHttpResponseException::showException([
            'success' => false,
            'message' => $validator->errors(),
        ], 422, [
            "Content-Type" => "application/json"
        ]);
    }

}
