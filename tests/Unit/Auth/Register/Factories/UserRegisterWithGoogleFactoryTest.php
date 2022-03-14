<?php

namespace Tests\Unit\Auth\Register\Factories;

use App\Services\User\Register\Factories\UserRegisterWithGoogleFactory;
use App\Services\User\Register\UserRegisterWithGoogle;
use Tests\TestCase;

class UserRegisterWithGoogleFactoryTest extends TestCase {


    public function test_makeUserRegister_return_instance_UserRegisterWithGoogle() {
        $userRegisterWithGoogleFactory = new UserRegisterWithGoogleFactory();
        $this::assertInstanceOf(UserRegisterWithGoogle::class, $userRegisterWithGoogleFactory->makeUserRegister());
    }
}
