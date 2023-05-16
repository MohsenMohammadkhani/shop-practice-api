<?php

namespace Tests\Feature\Auth\Login;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class UserLoginWithGoogleTest extends TestCase
{

    use DatabaseTransactions;

    public function test_login_user()
    {
        $userEmail = "mohsen@gmail.com";
        $password = "asdASD132";
        $this->registerUserWithCallEndpointAPI($userEmail, $password);
        Http::fake([
            'https://www.googleapis.com/oauth2/v4/token' => Http::response([
                "id_token" => "id_token_fake"
            ], 200),
            'https://oauth2.googleapis.com/tokeninfo?id_token=id_token_fake' => Http::response([
                "email" => $userEmail
            ], 200),
        ]);
        $response = $this->withHeaders([
            "Content-Type" => "application/json"
        ])->get('http://localhost:8000/api/v1/auth/login-with-google?state=state_fakse&code=code_fake&scope=scope_fake&authuser=authuser_fake&prompt=prompt_fake');
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
