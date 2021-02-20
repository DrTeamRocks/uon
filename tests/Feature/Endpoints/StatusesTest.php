<?php

namespace Uon\Tests\Feature\Endpoints;

use PHPUnit\Framework\TestCase;
use Uon\Config;
use Uon\Endpoints\Statuses;

class StatusesTest extends TestCase
{
    /**
     * @var \Uon\Endpoints\Statuses
     */
    private $object;

    public function setUp(): void
    {
        $config = new Config(['token' => getenv('API_TOKEN')]);

        $this->object = new Statuses($config);
    }

    public function test_get(): void
    {
        $result = $this->object->get();
        self::assertIsObject($result);
    }

    public function test_getLead(): void
    {
        $result = $this->object->getLead();
        self::assertIsObject($result);
    }
}
