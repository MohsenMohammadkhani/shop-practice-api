<?php

namespace App\Helper;

use Illuminate\Http\JsonResponse;

class RestFullAPIHttpResponse
{
    public static function showResponse($body, $statusCode): JsonResponse
    {
        return response()->json(
            $body
            , $statusCode);
    }
}
