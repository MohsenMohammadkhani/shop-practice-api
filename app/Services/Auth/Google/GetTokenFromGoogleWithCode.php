<?php

namespace App\Services\Auth\Google;

use Exception;
use Illuminate\Support\Facades\Http;

class GetTokenFromGoogleWithCode
{


    /**
     * @param string $code
     * @param string $redirectUri
     * @return mixed
     * @throws Exception
     */
    public function handler(string $code, string $redirectUri)
    {
        try {
            $response = Http::post('https://www.googleapis.com/oauth2/v4/token', [
                "grant_type" => "authorization_code", "client_id" => env('GOOGLE_CLIENT_ID'), "client_secret" => env('GOOGLE_SECRET_ID'), "redirect_uri" => $redirectUri, "code" => $code
            ]);
            return json_decode($response->body(), true);
        } catch (Exception $e) {
            throw new  Exception(__('auth.error_happened_when_get_token_form_google_with_code') . $e->getMessage());
        }

    }


}
