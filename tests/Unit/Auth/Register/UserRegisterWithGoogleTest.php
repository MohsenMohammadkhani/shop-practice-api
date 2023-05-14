<?php

namespace Tests\Unit\Auth\Register;

use App\Services\Auth\Register\UserRegisterWithGoogle;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class UserRegisterWithGoogleTest extends TestCase
{

    use DatabaseTransactions;

    public function test_register_test()
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
        $userRegisterWithGoogle = new UserRegisterWithGoogle();
        $this->assertTrue($userRegisterWithGoogle->userRegister("dkajdkansxkasdifb5a4sdf"));
    }

}
