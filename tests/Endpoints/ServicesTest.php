<?php

namespace UON\Tests\Endpoints;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoints\Services;

class ServicesTest extends TestCase
{
    /**
     * @var \UON\Endpoints\Services
     */
    private $object;

    /**
     * @var array
     */
    private $service = [
        'r_id'    => 1,
        'type_id' => 1
    ];

    /**
     * @var int
     */
    public static $serviceId;

    public function setUp(): void
    {
        $config = new Config();
        $config->set('token', getenv('API_TOKEN'));

        $this->object = new Services($config);
    }

    public function testCreate(): void
    {
        $result          = $this->object->create($this->service);
        self::$serviceId = $result->id;
        $this->assertIsObject($result);
    }

    public function testRead(): void
    {
        $result = $this->object->getTypes();
        $this->assertIsObject($result);
    }

    public function testUpdate(): void
    {
        $result = $this->object->update(self::$serviceId, $this->service);
        $this->assertIsObject($result);
    }
}
