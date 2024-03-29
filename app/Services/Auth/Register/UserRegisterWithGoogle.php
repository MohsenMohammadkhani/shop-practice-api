<?php

namespace App\Services\Auth\Register;

use App\Models\User;
use App\Services\Auth\Google\GetUserInfoFromGoogle;

class UserRegisterWithGoogle
{
    private $getUserInfoFromGoogle;

    public function __construct()
    {
        $this->getUserInfoFromGoogle = new GetUserInfoFromGoogle();
    }

    /**
     * @param string $code
     * @return void
     */
    public function userRegister(string $code, string $redirectUri)
    {
        $userInfoFromGoogle = $this->getUserInfoFromGoogle->handler($code, $redirectUri);
        $userEmail = $userInfoFromGoogle["email"];
        $user = User::where('email', $userEmail)->first();
        if ($user instanceof User) {
            throw new \Exception(__('auth.this_email_registered_already'));
        }
        User::create([
            "email" => $userEmail
        ]);
        return true;
    }
}
