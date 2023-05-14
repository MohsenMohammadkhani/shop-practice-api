<?php

namespace Tests\Unit\Auth\Register;

use App\Models\User;
use App\Services\Auth\Register\UserRegisterWithCredential;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\RefreshDatabase;
use Tests\TestCase;

class UserRegisterWithCredentialTest extends TestCase
{
//    use RefreshDatabase;
    use DatabaseTransactions;
    public function test_register_user()
    {
        $email = "mohsenmohammadkhanigla@gmail.com";
        $password = "asdASD123";
        $userRegisterWithCredential = new UserRegisterWithCredential();
        $this->assertEquals(true, $userRegisterWithCredential->registerUser($email, $password));
    }

    public function test_prevent_register_user_if_user_email_is_exist()
    {
        $this->expectException(\Exception::class);
        $email = "mohsenmohammadkhanigla@gmail.com";
        $password = "asdASD123";
        $this->makeNewUser($email);
        $userRegisterWithCredential = new UserRegisterWithCredential();
        $userRegisterWithCredential->registerUser($email, $password);
    }

    private function makeNewUser($email)
    {
        User::create([
            "email" => $email
        ]);
    }
}
