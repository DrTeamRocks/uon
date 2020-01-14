<?php

namespace UON\Tests\Endpoints;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoints\Countries;

class CountriesTest extends TestCase
{
    /**
     * @var \UON\Endpoints\Countries
     */
    private $object;

    /**
     * @var array
     */
    private $country = [
        'name'    => 'Кингконгстоунт',
        'name_en' => 'Kinkongstoun'
    ];

    /**
     * @var int
     */
    public static $countryId;

    public function setUp(): void
    {
        $config = new Config();
        $config->set('token', getenv('API_TOKEN'));

        $this->object = new Countries($config);
    }

    public function testCreate(): void
    {
        $result          = $this->object->create($this->country);
        self::$countryId = $result->id;
        $this->assertIsObject($result);
    }

    public function testRead(): void
    {
        $result = $this->object->all();
        $this->assertIsObject($result);
    }

    public function testUpdate(): void
    {
        $result = $this->object->update(self::$countryId, $this->country);
        $this->assertIsObject($result);
    }

}
