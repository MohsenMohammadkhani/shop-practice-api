<?php

namespace Tests\Feature\Auth\Login;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\RefreshDatabase;
use Tests\TestCase;

class UserLoginWithCredentialTest extends TestCase
{
//    use RefreshDatabase;

    use DatabaseTransactions;
    public function test_login_user_successful()
    {
        $email = "mohsen@gmail.com";
        $password = "asdASssD123";
        $this->registerUserWithCallEndpointAPI($email, $password);
        $response = $this->withHeaders([
            "Content-Type" => "application/json"
        ])->postJson('/api/v1/auth/login-with-credentials', [
            "email" => $email,
            "password" => $password
        ]);
        $response->assertStatus(200);
    }

    private function registerUserWithCallEndpointAPI($email, $password)
    {
        $response = $this->withHeaders([
            "Content-Type" => "application/json"
        ])->postJson('/api/v1/auth/register-with-credentials', [
            "email" => $email,
            "password" => $password
        ]);
    }
}
