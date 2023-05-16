<?php

namespace App\Services\Auth\Google;

class GetUserInfoFromGoogle
{

    private $getTokenFromGoogleWithCode;
    private $getUserInfoFromGoogleWithTokenID;

    public function __construct()
    {
        $this->getTokenFromGoogleWithCode = new GetTokenFromGoogleWithCode();
        $this->getUserInfoFromGoogleWithTokenID = new GetUserInfoFromGoogleWithTokenID();
    }

    /**
     * @param string $codeFromGoogle
     * @return array
     * @throws \Exception
     */
    public function handler(string $codeFromGoogle, string $redirectUri): array
    {
        $resultGetTokenFromGoogleWithCode = $this->getTokenFromGoogleWithCode->handler($codeFromGoogle, env("APP_DOMAIN") . $redirectUri);
        return $this->getUserInfoFromGoogleWithTokenID->handler($resultGetTokenFromGoogleWithCode['id_token']);
    }
}
