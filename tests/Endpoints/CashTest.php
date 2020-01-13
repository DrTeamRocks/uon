<?php

namespace UON\Tests\Endpoints;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoints\Cash;

class CashTest extends TestCase
{
    /**
     * @var \UON\Endpoints\Cash
     */
    private $object;

    public function setUp(): void
    {
        $config = new Config();
        $config->set('token', getenv('API_TOKEN'));

        $this->object = new Cash($config);
    }

    public function testCreate(): void
    {
        $result = $this->object->create(['name' => 'test']);
        $this->assertIsObject($result);
    }

    public function testGetAll(): void
    {
        $result = $this->object->get();
        $this->assertIsObject($result);
    }

    public function testGetFiltered(): void
    {
        $result = $this->object->get(['name' => 'test']);
        $this->assertIsObject($result);
    }
}
