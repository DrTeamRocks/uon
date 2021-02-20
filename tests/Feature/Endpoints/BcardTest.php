<?php

namespace Uon\Tests\Feature\Endpoints;

use PHPUnit\Framework\TestCase;
use Uon\Config;
use Uon\Endpoints\Bcard;

class BcardTest extends TestCase
{
    /**
     * @var \Uon\Endpoints\Bcard
     */
    private $bcard;

    /**
     * @var array
     */
    private $cardSample;

    public function setUp(): void
    {
        $config = new Config(['token' => getenv('API_TOKEN')]);

        $this->bcard      = new Bcard($config);
        $this->cardSample = [
            'bc_number' => '0000000001',
            'user_id'   => 2,
        ];
    }

    public function test_getByCard(): void
    {
        $result = $this->bcard->getByCard($this->cardSample['bc_number']);
        self::assertIsObject($result);
    }

    public function test_getByUser(): void
    {
        $result = $this->bcard->getByUser($this->cardSample['user_id']);
        self::assertIsObject($result);
    }

    public function test_activate(): void
    {
        $result = $this->bcard->activate($this->cardSample);
        self::assertIsObject($result);
    }
}
