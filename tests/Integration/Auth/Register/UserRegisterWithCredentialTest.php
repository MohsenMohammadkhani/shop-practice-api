<?php

namespace Tests\Integration\Auth\Register;


use App\Services\User\Register\UserRegisterWithCredential;
use Tests\RefreshDatabase;
use Illuminate\Http\Exceptions\HttpResponseException;
use Tests\TestCase;

class UserRegisterWithCredentialTest extends TestCase {

    use RefreshDatabase;

    public function test_register_user_when_user_exist_show_exception() {
        $this->expectException(HttpResponseException::class);
        $userRegisterWithCredential = new UserRegisterWithCredential();
        $userData=[
            "email" => "mohsengla@gmail.com"
        ];
        $userRegisterWithCredential->register($userData);
        $userRegisterWithCredential->register($userData);
    }
}
