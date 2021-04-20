<?php

namespace App\Services;

use App\Repositories\AuthRepositary;
use App\Exceptions\RegisterException;
use Illuminate\Database\QueryException;
use App\Services\third_party\Ithird_party;
use App\Services\third_party\third_party_google;
use App\Services\third_party\third_party_facebook;

class AuthService
{
    protected $authRepo;

    public function __construct(AuthRepositary $authRepo)
    {
        $this->authRepo = $authRepo;
    }

    public function register($credential)
    {
        try {
            return $this->authRepo->create($credential);
        } catch (\Exception $e) {
            if ($e instanceof QueryException) {
                throw new RegisterException('unknown');
            }
        }
    }

    public function thirdPartyAuth(Ithird_party $third_party_service)
    {
        $url = $third_party_service->createAuthUrl();

        return $url;
    }

    public function createThirdPartyService(string $thirdParty) : Ithird_party
    {
        $thirdParty = strtolower($thirdParty);

        switch($thirdParty) {
            case 'facebook':
                $third_party_service = new third_party_facebook();
                break;

            case 'google':
            default:
                $third_party_service = new third_party_google();
                break;
        }

        return $third_party_service;
    }

    public function getGoogleUserData($code)
    {
        $google_service = new third_party_google();
        
        return $google_service->getUserDataByCode($code);
    }

    public function getFacebookUserData()
    {
        $facebook_service = new third_party_facebook();

        return $facebook_service->getAccessToken(); 
    }
}
