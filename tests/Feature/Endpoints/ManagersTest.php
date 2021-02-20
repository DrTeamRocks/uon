<?php

namespace Endpoints;

use PHPUnit\Framework\TestCase;
use Uon\Config;
use Uon\Endpoints\Managers;

class ManagersTest extends TestCase
{
    /**
     * @var \Uon\Endpoints\Managers
     */
    private $managers;

    public function setUp(): void
    {
        $config = new Config(['token' => getenv('API_TOKEN')]);

        $this->managers = new Managers($config);
    }

    public function test_all(): void
    {
        $result = $this->managers->all();
        self::assertIsObject($result);
    }
}
