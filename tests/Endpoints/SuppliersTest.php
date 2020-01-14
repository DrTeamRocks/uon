<?php

namespace UON\Tests;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoints\Suppliers;

class SuppliersTest extends TestCase
{
    /**
     * @var \UON\Endpoints\Suppliers
     */
    private $object;

    /**
     * @var array
     */
    private $supplier = [
        'name'    => 'supplier name',
        'type_id' => 1
    ];

    /**
     * @var array
     */
    private $type = [
        'name' => 'supplier type name',
    ];

    /**
     * @var int
     */
    public static $supplierId;

    /**
     * @var int
     */
    public static $typeId;

    public function setUp(): void
    {
        $config = new Config();
        $config->set('token', getenv('API_TOKEN'));

        $this->object = new Suppliers($config);
    }

    public function testCreate(): void
    {
        $result           = $this->object->create($this->supplier);
        self::$supplierId = $result->id;
        $this->assertIsObject($result);
    }

    public function testRead(): void
    {
        $result = $this->object->all();
        $this->assertIsObject($result);

        $result = $this->object->get(self::$supplierId);
        $this->assertIsObject($result);
    }

    public function testUpdate(): void
    {
        $result = $this->object->update(self::$supplierId, $this->supplier);
        $this->assertIsObject($result);
    }

    public function testCreateType(): void
    {
        $result       = $this->object->createType($this->type);
        self::$typeId = $result->id;
        $this->assertIsObject($result);
    }

    public function testReadType(): void
    {
        $result = $this->object->getTypes(['id' => self::$typeId]);
        $this->assertIsObject($result);
    }
}
