<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Auth\Login\UserLoginWithGoogleRequest;
use App\Services\Auth\Login\UserLoginWithGoogle;

class UserLoginWithGoogleController extends BaseController
{

    public function userLogin(UserLoginWithGoogleRequest $request)
    {
        try {
            $userLoginWithGoogle = new UserLoginWithGoogle();
            $userLoginWithGoogle->userLogin($request->input('code'), "/api/v1/auth/login-with-google");
            return $this->showResponse([
                'success' => true,
                'message' => __('auth.login_user_with_google_success'),
            ], 200);
        } catch (Exception $error) {
            $this->showException(
                [
                    'success' => false,
                    'message' => $error->getMessage(),
                ]
                , 422);
        }
    }
}
