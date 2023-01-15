<?php

namespace App\Services\User\Find;

use App\Models\User;

class UserFindWithEmail
{
    /**
     * @param string $email
     * @return User|bool
     */
    public function findUserWithEmail(string $email): User|bool
    {
        $user = User::where('email', $email)->first();
        if (!$user instanceof User) {
            return false;
        }
        return $user;
    }

}
