<?php

namespace Uon\Tests\Feature\Endpoints;

use PHPUnit\Framework\TestCase;
use Uon\Config;
use Uon\Endpoints\Countries;

class CountriesTest extends TestCase
{
    /**
     * @var \Uon\Endpoints\Countries
     */
    private $countries;

    /**
     * @var array
     */
    private $country = [
        'name'    => 'Кингконгстоунт',
        'name_en' => 'Kinkongstoun',
    ];

    /**
     * @var int
     */
    public static $countryId;

    public function setUp(): void
    {
        $config = new Config(['token' => getenv('API_TOKEN')]);

        $this->countries = new Countries($config);
    }

    public function test_create(): void
    {
        $result = $this->countries->create($this->country);

        self::$countryId = $result->id;

        self::assertIsObject($result);
    }

    public function test_all(): void
    {
        $result = $this->countries->all();
        self::assertIsObject($result);
    }

    public function test_update(): void
    {
        $result = $this->countries->update(self::$countryId, $this->country);
        self::assertIsObject($result);
    }

}
