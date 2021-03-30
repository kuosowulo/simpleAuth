<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class ParameterException extends Exception
{
    public function __construct(string $message)
    {
        $this->message = $message;
    }
    public function render($request)
    {
        return response()->json([
            'status' => "fail",
            'code' => 422,
            'data' => [
                'error' => 'Parameter error',
                'error_message' => $this->message
            ]
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }
}
