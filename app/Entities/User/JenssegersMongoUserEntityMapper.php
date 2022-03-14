<?php

namespace App\Entities\User;


use App\Models\User;

class JenssegersMongoUserEntityMapper implements UserEntity {

    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function getEmail() {
        return $this->user->email;
    }
}
