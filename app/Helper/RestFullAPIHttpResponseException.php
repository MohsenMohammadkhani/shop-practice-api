<?php

namespace App\Helper;

use Illuminate\Http\Exceptions\HttpResponseException;

class RestFullAPIHttpResponseException {

    public static function showException(array $response, int $statusCode, array $header) {
        throw new HttpResponseException(response(
            json_encode(
                $response
            )
            , $statusCode, $header));
    }
}
