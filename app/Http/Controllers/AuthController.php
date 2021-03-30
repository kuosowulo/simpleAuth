<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function viewLoginPage()
    {
        return view('loginPage');
    }

    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (!$token = JWTAuth::attempt($credentials)) {
            $this->authService->register($credentials);

            return response()->json([
                'status' => true,
                'code' => 200,
                'data' => [
                    'message' => 'register success!'
                ]
            ]);
        }

        return response()->json([
            'status' => true,
            'code' => 200,
            'data' => [
                'token' => $token
            ]
        ]);
    }
}
