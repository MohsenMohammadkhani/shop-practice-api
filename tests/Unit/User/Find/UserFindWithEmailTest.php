<?php

namespace Tests\Unit\User\Find;

use App\Models\User;
use App\Services\User\Find\UserFindWithEmail;
use Tests\RefreshDatabase;
use Tests\TestCase;

class UserFindWithEmailTest extends TestCase
{
    use RefreshDatabase;

    public function test_find_user_with_email()
    {
        $email = "mohsen@gmail.com";
        $this->createUser($email);
        $userFindWithEmail = new UserFindWithEmail();
        $newUser = $userFindWithEmail->findUserWithEmail($email);
        $this->assertInstanceOf(User::class, $newUser);
    }

    private function createUser($email)
    {
        User::create([
            "email" => $email,
        ]);
    }


}
