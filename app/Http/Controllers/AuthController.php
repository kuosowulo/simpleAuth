<?php

namespace App\Http\Controllers;

use JWTAuth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function viewLoginPage()
    {
        return view('loginPage');
    }

    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (!$token = JWTAuth::attempt($credentials)) {
            dump('error');
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
