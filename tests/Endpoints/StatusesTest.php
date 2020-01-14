<?php

namespace UON\Tests;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoints\Statuses;

class StatusesTest extends TestCase
{
    /**
     * @var \UON\Endpoints\Statuses
     */
    private $object;

    public function setUp(): void
    {
        $config = new Config();
        $config->set('token', getenv('API_TOKEN'));

        $this->object = new Statuses($config);
    }

    public function testGet(): void
    {
        $result = $this->object->get();
        $this->assertIsObject($result);
    }

    public function testGetLead(): void
    {
        $result = $this->object->getLead();
        $this->assertIsObject($result);
    }
}
