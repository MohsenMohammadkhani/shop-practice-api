<?php

namespace App\Services\User\Register\Factories;

use App\Services\User\Register\Contract\UserRegister;
use App\Services\User\Register\Contract\UserRegisterFactory;
use App\Services\User\Register\UserRegisterWithCredential;

class UserRegisterWithCredentialFactory extends UserRegisterFactory {

    public function makeUserRegister(): UserRegister {
        return new UserRegisterWithCredential();
    }
}
