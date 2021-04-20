<?php

namespace App\Tests;

use App\Services\third_party\Ithird_party;

class FakeThirdPartyService implements Ithird_party
{
    public $redirect_url = null;

    public function createAuthUrl()
    {
        $this->redirect_url = 'url';
    }
}
