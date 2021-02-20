<?php

namespace Uon\Tests\Feature\Endpoints;

use PHPUnit\Framework\TestCase;
use Uon\Config;
use Uon\Endpoints\Avia;

class AviaTest extends TestCase
{
    /**
     * @var \Uon\Endpoints\Avia
     */
    private $object;

    /**
     * @var array
     */
    private $avia = [
        'service_id' => 1,
    ];

    public function setUp(): void
    {
        $config = new Config(['token' => getenv('API_TOKEN')]);

        $this->object = new Avia($config);
    }

    public function test_create(): void
    {
        $result = $this->object->create($this->avia);
        self::assertIsObject($result);
    }
}