<?php

namespace App\Services\Auth\Google;

use Exception;
use Illuminate\Support\Facades\Http;

class GetUserInfoFromGoogleWithTokenID
{
    /**
     * @param string $code
     * @return mixed
     * @throws Exception
     */
    public function handler(string $code)
    {
        try {
            $response = Http::get("https://oauth2.googleapis.com/tokeninfo?id_token=$code");
            return json_decode($response->body(), true);
        } catch (Exception $e) {
            throw new  Exception(__('auth.error_happened_when_get_user_info_from_google_with_tokenID') . $e->getMessage());
        }
    }
}
