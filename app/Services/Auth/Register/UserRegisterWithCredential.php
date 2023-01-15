<?php

namespace App\Services\Auth\Register;

use App\Models\User;
use App\Services\User\Find\UserFindWithEmail;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserRegisterWithCredential
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
     * @throws Exception
     */
    public function registerUser(string $email, string $password): bool
    {
        if ($this->isUserExist($email)) {
            throw new Exception(__('auth.this_email_registered_already'));
        }
        return $this->createUser($email, $password);
    }

    /**
     * @param string $email
     * @return bool
     */
    private function isUserExist(string $email): bool
    {
        $user = $this->userFindWithEmail->findUserWithEmail($email);
        if (!$user) {
            return false;
        }

        return true;
    }

    /**
     * @param string $email
     * @param string $password
     * @return bool
     * @throws Exception
     */
    private function createUser(string $email, string $password): bool
    {
        $newUser = User::create([
            "email" => $email,
            "password" => Hash::make($password),
        ]);
        if (!$newUser instanceof User) {
            throw new  Exception(__('auth.an_error_happened_when_user_wants_to_register_with_credential'));
        }
        return true;
    }
}
