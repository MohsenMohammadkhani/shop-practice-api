<?php

namespace App\Http\Controllers\Auth\Register;

use App\Helper\RestFullAPIHttpResponse;
use App\Helper\RestFullAPIHttpResponseException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Register\UserRegisterWithCredentialsRequest;
use App\Services\Auth\Register\UserRegisterWithCredential;

class UserRegisterWithCredentialsController extends Controller
{
    private $userRegisterWithCredential;

    public function __construct()
    {
        $this->userRegisterWithCredential = new UserRegisterWithCredential();
    }

    public function userRegister(UserRegisterWithCredentialsRequest $request)
    {
        try {
            $request->validated();
            $this->userRegisterWithCredential->registerUser($request->input('email'), $request->input('password'));
            return RestFullAPIHttpResponse::showResponse([
                'success' => true,
                'message' => __('auth.register_user_with_credentials_success'),
            ], 201);
        } catch (\Exception $error) {
            RestFullAPIHttpResponseException::showException(
                [
                    'success' => false,
                    'message' => $error->getMessage(),
                ]
                , 422);
        }
    }

}
