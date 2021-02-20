<?php

namespace Uon\Tests\Feature\Endpoints;

use PHPUnit\Framework\TestCase;
use Uon\Config;
use Uon\Endpoints\Cities;

class CitiesTest extends TestCase
{
    /**
     * @var \Uon\Endpoints\Cities
     */
    private $cities;

    /**
     * @var array
     */
    private $city = [
        'country_id' => 1,
        'name'       => 'Кингконгстоунт',
        'name_en'    => 'Kinkongstoun',
    ];

    /**
     * @var int
     */
    public static $citiesId;

    public function setUp(): void
    {
        $config = new Config(['token' => getenv('API_TOKEN')]);

        $this->cities = new Cities($config);
    }

    public function test_create(): void
    {
        $result         = $this->cities->create($this->city);
        self::$citiesId = $result->id;
        self::assertIsObject($result);
    }

    public function test_all(): void
    {
        $result = $this->cities->all($this->city['country_id']);
        self::assertIsObject($result);
    }

    public function test_update(): void
    {
        $result = $this->cities->update(self::$citiesId, $this->city);
        self::assertIsObject($result);
    }
}
