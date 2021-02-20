<?php

namespace Uon\Tests\Feature\Endpoints;

use PHPUnit\Framework\TestCase;
use Uon\Config;
use Uon\Endpoints\Cash;

class CashTest extends TestCase
{
    /**
     * @var \Uon\Endpoints\Cash
     */
    private $cash;

    public function setUp(): void
    {
        $config = new Config(['token' => getenv('API_TOKEN')]);

        $this->cash = new Cash($config);
    }

    public function test_create(): void
    {
        $result = $this->cash->create(['name' => 'test']);
        self::assertIsObject($result);
    }

    public function test_get(): void
    {
        $result = $this->cash->get();
        self::assertIsObject($result);
    }

    public function test_get_filtered(): void
    {
        $result = $this->cash->get(['name' => 'test']);
        self::assertIsObject($result);
    }
}
