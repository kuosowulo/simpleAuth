<?php

namespace App\Services\third_party;

abstract class third_party
{
    public function __construct()
    {
        $this->setClient();
    }

    /**
     * 設定服務實體
     *
     * @return void
     */
    abstract function setClient();

    /**
     * 產生登入網址
     *
     * @return void
     */
    abstract function createAuthUrl();
}
