<?php

namespace App\Services\third_party;

use Facebook\Facebook;
use App\Services\third_party\third_party;
use App\Services\third_party\Ithird_party;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Exceptions\FacebookResponseException;

class third_party_facebook extends third_party implements Ithird_party
{
    const app_id = '948457975692893';

    const app_secret = 'e750caf14a288cc2a5466424be9a57a2';

    const version = 'v10.0';

    const Redirect_url = 'http://localhost:81/simpleAuth/public/facebook/auth';

    public $client;

    public function __construct()
    {
        parent::__construct();
    }

    public function setClient()
    {
        $this->client =  new Facebook([
          'app_id' => self::app_id,
          'app_secret' => self::app_secret,
          'default_graph_version' => self::version,
          //'default_access_token' => '{access-token}', // optional
        ]);
    }

    public function createAuthUrl()
    {
        return $this->client->getRedirectLoginHelper()->getLoginUrl(self::Redirect_url);
    }

    public function getAccessToken()
    {
        $fb_helper = $this->client->getRedirectLoginHelper();

        try {
            $accessToken = $fb_helper->getAccessToken();
        } catch (FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (! isset($accessToken)) {
            if ($fb_helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $fb_helper->getError() . "\n";
                echo "Error Code: " . $fb_helper->getErrorCode() . "\n";
                echo "Error Reason: " . $fb_helper->getErrorReason() . "\n";
                echo "Error Description: " . $fb_helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }
          
        $access_token = $accessToken->getValue();

        $graph_response = $$this->client->get('/me?fields=id,name,email', $access_token);

        $fb_user_info = $graph_response->getGraphUser();

        if (!empty($fb_user_info['id'])) {
            return [
                'profile_pic' => 'http://graph.facebook.com/'.$fb_user_info['id'].'picture',
                'user_name' => $fb_user_info['name'],
                'email' => $fb_user_info['email'],
            ];
        }
        
        return 'credential lost';
    }
}
