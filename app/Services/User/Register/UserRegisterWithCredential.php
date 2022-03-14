<?php

namespace App\Services\User\Register;

use App\Helper\RestFullAPIHttpResponseException;
use App\Services\User\Register\Contract\UserRegister;
use App\Services\User\Register\Contract\UserRegisterFactory;
use Symfony\Component\VarDumper\VarDumper;

class UserRegisterWithCredential extends UserRegister {

    public function register(array $data) {
        if ($this->checkUserExist($data['email'])) {
            $this->showUserExistException();
        }

        return $this->userRepository->create($data);
    }

    private function showUserExistException() {
        RestFullAPIHttpResponseException::showException([
            'success' => false,
            'message' => __('auth.this_user_register_already'),
        ], 422, [
            "Content-Type" => "application/json"
        ]);
    }

    private function checkUserExist(string $email): bool {
        $user = $this->userRepository->findBy([
            "email" => $email
        ], [], true);
        return $user === null ? 0 : 1;
    }
}
