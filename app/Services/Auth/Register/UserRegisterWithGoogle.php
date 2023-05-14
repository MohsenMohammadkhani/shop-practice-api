<?php

namespace App\Services\Auth\Register;

use App\Models\User;
use App\Services\Auth\Google\GetUserInfoFromGoogle;
use Illuminate\Support\Facades\Http;

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
    public function userRegister(string $code)
    {
        $userInfoFromGoogle = $this->getUserInfoFromGoogle->handler($code);
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
