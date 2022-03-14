<?php

namespace Tests\Feature\Auth;

use Tests\RefreshDatabase;
use Tests\TestCase;

class UserRegisterWithGoogleTest extends TestCase {

    use RefreshDatabase;

    public function test_register_user_successful() {

        $response = $this->withHeaders([
            "Content-Type" => "application/json"
        ])->postJson('/api/v1/auth/register-with-credentials', [
            "email" => "mohsen@gmail.com",
            "password" => "asdASssD123"
        ]);

        $response->assertStatus(201);
    }

    public function test_register_user_when_user_exist_show_exception_error() {

        $response = $this->withHeaders([
            "Content-Type" => "application/json"
        ])->postJson('/api/v1/auth/register-with-credentials', [
            "email" => "mohsen@gmail.com",
            "password" => "asdASssD123"
        ]);

        $response = $this->withHeaders([
            "Content-Type" => "application/json"
        ])->postJson('/api/v1/auth/register-with-credentials', [
            "email" => "mohsen@gmail.com",
            "password" => "asdASssD123"
        ]);

        $response->assertStatus(422);
    }

}
