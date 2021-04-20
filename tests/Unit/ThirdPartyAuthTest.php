<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\AuthService;
use App\Tests\FakeThirdPartyService;
use App\Repositories\AuthRepositary;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThirdPartyAuthTest extends TestCase
{
    public $authService;

    public function setUp()
    {
        $this->authService = new AuthService(new AuthRepositary);
    }

    /**
     * 測試第三方登入服務是否被正確呼叫
     *
     * @return void
     */
    public function test_ThirdParty_Auth_Redirect()
    {
        // Arrange
        $third_party_service = new FakeThirdPartyService();  // 模擬物件
        $excepted_url = 'url';

        // Actual
        $this->authService->thirdPartyAuth($third_party_service);

        // Assert
        $this->assertEquals($excepted_url, $third_party_service->redirect_url);
    }
}
