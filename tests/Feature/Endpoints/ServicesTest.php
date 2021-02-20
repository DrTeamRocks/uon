<?php

namespace Uon\Tests\Feature\Endpoints;

use PHPUnit\Framework\TestCase;
use Uon\Config;
use Uon\Endpoints\Services;

class ServicesTest extends TestCase
{
    /**
     * @var \Uon\Endpoints\Services
     */
    private $object;

    /**
     * @var array
     */
    private $service = [
        'r_id'    => 1,
        'type_id' => 1,
    ];

    /**
     * @var int
     */
    public static $serviceId;

    public function setUp(): void
    {
        $config = new Config(['token' => getenv('API_TOKEN')]);

        $this->object = new Services($config);
    }

    public function test_create(): void
    {
        $result = $this->object->create($this->service);

        self::$serviceId = $result->id;

        self::assertIsObject($result);
    }

    public function testRead(): void
    {
        $result = $this->object->getTypes();
        self::assertIsObject($result);
    }

    public function test_update(): void
    {
        $result = $this->object->update(self::$serviceId, $this->service);
        self::assertIsObject($result);
    }
}
