<?php

namespace App\Services\Auth\Login;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserLoginWithCredential
{

    /**
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function loginUser(string $email, string $password):bool
    {
        $user = User::where('email', $email)->first();
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
