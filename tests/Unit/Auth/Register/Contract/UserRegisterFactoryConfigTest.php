<?php

namespace Tests\Unit\Auth\Register\Contract;

use App\Services\User\Register\Contract\UserRegisterFactoryConfig;
use App\Services\User\Register\UserRegisterWithCredential;
use App\Services\User\Register\UserRegisterWithGoogle;
use Illuminate\Http\Exceptions\HttpResponseException;
use Tests\TestCase;

class UserRegisterFactoryConfigTest extends TestCase {

    /**
     * this test make sure for get instance from UserRegisterFactoryConfig
     */
    public function test_get_instance_return_a_instance() {
        $userRegisterFactoryConfigInstance = UserRegisterFactoryConfig::getInstance();
        $this->assertInstanceOf(UserRegisterFactoryConfig::class, $userRegisterFactoryConfigInstance);
    }

    /**
     * this test make sure for getInstance return just one specify and singleton
     * instance from UserRegisterFactoryConfig
     *
     */
    public function test_get_instance_return_just_one_specify_instance() {
        $userRegisterFactoryConfigInstanceOne = UserRegisterFactoryConfig::getInstance();
        $userRegisterFactoryConfigInstanceTwo = UserRegisterFactoryConfig::getInstance();

        $this->assertSame($userRegisterFactoryConfigInstanceOne, $userRegisterFactoryConfigInstanceTwo);
    }

    /**
     * this test make sure makeUserRegister get instance UserRegister
     *
     */
    public function test_makeUserRegister_return_user_register() {
        $userRegisterFactoryConfigInstance = UserRegisterFactoryConfig::getInstance();

        $userRegisterWithCredential = $userRegisterFactoryConfigInstance->makeUserRegister(UserRegisterFactoryConfig::WITH_CREDENTIAL);
        $userRegisterWithGoogle = $userRegisterFactoryConfigInstance->makeUserRegister(UserRegisterFactoryConfig::WITH_GOOGLE);

        $this->assertInstanceOf(UserRegisterWithCredential::class, $userRegisterWithCredential);
        $this->assertInstanceOf(UserRegisterWithGoogle::class, $userRegisterWithGoogle);
    }

    /*
     * this test make sure exception happen when User Register type does not exist
     *
     */
    public function test_exception_happen_when_UserRegister_type_dose_not_exist() {
        $this->expectException(HttpResponseException::class);
        $userRegisterFactoryConfigInstance = UserRegisterFactoryConfig::getInstance();
        $userRegisterWithCredential = $userRegisterFactoryConfigInstance->makeUserRegister("linkdin");
    }

}
