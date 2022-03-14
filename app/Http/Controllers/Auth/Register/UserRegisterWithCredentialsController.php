<?php

namespace App\Http\Controllers\Auth\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Services\User\Register\Contract\UserRegisterFactoryConfig;
use Illuminate\Http\JsonResponse;

class UserRegisterWithCredentialsController extends Controller {

    public function userRegister(RegisterUserRequest $request): JsonResponse {
        $request->validated();
        $userRegisterWithCredential = UserRegisterFactoryConfig::getInstance()->makeUserRegister(UserRegisterFactoryConfig::WITH_CREDENTIAL);
        $userRegisterWithCredential->register($this->getUserDataFromBodyRequest($request));
        return $this->showResponseRegisterUserSuccess();
    }

    private function showResponseRegisterUserSuccess(): JsonResponse {
        return response()->json(
            [
                'success' => true,
                'message' => __('auth.register_user_with_credentials_success'),
            ]
            , 201);
    }


    private function getUserDataFromBodyRequest(RegisterUserRequest $request): array {
        return [
            "email" => $request->input('email'),
            "password" => $request->input('password')
        ];
    }

}
