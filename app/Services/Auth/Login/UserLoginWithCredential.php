<?php

namespace App\Services\Auth\Login;

use App\Services\User\Find\UserFindWithEmail;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserLoginWithCredential
{
    private $userFindWithEmail;

    public function __construct()
    {
        $this->userFindWithEmail = new UserFindWithEmail();
    }

    /**
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function userLogin(string $email, string $password):bool
    {
        $user = $this->userFindWithEmail->findUserWithEmail($email);
        if (!$user) {
            throw new  Exception(__('auth.user_dose_not_exist_with_this_email'));
        }
        $userPassword = $user->getAttribute('password');
        if (!Hash::check($password, $userPassword)) {
            throw new  Exception(__('auth.user_password_is_wrong'));
        }
        return true;
    }


}
