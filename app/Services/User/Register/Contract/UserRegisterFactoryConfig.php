<?php

namespace App\Services\User\Register\Contract;

use App\Services\User\Register\Factories\UserRegisterWithCredentialFactory;
use App\Services\User\Register\Factories\UserRegisterWithGoogleFactory;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Lang;

class UserRegisterFactoryConfig {

    private static $instance;
    private $factories = [];

    const WITH_GOOGLE = "with-google";
    const  WITH_CREDENTIAL = "with-credential";

    public static function getInstance(): UserRegisterFactoryConfig {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    public function setFactories() {
        $this->addFactories(self::WITH_CREDENTIAL, new UserRegisterWithCredentialFactory());
        $this->addFactories(self::WITH_GOOGLE, new UserRegisterWithGoogleFactory());
    }

    private function addFactories($key, UserRegisterFactory $value) {
        $this->factories[$key] = $value;
    }

    public function makeUserRegister($key):UserRegister {
        try {
            $userRegisterFactory = $this->factories[$key];
            return $userRegisterFactory->makeUserRegister();
        } catch (\Throwable $e) {
            throw new HttpResponseException(response(
                json_encode(
                    [
                        'success' => false,
                        'data' => __('auth.this_is_kind_of_register_user_dose_not_exist'),
                    ]
                )
                , 422, [
                "Content-Type" => "application/json"
            ]));
        }
    }

}
