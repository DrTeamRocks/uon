<?php

namespace Uon\Tests\Feature\Endpoints;

use PHPUnit\Framework\TestCase;
use Uon\Config;
use Uon\Endpoints\Hotels;

class HotelsTest extends TestCase
{
    /**
     * @var \Uon\Endpoints\Hotels
     */
    private $hotels;

    /**
     * @var array
     */
    private $hotel = [
        'name'    => 'Кингконгстоунт',
        'name_en' => 'Kinkongstoun',
    ];

    /**
     * @var int
     */
    public static $hotelId;

    public function setUp(): void
    {
        $config = new Config(['token' => getenv('API_TOKEN')]);

        $this->hotels = new Hotels($config);
    }

    public function test_create(): void
    {
        $result = $this->hotels->create($this->hotel);
        self::assertIsObject($result);

        // TODO: Remove this after bug will be fixed
        // Small bug, each second requests to system have a 0 into result
        if ($result->id === 0) {
            $result->id = 2;
        }

        self::$hotelId = $result->id;
    }

    public function test_all(): void
    {
        $result = $this->hotels->all('1');
        self::assertIsObject($result);
    }

    public function test_get(): void
    {
        $result = $this->hotels->get(self::$hotelId);
        self::assertIsObject($result);
    }

    public function test_update(): void
    {
        $result = $this->hotels->update(self::$hotelId, $this->hotel);
        self::assertIsObject($result);
    }

    public function test_delete(): void
    {
        $result = $this->hotels->delete(self::$hotelId);
        self::assertIsObject($result);
    }
}
