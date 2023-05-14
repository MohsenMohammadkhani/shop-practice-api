<?php

namespace App\Http\Requests\Auth\Register;

use App\Helper\RestFullAPIHttpResponseException;
use App\Http\Requests\BaseRequests;
use Illuminate\Contracts\Validation\Validator;

class UserRegisterWithGoogleRequest extends BaseRequests
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => __('auth.code_from_google_for_auth_is_not_exist'),
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $this->showException([
            'success' => false,
            'message' => $validator->errors(),
        ], 422, [
            "Content-Type" => "application/json"
        ]);
    }
}
