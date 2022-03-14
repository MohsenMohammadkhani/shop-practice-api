<?php

namespace App\Services\User\Register;

use App\Services\User\Register\Contract\UserRegister;

class UserRegisterWithGoogle extends UserRegister {

    public function register(array $data) {
        echo "this is UserRegisterWithGoogle";
    }
}
