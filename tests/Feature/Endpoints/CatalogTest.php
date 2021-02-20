<?php

namespace Uon\Tests\Feature\Endpoints;

use PHPUnit\Framework\TestCase;
use Uon\Config;
use Uon\Endpoints\Catalog;
use Uon\Endpoints\Services;

class CatalogTest extends TestCase
{

    /**
     * @var \Uon\Endpoints\Catalog
     */
    private $catalog;

    /**
     * @var \Uon\Endpoints\Services
     */
    private $services;

    /**
     * @var int
     */
    public static $catalogId;

    public function setUp(): void
    {
        $config = new Config(['token' => getenv('API_TOKEN')]);

        $this->catalog  = new Catalog($config);
        $this->services = new Services($config);
    }

    public function test_create(): void
    {
        $types        = $this->services->getTypes();
        $service_id   = $types->items[0]->id;
        $service_name = $types->items[0]->name;

        $parameters = [
            's_id'        => $service_id,
            'description' => 'dummy description of ' . $service_name,
            'price'       => 999999,
        ];

        $result = $this->catalog->create($parameters);

        self::$catalogId = $result->id;

        self::assertIsObject($result);
    }

    public function test_get(): void
    {
        $result = $this->catalog->get();
        self::assertIsObject($result);
    }

    public function test_get_single(): void
    {
        $result = $this->catalog->get(1);
        self::assertIsObject($result);
    }

    public function test_update(): void
    {
        $types        = $this->services->getTypes();
        $service_id   = $types->items[0]->id;
        $service_name = $types->items[0]->name;

        $parameters = [
            's_id'        => $service_id,
            'description' => 'updated description of ' . $service_name,
            'price'       => 999999,
        ];

        $result = $this->catalog->update(self::$catalogId, $parameters);
        self::assertIsObject($result);
    }
}
