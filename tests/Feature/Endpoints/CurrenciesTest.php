<?php

namespace Endpoints;

use PHPUnit\Framework\TestCase;
use Uon\Config;
use Uon\Endpoints\Currencies;

class CurrenciesTest extends TestCase
{
    /**
     * @var \Uon\Endpoints\Currencies
     */
    private $object;

    public function setUp(): void
    {
        $config = new Config(['token' => getenv('API_TOKEN')]);

        $this->object = new Currencies($config);
    }

    public function test_all(): void
    {
        $result = $this->object->all();
        self::assertIsObject($result);
    }
}
