<?php

namespace Tests\Unit\Auth\Login;

use App\Models\User;
use App\Services\Auth\Login\UserLoginWithCredential;
use Illuminate\Support\Facades\Hash;
use Tests\RefreshDatabase;
use Tests\TestCase;

class UserLoginWithCredentialTest extends TestCase
{

    use RefreshDatabase;

    public function test_login_user()
    {
        $email = "mohsenmohammadkhanigla@gmail.com";
        $password = "asdASD123";
        $this->makeUserWithCredentialForTest($email, $password);
        $userLoginWithCredential = new UserLoginWithCredential();
        $resultUserLoginWithCredential = $userLoginWithCredential->loginUser($email, $password);
        $this->assertTrue($resultUserLoginWithCredential);
    }

    private function makeUserWithCredentialForTest($email, $password)
    {
        User::create([
            "email" => $email,
            "password" => Hash::make($password)
        ]);
    }
}
