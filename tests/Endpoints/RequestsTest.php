<?php

namespace UON\Tests\Endpoints;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoints\Requests;

class RequestsTest extends TestCase
{
    /**
     * @var \UON\Endpoints\Requests
     */
    private $object;

    /**
     * @var array
     */
    private $request = [
        'note'  => 'Test request',
        'price' => 100000,
    ];

    /**
     * @var array
     */
    private $action = [
        'r_id'    => 1,
        'type_id' => 1,
        'text'    => 'Some text',
    ];

    /**
     * @var int
     */
    public static $requestId;

    /**
     * @var int
     */
    public static $actionId;

    public function setUp(): void
    {
        $config = new Config();
        $config->set('token', getenv('API_TOKEN'));

        $this->object = new Requests($config);

        // Fix datetime
        $this->action['datetime'] = date('Y-m-d H:i:s');
    }

    public function testCreate(): void
    {
        $result = $this->object->create($this->request);
        $this->assertIsObject($result);

        // TODO: Remove this after bug will be fixed
        // Small bug, each second requests to system have a 0 into result
        if ($result->id === 0) {
            $result->id = 2;
        }

        self::$requestId = $result->id;
    }

    public function testRead(): void
    {
        $result = $this->object->get(self::$requestId);
        $this->assertIsObject($result);

        // Date for next method
        $today    = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('tomorrow'));

        $result = $this->object->getUpdated($today, $tomorrow);
        $this->assertIsObject($result);

        $result = $this->object->getDate($today, $tomorrow);
        $this->assertIsObject($result);

        // For second page
        $result = $this->object->getDate($today, $tomorrow, 2);
        $this->assertIsObject($result);

        // For other source id
        $result = $this->object->getDate($today, $tomorrow, 1, 1);
        $this->assertIsObject($result);

        $result = $this->object->search();
        $this->assertIsObject($result);
    }

    public function testCreateTravelType(): void
    {
        $result = $this->object->createTravelType(['name' => 'test']);
        $this->assertIsObject($result);
    }

    public function testReadTravelType(): void
    {
        $result = $this->object->getTravelType();
        $this->assertIsObject($result);

        $result = $this->object->getTravelType(['name' => 'test']);
        $this->assertIsObject($result);
    }

    public function testCreateActions(): void
    {
        $result         = $this->object->createActions($this->action);
        self::$actionId = $result->id;
        $this->assertIsObject($result);
    }

    public function testReadActions(): void
    {
        $result = $this->object->getActions(self::$actionId);
        $this->assertIsObject($result);

        // Date for next method
        $today    = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('tomorrow'));

        $result = $this->object->getDateActions($today, $tomorrow);
        $this->assertIsObject($result);
    }

}
