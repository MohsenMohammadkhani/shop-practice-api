<?php

namespace Tests\Unit\Auth\Register\Factories;

use App\Services\User\Register\Factories\UserRegisterWithCredentialFactory;
use App\Services\User\Register\UserRegisterWithCredential;
use Tests\TestCase;

class UserRegisterWithCredentialFactoryTest extends TestCase {

    public function test_makeUserRegister_return_instance_UserRegisterWithCredential() {
        $userRegisterWithCredentialFactory = new UserRegisterWithCredentialFactory();
        $this::assertInstanceOf(UserRegisterWithCredential::class, $userRegisterWithCredentialFactory->makeUserRegister());
    }
}
