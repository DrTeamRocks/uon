<?php

namespace UON\Tests\Endpoints;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoints\Cities;

class CitiesTest extends TestCase
{
    /**
     * @var \UON\Endpoints\Cities
     */
    private $object;

    /**
     * @var array
     */
    private $city = [
        'country_id' => 1,
        'name'       => 'Кингконгстоунт',
        'name_en'    => 'Kinkongstoun'
    ];

    /**
     * @var int
     */
    public static $citiesId;

    public function setUp(): void
    {
        $config = new Config();
        $config->set('token', getenv('API_TOKEN'));

        $this->object = new Cities($config);
    }

    public function testCreate(): void
    {
        $result         = $this->object->create($this->city);
        self::$citiesId = $result->id;
        $this->assertIsObject($result);
    }

    public function testAll(): void
    {
        $result = $this->object->all($this->city['country_id']);
        $this->assertIsObject($result);
    }

    public function testUpdate(): void
    {
        $result = $this->object->update(self::$citiesId, $this->city);
        $this->assertIsObject($result);
    }

}
