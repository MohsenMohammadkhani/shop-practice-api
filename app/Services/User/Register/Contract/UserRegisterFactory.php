<?php

namespace App\Services\User\Register\Contract;

abstract class UserRegisterFactory {
    abstract public function makeUserRegister(): UserRegister;
}
