<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Auth\Login\UserLoginWithCredentialsRequest;
use App\Services\Auth\Login\UserLoginWithCredential;

class UserLoginWithCredentialsController extends BaseController
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
            $this->userLoginWithCredential->loginUser($request->input('email'), $request->input('password'));
            return $this->showResponse([
                'success' => true,
                'message' => __('auth.login_user_with_credentials_success'),
            ], 200);
        } catch (\Exception $error) {
            $this->showException(
                [
                    'success' => false,
                    'message' => $error->getMessage(),
                ]
                , 422);
        }

    }
}
