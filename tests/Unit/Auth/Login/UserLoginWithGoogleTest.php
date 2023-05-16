<?php

namespace Tests\Unit\Auth\Login;

use App\Models\User;
use App\Services\Auth\Login\UserLoginWithGoogle;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class UserLoginWithGoogleTest extends TestCase
{
    use DatabaseTransactions;

    public function test_login_user_successful()
    {
        $userEmail = "mohsen@gmail.com";
        $this->makeUserWithCredentialForTest($userEmail);
        Http::fake([
            'https://www.googleapis.com/oauth2/v4/token' => Http::response([
                "id_token" => "id_token_fake"
            ], 200),
            'https://oauth2.googleapis.com/tokeninfo?id_token=id_token_fake' => Http::response([
                "email" => $userEmail
            ], 200),
        ]);
        $userLoginWithGoogle = new UserLoginWithGoogle();
        $this->assertTrue($userLoginWithGoogle->userLogin("sdfklsdjfklsdjf", "/api/v1/auth/login-with-google"));

    }

    private function makeUserWithCredentialForTest($email)
    {
        User::create([
            "email" => $email,
        ]);
    }
}
