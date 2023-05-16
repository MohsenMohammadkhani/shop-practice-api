<?php

namespace App\Http\Controllers\Auth\Register;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Auth\Register\UserRegisterWithGoogleRequest;
use App\Services\Auth\Register\UserRegisterWithGoogle;
use Exception;

class UserRegisterWithGoogleController extends BaseController
{

    public function userRegister(UserRegisterWithGoogleRequest $request)
    {
        try {
            $userRegisterWithGoogle = new UserRegisterWithGoogle();
            $userRegisterWithGoogle->userRegister($request->input('code'), "/api/v1/auth/register-with-google");
            return $this->showResponse([
                'success' => true,
                'message' => __('auth.register_user_with_credentials_success'),
            ], 201);
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
