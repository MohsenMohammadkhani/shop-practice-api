<?php

namespace App\Services\User\Register\Contract;

use App\Repositories\Contracts\UserRepositoryInterface;
use function resolve;

abstract class UserRegister {

    protected $userRepository;

    public function __construct() {
        $this->userRepository = resolve(UserRepositoryInterface::class);
    }

    abstract public function register(array $data);
}
