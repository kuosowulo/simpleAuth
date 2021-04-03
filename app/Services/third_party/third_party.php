<?php

namespace App\Services\third_party;

abstract class third_party
{
    public function __construct()
    {
        $this->setClient();
    }

    abstract function setClient();

    abstract function createAuthUrl();
}
