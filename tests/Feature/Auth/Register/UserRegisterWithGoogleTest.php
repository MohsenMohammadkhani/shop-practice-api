<?php

namespace Tests\Feature\Auth\Register;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class UserRegisterWithGoogleTest extends TestCase
{

    use DatabaseTransactions;

    public function test_register_user()
    {
        $userEmail = "mohsen@gmail.com";
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
        ])->get('http://localhost:8000/api/v1/auth/register-with-google?state=state_fakse&code=code_fake&scope=scope_fake&authuser=authuser_fake&prompt=prompt_fake');
        $response->assertStatus(201);
    }

}
