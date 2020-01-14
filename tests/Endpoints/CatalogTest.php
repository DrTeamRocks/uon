<?php

namespace UON\Tests\Endpoints;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoints\Catalog;
use UON\Endpoints\Services;

class CatalogTest extends TestCase
{

    /**
     * @var \UON\Endpoints\Catalog
     */
    private $object;

    /**
     * @var \UON\Endpoints\Services
     */
    private $services;

    /**
     * @var int
     */
    public static $catalogId;

    public function setUp(): void
    {
        $config = new Config();
        $config->set('token', getenv('API_TOKEN'));

        $this->object   = new Catalog($config);
        $this->services = new Services($config);
    }

    public function testCreate(): void
    {
        $services     = $this->services->getTypes();
        $service_id   = $services->items[0]->id;
        $service_name = $services->items[0]->name;

        $parameters = [
            's_id'        => $service_id,
            'description' => 'dummy description of ' . $service_name,
            'price'       => 999999
        ];

        $result          = $this->object->create($parameters);
        self::$catalogId = $result->id;
        $this->assertIsObject($result);
    }

    public function testGetAll(): void
    {
        $result = $this->object->get();
        $this->assertIsObject($result);
    }

    public function testGetSingle(): void
    {
        $result = $this->object->get(1);
        $this->assertIsObject($result);
    }

    public function testUpdate(): void
    {
        $services     = $this->services->getTypes();
        $service_id   = $services->items[0]->id;
        $service_name = $services->items[0]->name;

        $parameters = [
            's_id'        => $service_id,
            'description' => 'updated description of ' . $service_name,
            'price'       => 999999
        ];

        $result = $this->object->update(self::$catalogId, $parameters);
        $this->assertIsObject($result);
    }
}
