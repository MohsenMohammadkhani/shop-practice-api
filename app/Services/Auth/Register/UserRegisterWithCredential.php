<?php

namespace App\Services\Auth\Register;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRegisterWithCredential
{


    /**
     * @param string $email
     * @param string $password
     * @return bool
     * @throws Exception
     */
    public function registerUser(string $email, string $password): bool
    {
        $user = User::where('email', $email)->first();
        if ($user instanceof User) {
            throw new \Exception(__('auth.this_email_registered_already'));
        }
        User::create([
            "email" => $email,
            "password" => Hash::make($password),
        ]);
        return true;
    }

}
