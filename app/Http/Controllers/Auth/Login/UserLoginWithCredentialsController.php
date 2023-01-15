<?php

namespace App\Http\Controllers\Auth\Login;

use App\Helper\RestFullAPIHttpResponse;
use App\Helper\RestFullAPIHttpResponseException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Login\UserLoginWithCredentialsRequest;
use App\Services\Auth\Login\UserLoginWithCredential;

class UserLoginWithCredentialsController extends Controller
{

    private $userLoginWithCredential;

    public function __construct()
    {
        $this->userLoginWithCredential = new UserLoginWithCredential();
    }

    public function userLogin(UserLoginWithCredentialsRequest $request)
    {
        try {
            $request->validated();
            $this->userLoginWithCredential->userLogin($request->input('email'), $request->input('password'));
            return RestFullAPIHttpResponse::showResponse([
                'success' => true,
                'message' => __('auth.login_user_with_credentials_success'),
            ], 200);
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
