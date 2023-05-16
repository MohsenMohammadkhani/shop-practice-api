<?php

namespace App\Services\Auth\Login;

use App\Models\User;
use App\Services\Auth\Google\GetUserInfoFromGoogle;
use Exception;

class UserLoginWithGoogle
{
    private $getUserInfoFromGoogle;

    public function __construct()
    {
        $this->getUserInfoFromGoogle = new GetUserInfoFromGoogle();
    }

    public function userLogin(string $code, $redirectUri)
    {
        $userInfoFromGoogle = $this->getUserInfoFromGoogle->handler($code, $redirectUri);
        $userEmail = $userInfoFromGoogle["email"];
        $user = User::where('email', $userEmail)->first();

        if (!$user) {

            throw new  Exception(__('auth.user_dose_not_exist_with_this_email'));
        }

        return true;
    }
}
