<?php

namespace App\Http\Controllers;

use JWTAuth;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Requests\LoginRequest;

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

    public function login(LoginRequest $request)
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

    public function thirdPartyAuth(Request $request)
    {
        $third_party_type = $request->type ?? 'Google';

        $url = $this->authService->thirdPartyAuth($third_party_type);
        
        return redirect($url);
    }

    public function redirectToGoogleAuth(Request $request)
    {
        $code = $request->code;

        return $this->authService->getGoogleUserData($code);
    }

    public function redirectToFacebookAuth()
    {
        return $this->authService->getFacebookUserData();
    }
}
