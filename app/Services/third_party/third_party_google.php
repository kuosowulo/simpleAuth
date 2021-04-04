<?php

namespace App\Services\third_party;

use Google_Client;
use Google_Service_Oauth2;
use App\Services\third_party\third_party;

class third_party_google extends third_party
{
    const Google_auth_config = '{"web":{"client_id":"740197481403-m8lr4er4029aq7mtot1s5oibvmcdfusa.apps.googleusercontent.com","project_id":"agile-producer-309606","auth_uri":"https://accounts.google.com/o/oauth2/auth","token_uri":"https://oauth2.googleapis.com/token","auth_provider_x509_cert_url":"https://www.googleapis.com/oauth2/v1/certs","client_secret":"7-haeedghe8so8i3Ilkb7IBP","redirect_uris":["http://127.0.0.1:81/simpleAuth/public/google/auth"]}}';

    public $client;

    public function __construct()
    {
        parent::__construct();
    }

    public function setClient()
    {
        $this->client = new Google_Client();

        $google_auth_config = $this->getGoogleAuthConfigArr();

        $this->client->setAuthConfig($google_auth_config);
        $this->client->setRedirectUri(url('google/auth'));
        $this->client->addScope('https://www.googleapis.com/auth/userinfo.email');
        $this->client->addScope('https://www.googleapis.com/auth/userinfo.profile');
    }

    public function createAuthUrl()
    {
        return $this->client->createAuthUrl();
    }

    private function getGoogleAuthConfigArr()
    {
        return json_decode(self::Google_auth_config, true);
    }


    public function getUserDataByCode(string $code)
    {
        $this->client->fetchAccessTokenWithAuthCode($code);

        $google_service = new Google_Service_Oauth2($this->client);
        
        try {
            $user_info = $google_service->userinfo->get();
        } catch (\Exception $e) {
            return 'credentail lost';
        }

        dump($user_info);
    }
}
