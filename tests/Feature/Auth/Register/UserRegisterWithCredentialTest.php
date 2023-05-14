<?php

namespace Tests\Feature\Auth\Register;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\RefreshDatabase;
use Tests\TestCase;

class UserRegisterWithCredentialTest extends TestCase
{
//    use RefreshDatabase;
    use DatabaseTransactions;

    public function test_register_user_successful()
    {
        $response = $this->withHeaders([
            "Content-Type" => "application/json"
        ])->postJson('/api/v1/auth/register-with-credentials', [
            "email" => "mohsen@gmail.com",
            "password" => "asdASssD123"
        ]);

        $response->assertStatus(201);
    }

}
