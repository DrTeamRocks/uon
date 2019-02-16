<?php

namespace UON\Tests;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoint\Suppliers;

class SuppliersTest extends TestCase
{
    private $_suppliers;
    private $_supplier;
    private $_supplierType;

    public static $supplierId;
    public static $supplierTypeId;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = new Config();
        $config->set('token', file_get_contents(__DIR__ . '/../_token.txt'));

        $this->_suppliers = new Suppliers($config);
        $this->_supplier = array(
            'name' => 'supplier name',
            'type_id' => '1'
        );
        $this->_supplierType = array(
            'name' => 'supplier type name',
        );
    }

    public function testCreate()
    {
        $result = $this->_suppliers->create($this->_supplier);
        self::$supplierId = $result['message']->id;
        $this->assertInternalType('array', $result);
    }

    public function testRead()
    {
        $result = $this->_suppliers->all();
        $this->assertInternalType('array', $result);

        $result = $this->_suppliers->get(self::$supplierId);
        $this->assertInternalType('array', $result);
    }

    public function testUpdate()
    {
        $update = $this->_suppliers->update(self::$supplierId, $this->_supplier);
        $this->assertInternalType('array', $update);
    }

    public function testCreateType()
    {
        $result = $this->_suppliers->createType($this->_supplierType);
        self::$supplierTypeId = $result['message']->id;
        $this->assertInternalType('array', $result);
    }

    public function testReadType()
    {
        $result = $this->_suppliers->getTypes(['id' => self::$supplierTypeId]);
        $this->assertInternalType('array', $result);
    }
}
