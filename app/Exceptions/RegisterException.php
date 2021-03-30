<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterException extends Exception
{
    public function render($request)
    {
        $message = $this->getMessage();
        $error = "";
        $error_message = "";
        $http_code = 500;

        switch ($message)
        {
            case "DulplicateEmail":
                $error = "Insert failed";
                $error_message = "Email is exists.";
                $http_code = 401;
                break;
            default:
                $error = 'Unknown';
                $error_message = "Undefined error.";
                $http_code = 500;
                break;
        }

        return response()->json([
            'status' => "fail",
            'code' => $http_code,
            'data' => [
                'error' => $error,
                'error_message' => $error_message
            ]
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }
}
