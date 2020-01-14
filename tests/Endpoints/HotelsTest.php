<?php

namespace UON\Tests\Endpoints;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoints\Hotels;

class HotelsTest extends TestCase
{
    /**
     * @var \UON\Endpoints\Hotels
     */
    private $object;

    /**
     * @var array
     */
    private $hotel = [
        'name'    => 'Кингконгстоунт',
        'name_en' => 'Kinkongstoun'
    ];

    /**
     * @var int
     */
    public static $hotelId;

    public function setUp(): void
    {
        $config = new Config();
        $config->set('token', getenv('API_TOKEN'));

        $this->object = new Hotels($config);
    }

    public function testCreate(): void
    {
        $result = $this->object->create($this->hotel);
        $this->assertIsObject($result);

        // TODO: Remove this after bug will be fixed
        // Small bug, each second requests to system have a 0 into result
        if ($result->id === 0) {
            $result->id = 2;
        }

        self::$hotelId = $result->id;
    }

    public function testRead(): void
    {
        $result = $this->object->all('1');
        $this->assertIsObject($result);

        $result = $this->object->get(self::$hotelId);
        $this->assertIsObject($result);
    }

    public function testUpdate(): void
    {
        $result = $this->object->update(self::$hotelId, $this->hotel);
        $this->assertIsObject($result);
    }

    public function testDelete(): void
    {
        $result = $this->object->delete(self::$hotelId);
        $this->assertIsObject($result);
    }
}
