<?php

namespace Uon\Tests\Feature\Endpoints;

use PHPUnit\Framework\TestCase;
use Uon\Config;
use Uon\Endpoints\Suppliers;

class SuppliersTest extends TestCase
{
    /**
     * @var \Uon\Endpoints\Suppliers
     */
    private $object;

    /**
     * @var array
     */
    private $supplier = [
        'name'    => 'supplier name',
        'type_id' => 1,
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
        $config = new Config(['token' => getenv('API_TOKEN')]);

        $this->object = new Suppliers($config);
    }

    public function test_create(): void
    {
        $result = $this->object->create($this->supplier);

        self::$supplierId = $result->id;

        self::assertIsObject($result);
    }

    public function testRead(): void
    {
        $result = $this->object->all();
        self::assertIsObject($result);

        $result = $this->object->get(self::$supplierId);
        self::assertIsObject($result);
    }

    public function test_update(): void
    {
        $result = $this->object->update(self::$supplierId, $this->supplier);
        self::assertIsObject($result);
    }

    public function test_createType(): void
    {
        $result       = $this->object->createType($this->type);
        self::$typeId = $result->id;
        self::assertIsObject($result);
    }

    public function testReadType(): void
    {
        $result = $this->object->getTypes(['id' => self::$typeId]);
        self::assertIsObject($result);
    }
}
